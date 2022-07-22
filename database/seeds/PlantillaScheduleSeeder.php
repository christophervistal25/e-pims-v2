<?php

use App\Division;
use App\Employee;
use App\Office;
use App\Plantilla;
use App\PlantillaPosition;
use App\PlantillaSchedule;
use App\Position;
use App\RefStatus;
use App\SalaryGrade;
use Illuminate\Database\Seeder;

class PlantillaScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Plantilla Position -> Plantilla -> Plantilla Schedule
        Position::get()->each(function ($record) {
            PlantillaPosition::create([
                'position_id' => $record->position_id,
                'item_no' => $record->position_id + 1,
                'sg_no' => rand(2, 31),
                'office_code' => Office::get()->random()->office_code,
                'year' => rand(2015, 2020),
            ]);
        });

        PlantillaPosition::get()->each(function ($pp) {
            $sg_no = $pp->sg_no + 1;
            $step_no = rand(2, 7);
            $plantilla = Plantilla::create([
                'item_no' => $pp->item_no + 1,
                'pp_id' => $pp->pp_id,
                'sg_no' => $sg_no,
                'step_no' => $step_no,
                'salary_amount' => SalaryGrade::where(['sg_no' => $sg_no])->first(['sg_step'.$step_no])['sg_step'.$step_no],
                'employee_id' => Employee::get()->random()->employee_id,
                'area_code' => 'CARAGA',
                'area_type' => 'Province',
                'area_level' => 'K',
                'date_original_appointment' => date('Y-m-d'),
                'date_last_promotion' => date('Y-m-d'),
                'office_code' => Office::get()->random()->office_code,
                'division_id' => Division::get()->random()->division_id,
                'status' => RefStatus::get()->random()->stat_code,
                'year' => rand(2015, 2020),
            ]);

            PlantillaSchedule::create([
                'item_no' => $pp->item_no + 1,
                'plantilla_id' => $plantilla->plantilla_id,
                'pp_id' => $pp->pp_id,
                'sg_no' => $sg_no,
                'step_no' => $step_no,
                'salary_amount' => SalaryGrade::where(['sg_no' => $sg_no])->first(['sg_step'.$step_no])['sg_step'.$step_no],
                'employee_id' => Employee::get()->random()->employee_id,
                'area_code' => 'CARAGA',
                'area_type' => 'Province',
                'area_level' => 'K',
                'date_original_appointment' => date('Y-m-d'),
                'date_last_promotion' => date('Y-m-d'),
                'office_code' => Office::get()->random()->office_code,
                'division_id' => Division::get()->random()->division_id,
                'status' => RefStatus::get()->random()->stat_code,
                'year' => rand(2015, 2020),
            ]);
        });
    }
}
