<?php

use App\Employee;
use App\EmployeeLeaveRecord;
use Illuminate\Database\Seeder;

class LeaveRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 10) as $range) {
            EmployeeLeaveRecord::create([
                'employee_id' => Employee::first()->employee_id,
                'leave_type_id' => rand(1, 2),
                'earned' => 1.25,
                'used' => 0,
                'particular' => 'INCREMENT LEAVE RECORD',
                
            ]);
        }
        
    }
}
