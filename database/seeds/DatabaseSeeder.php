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

            EmployeeSeeder::class,
<<<<<<< HEAD
            // ProvinceSeeder::class,
            // CitySeeder::class,
            // BarangaySeeder::class,
            // PlantillaSeeder::class,
                OfficeSeeder::class,
                SalaryGradeSeeder::class,
                PositionSeeder::class,
=======
            
            OfficeSeeder::class,
            SalaryGradeSeeder::class,
            PlantillaSeeder::class,


>>>>>>> salaryadjustment
            ]);
        // $this->call(UsersTableSeeder::class);
    }
}
