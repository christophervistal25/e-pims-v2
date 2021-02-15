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
            AreaCodeSeeder::class,
            AreaTypeSeeder::class,
            StatusSeeder::class,
            LevelSeeder::class,
            SalaryGradeSeeder::class,
            PlantillaSeeder::class,
            OfficeSeeder::class,

            ]);
        // $this->call(UsersTableSeeder::class);
    }
}
