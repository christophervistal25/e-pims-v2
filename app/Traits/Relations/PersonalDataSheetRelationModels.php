<?php

namespace App\Traits\Relations;

use App\City;
use App\Barangay;
use App\Province;
use App\EmployeeIssuedID;
use App\EmployeeReference;
use App\EmployeeCivilService;
use App\EmployeeRelevantQuery;
use App\EmployeeVoluntaryWork;
use App\EmployeeSpouseChildren;
use App\EmployeeWorkExperience;
use App\EmployeeFamilyBackground;
use App\EmployeeOtherInformation;
use App\EmployeeTrainingAttained;
use App\EmployeeEducationalBackground;


trait PersonalDataSheetRelationModels
{
     
    public function province_residential()
    {
        return $this->hasOne(Province::class, 'province_code', 'residential_province')->select('province_code', 'name');
    }

    public function city_residential()
    {
        return $this->hasOne(City::class, 'city_code', 'residential_city')->select('province_code', 'city_code', 'name');
    }

    public function barangay_residential()
    {
        return $this->hasOne(Barangay::class, 'barangay_code', 'residential_barangay')->select('barangay_code', 'province_code', 'city_code', 'name');
    }

    public function province_permanent()
    {
        return $this->hasOne(Province::class, 'province_code', 'permanent_province')->select('province_code', 'name');
    }

    public function city_permanent()
    {
        return $this->hasOne(City::class, 'city_code', 'permanent_city')->select('province_code', 'city_code', 'name');
    }

    public function barangay_permanent()
    {
        return $this->hasOne(Barangay::class, 'barangay_code', 'permanent_barangay')->select('barangay_code', 'province_code', 'city_code', 'name');
    }

    
    public function family_background()
    {
        return $this->hasOne(EmployeeFamilyBackground::class, 'employee_id', 'employee_id');
    }

    public function spouse_child()
    {
        return $this->hasMany(EmployeeSpouseChildren::class, 'employee_id', 'employee_id');
    }

    public function educational_background()
    {
        return $this->hasOne(EmployeeEducationalBackground::class, 'employee_id', 'employee_id');
    }

    public function civil_service()
    {
        return $this->hasMany(EmployeeCivilService::class, 'employee_id', 'Employee_id');
    }

    public function work_experience()
    {
        return $this->hasMany(EmployeeWorkExperience::class, 'employee_id', 'employee_id');
    }

    public function voluntary_work()
    {
        return $this->hasMany(EmployeeVoluntaryWork::class, 'employee_id', 'employee_id');
    }

    public function program_attained()
    {
        return $this->hasMany(EmployeeTrainingAttained::class, 'employee_id', 'employee_id');
    }

    public function other_information()
    {
        return $this->hasMany(EmployeeOtherInformation::class, 'employee_id', 'employee_id');
    }

    public function references()
    {
        return $this->hasMany(EmployeeReference::class, 'employee_id', 'employee_id');
    }

    public function relevant_queries()
    {
        return $this->hasOne(EmployeeRelevantQuery::class, 'employee_id', 'employee_id');
    }

    public function issued_id()
    {
        return $this->hasOne(EmployeeIssuedID::class, 'employee_id', 'employee_id');
    }


}
