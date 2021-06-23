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

    // public function getSpouseFullnameAttribute()
    // {
    //     return strtoupper("{$this->spouse_firstname} {$this->spouse_middlename} {$this->spouse_lastname} {$this->spouse_extension}");
    // }

    // public function getMotherFullnameAttribute()
    // {
    //     return strtoupper("{$this->mother_firstname} {$this->mother_middlename} {$this->mother_lastname} {$this->mother_extension}");
    // }

    // public function getFatherFullnameAttribute()
    // {
    //     return strtoupper("{$this->father_firstname} {$this->father_middlename} {$this->father_lastname} {$this->father_extension}");
    // }

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
