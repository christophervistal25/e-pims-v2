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
        'gsis_policy_no',
        'gsis_bp_no',
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
        'residential_zip_code',
        'permanent_house_no',
        'permanent_street',
        'permanent_village',
        'permanent_barangay',
        'permanent_city',
        'permanent_province',
        'permanent_zip_code',
        'telephone_no',
        'mobile_no',
        'email_address',
        'status'
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function($employee) {
            $employee->trans_no = str_pad((self::count() + 1), 3, 0, STR_PAD_LEFT);
        });
    }

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
        $this->attributes['extension'] = strtoupper($value);
    }


    public function plantilla()
    {
        return $this->hasOne(Plantilla::class, 'employee_id', 'employee_id');
        // return $this->hasMany(Plantilla::class, 'employee_id', 'employee_id');
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
        return $this->hasMany(EmployeeCivilService::class, 'employee_id', 'employee_id');
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

    public function information()
    {
        return $this->hasOne(EmployeeInformation::class, 'EmpIDNo', 'employee_id');
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

    public function status()
    {
        return $this->hasOne(RefStatus::class, 'stat_code', 'status');
    }

    /**
     * Get all employees with passed relation.
     */
    public static function getWithRelations(array $relations = [])
    {
        return self::with($relations)->get();
    }

    public static function fetchWithRelations(array $relations = [], string $employeeId) :Employee
    {
        return self::with($relations)->find($employeeId);
    }

    public static function fetchWithFullInformation(string $employeeId) :Employee
    {
        return self::with([
            'family_background', 'spouse_child', 'educational_background', 'civil_service', 'work_experience', 'voluntary_work', 'program_attained','other_information','references', 'relevant_queries', 'issued_id', 'status'])->find($employeeId);
    }

    public function salary_adjustment()
    {
        return $this->belongsTo(SalaryAdjustment::class, 'office_code', 'office_code');
    }
}
