<?php

namespace App;

use Illuminate\Support\Str;
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

    // protected $appends = ['mother_fullname', 'father_fullname', 'spouse_fullname'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function setSpouseFirstnameAttribute($value)
    {
        return $this->attributes['spouse_firstname'] = Str::upper($value);
    }
    public function setSpouseLastnameAttribute($value)
    {
        return $this->attributes['spouse_lastname'] = Str::upper($value);
    }
    public function setSpouseMiddlenameAttribute($value)
    {
        return $this->attributes['spouse_middlename'] = Str::upper($value);
    }
    public function setSpousExtensionAttribute($value)
    {
        return $this->attributes['spouse_extension'] = Str::upper($value);
    }

    public function setFatherFirstnameAttribute($value)
    {
        return $this->attributes['father_firstname'] = Str::upper($value);
    }

    public function setFatherLastnameAttribute($value)
    {
        return $this->attributes['father_lastname'] = Str::upper($value);
    }

    public function setFatherMiddlenameAttribute($value)
    {
        return $this->attributes['father_middlename'] = Str::upper($value);
    }

    public function setFatherExtensionAttribute($value)
    {
        return $this->attributes['father_extension'] = Str::upper($value);
    }

    public function setMotherLastnameAttribute($value)
    {
        return $this->attributes['mother_lastname'] = Str::upper($value);
    }

    public function setMotherFirstnameAttribute($value)
    {
        return $this->attributes['mother_firstname'] = Str::upper($value);
    }

    public function setMotherMiddlenameAttribute($value)
    {
        return $this->attributes['mother_middlename'] = Str::upper($value);
    }

}
