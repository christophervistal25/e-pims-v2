<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use App\Plantilla;
use Faker\Generator as Faker;

/**
 * Employee ID process
 */
$factory->define(Employee::class, function (Faker $faker) {
    return [
        'employee_id'          => $faker->ean8,
        'lastname'             => $faker->lastname,
        'firstname'            => $faker->name,
        'middlename'           => $faker->lastname,
        'sex'                  => $faker->titleMale,
        'extension'            => $faker->suffix,
        'date_birth'           => $faker->date,
        'place_birth'          => $faker->city,
        'civil_status'         => $faker->randomElement(['Single', 'Widowed', 'Married', 'Separated']),
        'date_birth'           => $faker->date(),
        'place_birth'          => $faker->city,
        'sex'                  => $faker->randomElement(['male', 'female']),
        'height'               => $faker->numberBetween(100, 200),
        'weight'               => $faker->numberBetween(50, 100),
        'blood_type'           => $faker->randomElement(['A', 'B', 'AB', 'O']),
        'gsis_id_no'           => '',
        'pag_ibig_no'          => '',
        'philhealth_no'        => '',
        'sss_no'               => '',
        'tin_no'               => '',
        'agency_employee_no'   => '',
        'citizenship'          => 'Filipino',
        'residential_house_no' => '',
        'residential_street'   => '',
        'residential_village'  => $faker->city,
        'residential_barangay' => $faker->city,
        'residential_city'     => $faker->city,
        'residential_province' => $faker->city,
        'residential_zip_code'   => '8300',
        'permanent_house_no'   => '',
        'permanent_street'     => '',
        'permanent_village'    => $faker->city,
        'permanent_barangay'   => $faker->city,
        'permanent_city'       => $faker->city,
        'permanent_province'   => $faker->city,
        'permanent_zip_code'   => '8300',
        'telephone_no'         => $faker->phoneNumber,
        'mobile_no'            => $faker->phoneNumber,
        'email_address'        => $faker->email,
        // 'status'               => $faker->city,
    ];
});
