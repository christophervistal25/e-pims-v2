<?php

namespace App;

use App\Province;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'trans_no',
        'employee_id',
        'lastname',
        'firstname',
        'middlename',
        'extension',
        'date_birth',
        'place_birth',
        'sex',
        'civil_status',
        'civil_status_others',
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
        'citizenship_by',
        'indicate_country',
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

    protected $appends = [
        'fullname',
        'permanent_full_address',
        'residential_province_text',
        'residential_city_text',
        'residential_barangay_text',
        'permanent_province_text',
        'permanent_city_text',
        'permanent_barangay_text',
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function($employee) {
            $employee->trans_no = str_pad((self::count() + 1), 3, 0, STR_PAD_LEFT);
            Cache::forget('employees');
        });

        self::created(function() {
            Cache::forget('employees');
        });

        self::updated(function() {
            Cache::forget('employees');
        });

        self::saved(function() {
            Cache::forget('employees');
        });

        self::deleted(function() {
            Cache::forget('employees');
        });
    }

    /**
     * Get the employee's full concatenated name.
     */
    public function getFullnameAttribute()
    {
        return Str::upper("{$this->firstname} {$this->middlename} {$this->lastname} {$this->extension}");
    }

    public function getResidentialProvinceTextAttribute()
    {
       return Province::find($this->residential_province, 'name')->name ?? 'N/A';
    }

    public function getResidentialCityTextAttribute()
    {
       return City::find($this->residential_city, 'name')->name ?? 'N/A';
    }

    public function getResidentialBarangayTextAttribute()
    {
       return Barangay::find($this->residential_barangay, 'name')->name ?? 'N/A';
    }


    public function getPermanentProvinceTextAttribute()
    {
       return Province::find($this->permanent_province, 'name')->name ?? 'N/A';
    }

    public function getPermanentCityTextAttribute()
    {
       return City::find($this->permanent_city, 'name')->name ?? 'N/A';
    }

    public function getPermanentBarangayTextAttribute()
    {
       return Barangay::find($this->permanent_barangay, 'name')->name ?? 'N/A';
    }

    public function getPermanentFullAddressAttribute()
    {
        $provinceName = Province::find($this->permanent_province, 'name')->name ?? 'N/A';
        $cityName = City::find($this->permanent_city, 'name')->name ?? 'N/A';
        $barangayName = Barangay::find($this->permanent_barangay, 'name')->name ?? 'N/A';

        $completeAddress = $this->permanent_house_no . ' ' .  $this->permanent_stress . ' ' .  $this->permanent_village . ' ' .   $barangayName . ' ' .  $cityName . ' ' . $provinceName . ' ' . $this->permanent_zip_code;

        return Str::upper($completeAddress);
    }

    public function getFirstnameAttribute($value)
    {
        return Str::upper($value);
    }

    public function getMiddlenameAttribute($value)
    {
        return Str::upper($value);
    }

    public function getLastnameAttribute($value)
    {
        return Str::upper($value);
    }

    public function getExtensionAttribute($value)
    {
        return Str::upper($value);
    }

    /**
     * Set the firstname of employee to uppercase
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['firstname'] = Str::upper($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middlename'] = Str::upper($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['lastname'] = Str::upper($value);
    }

    public function setExtensionAttribute($value)
    {
        $this->attributes['extension'] = Str::upper($value);
    }

    public function plantilla()
    {
        return $this->hasOne(Plantilla::class, 'employee_id', 'employee_id');
    }

    public function PlantillaOfSchedule()
    {
        return $this->hasOne(PlantillaOfSchedule::class, 'employee_id', 'employee_id');
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


    // STEP-INCREMENT //
    public function step()
    {
        return $this->hasOne(StepIncrement::class, 'employee_id', 'employee_id');
    }

    // LEAVE BALANCE //
    public function leave_balances()
    {
        return $this->hasOne(EmployeeLeaveBalance::class, 'employee_id', 'employee_id');
    }

    public function leave_records()
    {
        return $this->hasMany(EmployeeLeaveRecord::class, 'employee_id', 'employee_id');
    }

    
}
