<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plantilla;
use App\Employee;
use Faker\Generator as Faker;

$factory->define(Plantilla::class, function (Faker $faker) {
    return [
        'old_item_no' => $faker->randomNumber,
        'item_no' => $faker->randomNumber,
        'position_id' => $faker->randomNumber,
        'position_ext' => $faker->jobTitle,
        'sg_no' => $faker->randomNumber,
        'step_no' => $faker->randomNumber,
        'salary_amount' => $faker->randomNumber,
        'employee_id' => $faker->randomNumber,
        'area_code' => $faker->randomNumber,
        'area_type' => $faker->jobTitle,
        'area_level' => $faker->jobTitle,
        'date_original_appointment' => $faker->dateTime,
        'date_last_promotion' => $faker->dateTime,
        'office_code' => $faker->randomNumber,
        'division_id' => $faker->randomNumber,
        'status' => $faker->jobTitle,
    ];
});
