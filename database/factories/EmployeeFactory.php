<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use App\Plantilla;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'employee_id' => $faker->randomNumber,
        'lastname' => $faker->lastname,
        'firstname' => $faker->name,
        'middlename' => $faker->lastname,
        'sex' => $faker->titleMale,
        'date_birth' => $faker->date,
        'status' => $faker->city,
    ];
});
