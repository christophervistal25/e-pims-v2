<?php

namespace App;

use App\Position;
use App\OfficeCharging;
use App\StepIncrement;
use Illuminate\Support\Str;
use App\EmployeeLeaveRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EmployeeLaraTablesAction;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Employee extends Model
{
    use EmployeeLaraTablesAction;

    public $incrementing = false;
    protected $primaryKey = 'Employee_id';
    protected $connection = 'DTR_PAYROLL_CONNECTION';
    protected $table = 'Employees';
    public $with = ['position', 'office_charging', 'office_assignment'];
    // 'office_charging.desc'
    public $keyType = 'string';

    protected $columns = [
        'Employee_id',
        'LastName',
        'FirstName',
        'MiddleName',
        'Suffix',
        'OfficeCode',
        'OfficeCode2',
        'PosCode',
        'Designation',
        'Gender',
        'CivilStatus',
        'Birthdate',
        'Address',
        'ContactNumber',
        'TimeCode',
        'ImagePhoto',
        'isActive',
        'isHead',
        'Work_Status',
        'pagibig_no',
        'philhealth_no',
        'sss_no',
        'tin_no',
        'lbp_account_no',
        'employment_from',
        'employment_to',
        'gsis_no',
        'dbp_account_no',
        'Email_address',
        'BirthPlace',
        'sg_no',
        'step',
        'salary_rate',
        'notes',
        'temp_id',
        'profile',
        'sg_year',
        'created_at',
        'updated_at',
        'civil_status_others',
        'height',
        'weight',
        'blood_type',
        'gsis_policy_no',
        'gsis_bp_no',
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
        'first_day_of_service',
        'office_code',
    ];

    protected $fillable = [
        'Employee_id',
        'LastName',
        'FirstName',
        'MiddleName',
        'Suffix',
        'OfficeCode',
        'OfficeCode2',
        'PosCode',
        'Designation',
        'Gender',
        'CivilStatus',
        'Birthdate',
        'Address',
        'ContactNumber',
        'TimeCode',
        'ImagePhoto',
        'isActive',
        'isHead',
        'Work_Status',
        'pagibig_no',
        'philhealth_no',
        'sss_no',
        'tin_no',
        'lbp_account_no',
        'employment_from',
        'employment_to',
        'gsis_no',
        'dbp_account_no',
        'Email_address',
        'BirthPlace',
        'sg_no',
        'step',
        'salary_rate',
        'notes',
        'temp_id',
        'profile',
        'sg_year',
        'created_at',
        'updated_at',
        'civil_status_others',
        'height',
        'weight',
        'blood_type',
        'gsis_policy_no',
        'gsis_bp_no',
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
        'first_day_of_service',
        'office_code',
    ];

    public const ACTIVE = 1;
    public const IN_ACTIVE = 0;

    public $appends = [
        'fullname'
    ];

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


    public function getFullnameAttribute()
    {
        return "{$this->LastName}, {$this->FirstName} " . substr($this->MiddleName, 0, 1) . "." . " {$this->Suffix}";
    }


    protected function FirstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value),
        );
    }

    protected function MiddleName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value),
        );
    }

    protected function LastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value),
        );
    }

    protected function Suffix(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value),
        );
    }



    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value),
        );
    }


    public function plantilla()
    {
        return $this->hasOne(Plantilla::class, 'Employee_id', 'employee_id');
    }


    public function plantillaForStep()
    {
        return $this->hasOne(Plantilla::class, 'employee_id', 'Employee_id');
    }
    

    public function PlantillaSchedule()
    {
        return $this->hasOne(PlantillaSchedule::class, 'employee_id', 'employee_id');
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

    public function loginAccount()
    {
        return $this->belongsTo(User::class, 'employee_id', 'employee_id');
    }

    public static function getWithRelations(array $relations = [])
    {
        return self::with($relations)->get();
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'PosCode', 'PosCode')->withDefault();
    }

    public function scopeActive($query)
    {
        return $query->where('isActive', self::ACTIVE);
    }

    public function scopeExclude($query, array $value = [])
    {
        return $query->select(array_diff($this->columns, $value));
    }

    public function scopeInActive($query)
    {
        return $query->where('isActive', self::IN_ACTIVE);
    }

    public function scopePermanent($query)
    {
        return $query->where('Work_Status', 'not like', '%' . 'JOB ORDER' . '%')
            ->where('Work_Status', 'not like', '%' . 'CONTRACT OF SERVICE' . '%')
            ->where('Work_Status', '!=', '');
    }


    public function offices()
    {
        return $this->hasOne(Office::class, 'office_code', 'OfficeCode')->withDefault();
    }

    public function office_charging()
    {
        return $this->hasOne(OfficeCharging::class, 'OfficeCode', 'OfficeCode')->withDefault();
    }

    public function office_assignment()
    {
        return $this->hasOne(Office2::class, 'OfficeCode2', 'OfficeCode2')->withDefault();
    }


    public static function fetchWithFullInformation(string $employeeId): Employee
    {
        return self::with([
            'family_background', 'spouse_child', 'educational_background', 'civil_service', 'work_experience', 'voluntary_work', 'program_attained', 'other_information', 'references', 'relevant_queries', 'issued_id', 'status', 'information.position', 'information.office', 'loginAccount'
        ])->find($employeeId);
    }

    public function salary_adjustment()
    {
        return $this->hasMany(SalaryAdjustment::class, 'employee_id', 'Employee_id');
    }


    // STEP-INCREMENT //
    public function step()
    {
        return $this->hasOne(StepIncrement::class, 'employee_id', 'Employee_id');
    }

    // LEAVE BALANCE //
    public function leave_balances()
    {
        return $this->hasOne(EmployeeLeaveBalance::class, 'employee_id', 'employee_id');
    }

    public function leave_records()
    {
        return $this->hasMany(EmployeeLeaveRecord::class, 'employee_id', 'Employee_id');
    }

    public function leave_files()
    {
        return $this->hasMany(EmployeeLeaveApplication::class, 'employee_id', 'Employee_id');
    }


    public function forwarded_leave_records()
    {
        return $this->hasOne(EmployeeLeaveRecord::class, 'employee_id', 'Employee_id')->where('fb_as_of', '!=', NULL);
    }

    public function compensatory_leaves()
    {
        return $this->hasMany(CompensatoryLeave::class, 'employee_id', 'employee_id');
    }
}
