<?php

namespace App\Providers;

use Carbon\Carbon;
use App\LeaveIncrement;
use App\EmployeeLeaveRecord;
use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\LeaveRecordRepository;

class AppServiceProvider extends ServiceProvider
{
    public function __construct()
    {
        $this->leaveRecordRepository = new LeaveRecordRepository();
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $employees = LeaveRecordRepository::employeesWithRecord(['employee_id']);
        
        // $data = $employees->pluck('employee_id')->toArray();

        // $records = EmployeeLeaveRecord::whereIn('employee_id', $data)
        //                                     ->orderBy('created_at', 'DESC')
        //                                     ->get()
        //                                     ->groupBy('employee_id');

        // foreach($records as $employeeID => $record) {
            
        //     if(Carbon::parse($record->first()->created_at)->format('m') === date('m')) {
        //         continue;
        //     }

        //     $this->leaveRecordRepository->increment(
        //         [
        //             'employee_id'   => $employeeID,
        //             'leave_type_id' => 1,
        //             'earned'        => LeaveIncrement::find(1, ['increment'])->increment,
        //             'used'          => 0,
        //             'particular'    => 'Sick Leave Increment by 1.250',
        //         ]
        //     );

        //     $this->leaveRecordRepository->increment(
        //         [
        //             'employee_id'   => $employeeID,
        //             'leave_type_id' => 2,
        //             'earned'        => LeaveIncrement::find(2, ['increment'])->increment,
        //             'used'          => 0,
        //             'particular'    => 'Vacation Leave Increment by 1.250',
        //         ]
        //     );
        // }
    }
}
