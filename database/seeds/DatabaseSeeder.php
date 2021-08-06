<?php

use App\Holiday;
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
            LeaveTypeSeeder::class,
            RefNameExtensionSeeder::class,
            RefStatusSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            OfficeSeeder::class,
            SalaryGradeSeeder::class,
            // LeaveRecordSeeder::class,
            PositionSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            BarangaySeeder::class,
            SettingSeeder::class,
            // PlantillaSeeder::class,
            HolidaySeeder::class,
            LeaveIncrementSeeder::class,
        ]);
    }
}
