<?php

use App\Holiday;
use App\PlantillaSchedule;
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
            SalaryGradeSeeder::class,
            OfficeSeeder::class,
            PositionSeeder::class,
            DivisionSeeder::class,
            EmployeeSeeder::class,
            RefStatusSeeder::class,
            // PlantillaScheduleSeeder::class,
            UserSeeder::class,
            // LeaveRecordSeeder::class,
            // ProvinceSeeder::class,
            // CitySeeder::class,
            // BarangaySeeder::class,
            SettingSeeder::class,
            // PlantillaSeeder::class,
            HolidaySeeder::class,
            LeaveIncrementSeeder::class,
        ]);
    }
}
