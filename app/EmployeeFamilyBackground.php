<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EmployeeFamilyBackground extends Model
{
    protected $fillable = [
        'id',
        'employee_id',
        'spouse_firstname',
        'spouse_lastname',
        'spouse_middlename',
        'spouse_extension',
        'spouse_occupation',
        'spouse_employer_business_name',
        'spouse_business_address',
        'spouse_telephone_number',
        'father_firstname',
        'father_lastname',
        'father_middlename',
        'father_extension',
        'mother_maidenname',
        'mother_lastname',
        'mother_firstname',
        'mother_middlename',
        'mother_extension',
    ];

    protected $appends = ['has_spouse'];



    protected function hasSpouse(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => !empty($this->spouse_firstname) ? true : false,
        );
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function spouse()
    {
        return $this->hasMany(EmployeeSpouseChildren::class, 'employee_id', 'employee_id');
    }
}
