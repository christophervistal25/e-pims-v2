<?php

namespace App\Jobs;

use App\EmployeeLeaveRecord;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class LeaveIncrementJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    // public $tries = 3;
    private $employees;

    private $leaveRecordRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->employees->each(function ($employee) {
            $insertRecord = true;

            if ($employee->leave_records?->count() == 0) {
                $insertRecord = true;
            } else {
                $recordYearAndMonth = $employee->leave_records?->pluck('date_record')
                                                    ->last()
                                                    ->format('Y-m');
                $insertRecord = ($recordYearAndMonth != date('Y-m')) ? true : false;
            }

            if ($insertRecord) {
                $data[] = [
                    'employee_id' => $employee->Employee_id,
                    'leave_type_id' => 1,
                    'earned' => 1.25,
                    'used' => 0,
                    'particular' => 'EL',
                    'record_type' => EmployeeLeaveRecord::TYPES['INCREMENT'],
                    'date_record' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

                $data[] = [
                    'employee_id' => $employee->Employee_id,
                    'leave_type_id' => 2,
                    'earned' => 1.25,
                    'used' => 0,
                    'particular' => 'EL',
                    'record_type' => EmployeeLeaveRecord::TYPES['INCREMENT'],
                    'date_record' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

                DB::connection('E_PIMS_CONNECTION')
                    ->table('employee_leave_records')
                    ->insert($data);
            }
        });
    }
}
