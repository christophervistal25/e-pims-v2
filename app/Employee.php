<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_id',
        'lastname',
        'firstname',
        'middlename',
        'extension',
        'date_birth',
        'place_birth',
        'sex',
        'civil_status',
        'height',
        'weight',
        'blood_type',
        'gsis_id_no',
        'pag_ibig_no',
        'philhealth_no',
        'sss_no',
        'tin_no',
        'agency_employee_no',
        'citizenship',
        'residential_house_no',
        'residential_street',
        'residential_village',
        'residential_barangay',
        'residential_city',
        'residential_province',
        'permanent_house_no',
        'permanent_street',
        'permanent_village',
        'permanent_barangay',
        'permanent_city',
        'permanent_province',
        'telephone_no',
        'mobile_no',
        'email_address',
    ];



    /**
     * Set the firstname of employee to uppercase
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['firstname'] = strtoupper($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middlename'] = strtoupper($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['lastname'] = strtoupper($value);
    }

    public function setSuffixAttribute($value)
    {
        $this->attributes['suffix'] = strtoupper($value);
    }


    public function plantilla()
    {
        return $this->hasMany(Plantilla::class);
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

}
