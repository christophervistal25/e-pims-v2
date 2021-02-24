<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFamilyBackground extends Model
{
    protected $fillable = [
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
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
