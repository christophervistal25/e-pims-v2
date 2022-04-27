<?php

namespace App\Jobs;

use Error;
use Carbon\Carbon;
use App\LeaveIncrement;
use App\EmployeeLeaveRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Repositories\LeaveRecordRepository;

class LeaveIncrementJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;
    private $employeeIDS = [];
    private $leaveRecordRepository;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($employeeIDS)
    {
        $this->employeeIDS = $employeeIDS;
        $this->leaveRecordRepository = new LeaveRecordRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $records = EmployeeLeaveRecord::whereIn('employee_id', $this->employeeIDS)
                                            ->orderBy('created_at', 'DESC')
                                            ->get()
                                            ->groupBy('employee_id');

        foreach($records as $employeeID => $record) {
            if(Carbon::parse($record->first()->created_at)->format('m') === date('m')) {
                continue;
            }

            $this->leaveRecordRepository->increment(
                [
                    'employee_id'   => $employeeID,
                    'leave_type_id' => 1,
                    'earned'        => LeaveIncrement::find(1, ['increment'])->increment,
                    'used'          => 0,
                    'particular'    => 'EL',
                    'record_type'   => EmployeeLeaveRecord::TYPES['INCREMENT'],
                    'date_record'  => Carbon::now(),
                ]
            );

            $this->leaveRecordRepository->increment(
                [
                    'employee_id'   => $employeeID,
                    'leave_type_id' => 2,
                    'earned'        => LeaveIncrement::find(2, ['increment'])->increment,
                    'used'          => 0,
                    'particular'    => 'EL',
                    'record_type'          => EmployeeLeaveRecord::TYPES['INCREMENT'],
                    'date_record'  => Carbon::now(),
                ]
            );
        }
    }
}
