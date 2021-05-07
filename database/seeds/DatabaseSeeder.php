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
            RefNameExtensionSeeder::class,
            TypeSeeder::class,
            RefStatusSeeder::class,
            // EmployeeSeeder::class,
            OfficeSeeder::class,
            // SalaryGradeSeeder::class,
            PositionSeeder::class,
            // ProvinceSeeder::class,
            // CitySeeder::class,
            // BarangaySeeder::class
            // PlantillaSeeder::class,
            ]);
        // $this->call(UsersTable\Seeder::class);
    }
}
