<?php

use App\Employee;
use App\EmployeeLeaveRecord;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LeaveForwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeLeaveRecord::create([
            'employee_id' => Employee::get()[1]->employee_id,
            'leave_type_id'  => 1,
            'earned'      => 50,
            'used'        => 0,
            'particular'  => 'ENTRANCE',
            'fb_as_of'    => Carbon  ::now(),
            'record_type' => 'F',
            'date_record' => Carbon::now(),
        ]);

        EmployeeLeaveRecord::create([
            'employee_id' => Employee::get()[1]->employee_id,
            'leave_type_id'  => 2,
            'earned'      => 50,
            'used'        => 0,
            'particular'  => 'ENTRANCE',
            'fb_as_of'    => Carbon::now(),
            'record_type' => 'F',
            'date_record' => Carbon::now(),
        ]);
    }
}
