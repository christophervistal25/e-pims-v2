<?php

use App\Employee;
use App\EmployeeIssuedID;
use App\EmployeeReference;
use App\EmployeeInformation;
use App\EmployeeCivilService;
use App\EmployeeRelevantQuery;
use App\EmployeeVoluntaryWork;
use App\EmployeeSpouseChildren;
use App\EmployeeWorkExperience;
use App\EmployeeFamilyBackground;
use App\EmployeeOtherInformation;
use App\EmployeeTrainingAttained;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use App\EmployeeEducationalBackground;
use Illuminate\Support\Facades\Artisan;



Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('delete', function () {
      $location = public_path() . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'generated' . DIRECTORY_SEPARATOR;
      array_map('unlink', array_filter((array) glob($location . '*')));
      $this->info("Successfully delete all files in {$location} directory. ");
});

Artisan::command('employee_truncate', function () {
    DB::transaction(function () {
        Employee::truncate();
        EmployeeCivilService::truncate();
        EmployeeEducationalBackground::truncate();
        EmployeeFamilyBackground::truncate();
        EmployeeInformation::truncate();
        EmployeeIssuedID::truncate();
        EmployeeOtherInformation::truncate();
        EmployeeReference::truncate();
        EmployeeRelevantQuery::truncate();
        EmployeeSpouseChildren::truncate();
        EmployeeTrainingAttained::truncate();
        EmployeeVoluntaryWork::truncate();
        EmployeeWorkExperience::truncate();
        $this->info("Successfully truncate all employee informations with relation.");
    });
});