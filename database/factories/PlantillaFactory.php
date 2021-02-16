<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plantilla;
use Faker\Generator as Faker;

$factory->define(Plantilla::class, function (Faker $faker) {
    return [
        'plantilla_id' => $faker->randomNumber,
        'old_item_no' => $faker->randomNumber,
        'new_item_no' => $faker->randomNumber,
        'position_title' => $faker->jobTitle,
        'position_title_ext' => $faker->jobTitle,
        'employee_id' => $faker->randomNumber,
        //'current_salary_grade' => $faker->randomNumber,
        //'current_step_no' => $faker->randomNumber,
        //'current_salary_amount' => $faker->randomNumber,
        'office_code' => $faker->randomNumber,
        'division_code' => $faker->randomNumber,
        'date_original_appointment' => $faker->dateTime,
        'date_last_promotion' => $faker->dateTime,
        'status' => $faker->jobTitle,
        'dbm_previous_sg_no' => $faker->randomNumber,
        'dbm_previous_step_no' => $faker->randomNumber,
        'dbm_previous_sg_year' => $faker->year,
        //'dbm_previous_amount' => $faker->randomNumber,
        'dbm_current_sg_no' => $faker->randomNumber,
        'dbm_current_step_no' => $faker->randomNumber,
        'dbm_current_sg_year' => $faker->year,
        //'dbm_current_amount' => $faker->randomNumber,
        'csc_previous_sg_no' => $faker->randomNumber,
        'csc_previous_step_no' => $faker->randomNumber,
        'csc_previous_sg_year' => $faker->year,
        //'csc_previous_amount' => $faker->randomNumber,
        'csc_current_sg_no' => $faker->randomNumber,
        'csc_current_step_no' => $faker->randomNumber,
        'csc_current_sg_year' => $faker->year,
        //'csc_current_amount' => $faker->randomNumber,
        'area_code' => $faker->randomNumber,
        'area_type' => $faker->randomNumber,
        'area_level' => $faker->randomNumber,
        
    ];
});
