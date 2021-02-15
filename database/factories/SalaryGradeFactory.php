<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SalaryGrade;
use Faker\Generator as Faker;

$factory->define(SalaryGrade::class, function (Faker $faker) {
    return [
        'salary_grade_no' => $faker->randomNumber,
        'salary_grade_step1' => $faker->randomNumber,
        'salary_grade_step2' => $faker->randomNumber,
        'salary_grade_step3' => $faker->randomNumber,
        'salary_grade_step4' => $faker->randomNumber,
        'salary_grade_step5' => $faker->randomNumber,
        'salary_grade_step6' => $faker->randomNumber,
        'salary_grade_step7' => $faker->randomNumber,
        'salary_grade_step8' => $faker->randomNumber,
        'salary_grade_year' => $faker->date('Y'),
    ];
});
