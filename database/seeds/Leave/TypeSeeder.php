<?php

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = [
            'Vacation',
            'Sick',
            'Mandatory',
            'Menitization',
            'Leave w/o pay',
            'Others',
            'Maternity Leave',
            'Paternity Leave',
            'RA 9262',
            'RA 9710',
            'Solo Parent',
            'SPL',
            'Rehabilitation',
            'Study Leave',
            'Terminal',
        ];

       foreach($types as $type) {
        $incrementBy = ($type === 'Vacation' || $type === 'Sick') ? 1.25 : 0;
        LeaveType::create([ 'name' => $type , 'per_increment' => $incrementBy]);
       }
    }
}
