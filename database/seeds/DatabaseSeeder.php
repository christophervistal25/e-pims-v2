<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([            
            SalaryGradeSeeder::class,
            PlantillaSeeder::class,
            OfficeSeeder::class,

            ]);
        // $this->call(UsersTableSeeder::class);
    }
}
