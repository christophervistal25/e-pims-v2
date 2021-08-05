<?php

use App\LeaveIncrement;
use Illuminate\Database\Seeder;

class LeaveIncrementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $increments = [
            [
                'leave_type_id' => "1",
                'increment' => "1.25",
                'description' => 'This is the value incremented to the monthly leave balance of every employee for sick leave.'
            ],
            [
                'leave_type_id' => "2",
                'increment' => "1.25",
                'description' => 'This is the value incremented to the monthly leave balance of every employee for vacation leave.'
            ],
        ];

        foreach($increments as $increment) {
            LeaveIncrement::create([
                'leave_type_id' => $increment['leave_type_id'],
                'increment' => $increment['increment'],
                'description' => $increment['description'],
            ]);
        }
    }
}
