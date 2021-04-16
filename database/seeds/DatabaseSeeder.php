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
            RefStatusSeeder::class,
            EmployeeSeeder::class,
            OfficeSeeder::class,
            SalaryGradeSeeder::class,
            PositionSeeder::class,
            // PlantillaSeeder::class,


            ]);
        // $this->call(UsersTableSeeder::class);
    }
}
