<?php

use Illuminate\Database\Seeder;
use App\RefStatus;

class RefStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data =
       [
           [
            'status_code' => 1,
            'status_name' => 'Permanent',
            ],
            [
                'status_code' => 2,
                'status_name' => 'Temporary',
            ],
            [
                'status_code' => 3,
                'status_name' => 'Co-terminus',
            ],
            [
                'status_code' => 4,
                'status_name' => 'Contractual',
            ],
            [
                'status_code' => 5,
                'status_name' => 'Elected',
            ],
        ];

        foreach($data as $status) {
            RefStatus::create([
                'stat_code'   => $status['status_code'],
                'status_name' => $status['status_name'],
            ]);
        }
    }
}
