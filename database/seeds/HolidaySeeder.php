<?php

namespace Database\Seeders;

use App\Holiday;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $holidays = [
            [
                'name' => "New Year's Day",
                'date' => "January 1, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Maundy Thursday ",
                'date' => "April 1, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Good Friday",
                'date' => "April 2, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Araw ng Kagitingan",
                'date' => "April 9, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Labor Day",
                'date' => "May 1, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Eid'l Fitr",
                'date' => "May 13, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Independence Day",
                'date' => "June 12, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "National Heroes' Day ",
                'date' => "August 30, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Bonifacio Day",
                'date' => "November 30, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Christmas Day ",
                'date' => "December 25, 2021 ",
                'type' => 'Regular'
            ],
            [
                'name' => "Rizal Day",
                'date' => "December 30, 2021 ",
                'type' => 'Regular'
            ],

            [
                'date' => "February 12, 2021 ",
                'name' => " Chinese New Year ",
                'type' => 'Special Non-Working'
            ],
            [
                'date' => "February 25, 2021 ",
                'name' => " EDSA People Power Revolution Anniversary",
                'type' => 'Special Non-Working'
            ],
            [
                'date' => "April 3, 2021 ",
                'name' => " Black Saturday ",
                'type' => 'Special Non-Working'
            ],
            [
                'date' => "August 21, 2021 ",
                'name' => " Ninoy Aquino Day ",
                'type' => 'Special Non-Working'
            ],
            [
                'date' => "November 1, 2021 ",
                'name' => " All Saints' Day ",
                'type' => 'Special Non-Working'
            ],
            [
                'date' => "December 8, 2021 ",
                'name' => " Feast of the Immaculate Conception of Mary",
                'type' => 'Special Non-Working'
            ],


            [
                'name' => "All Souls' Day",
                'date' => "November 2, 2021",
                'type' => 'Special Working'
            ],

            [
                'name' => "Christmas Eve",
                'date' => "December 24, 2021",
                'type' => 'Special Working'
            ],

            [
                'name' => "New Year's Day",
                'date' => "December 31, 2021",
                'type' => 'Special Working'
            ],
        ];

        foreach ($holidays as $holiday) {
            Holiday::create([
                'name' => $holiday['name'],
                'date' => Carbon::parse($holiday['date'])->format('m-d'),
                'type' => Str::upper($holiday['type']),
            ]);
        }
    }
}
