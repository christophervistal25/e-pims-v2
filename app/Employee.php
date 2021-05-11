<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;

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
        'lbp_account_no',
        'dbp_account_no',
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

    protected $appends = ['fullname', 'permanent_full_address'];


    public static function boot()
    {
        parent::boot();
        self::creating(function($employee) {
            $employee->trans_no = str_pad((self::count() + 1), 3, 0, STR_PAD_LEFT);
        });
    }

    /**
     * Get the employee's full concatenated name.
     */
    public function getFullnameAttribute()
    {
        return mb_strtoupper("{$this->firstname} {$this->middlename} {$this->lastname} {$this->extension}", 'UTF-8');
    }
    
    public function getPermanentFullAddressAttribute()
    {
        $provinceName = Province::find($this->permanent_province, 'name')->name ?? 'N/A';
        $cityName = City::find($this->permanent_city, 'name')->name ?? 'N/A';
        $barangayName = Barangay::find($this->permanent_barangay, 'name')->name ?? 'N/A';

        return "{$this->permanent_house_no} {$this->permanent_stress} {$this->permanent_village} {$barangayName} {$cityName} {$provinceName} {$this->permanent_zip_code}";
    }

    public function getFirstnameAttribute($value)
    {
        return mb_strtoupper($value, "UTF-8");
    }

    public function getMiddlenameAttribute($value)
    {
        return mb_strtoupper($value, "UTF-8");
    }

    public function getLastnameAttribute($value)
    {
        return mb_strtoupper($value, "UTF-8");
    }

    public function getExtensionAttribute($value)
    {
        return mb_strtoupper($value, "UTF-8");
    }

    /**
     * Set the firstname of employee to uppercase
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['firstname'] = mb_strtoupper($value, 'UTF-8');
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middlename'] = mb_strtoupper($value, 'UTF-8');
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['lastname'] = mb_strtoupper($value, 'UTF-8');
    }

    public function setSuffixAttribute($value)
    {
        $this->attributes['extension'] = mb_strtoupper($value, 'UTF-8');
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
        return $this->hasOne(RefStatus::class, 'id', 'status');
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
            'family_background', 'spouse_child', 'educational_background', 'civil_service', 'work_experience', 'voluntary_work', 'program_attained','other_information','references', 'relevant_queries', 'issued_id', 'status', 'information.position'])->find($employeeId);
    }

    public function salary_adjustment()
    {
        return $this->belongsTo(SalaryAdjustment::class, 'office_code', 'office_code');
    }

    public function step()
    {
        return $this->hasOne(StepIncrement::class, 'employee_id', 'employee_id');
    }

}
