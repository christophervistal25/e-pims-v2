<?php

namespace App;

use App\Office;
use App\Position;
use App\StepIncrement;
use App\OfficeCharging;
use Illuminate\Support\Str;
use App\EmployeeLeaveRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EmployeeLaraTablesAction;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Traits\Relations\PersonalDataSheetRelationModels;

class Employee extends Model
{
    use EmployeeLaraTablesAction;
    use PersonalDataSheetRelationModels;

    public $incrementing = false;
    protected $primaryKey = 'Employee_id';
    protected $connection = 'DTR_PAYROLL_CONNECTION';
    protected $table = 'Employees';
    public $with = ['position', 'office_charging', 'office_assignment'];
    public $dates = ['first_day_of_service', 'last_step_increment'];
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
        'last_step_increment'
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
        'last_step_increment'
    ];

    public const ACTIVE = 1;
    public const IN_ACTIVE = 0;

    public $appends = [
        'fullname'
    ];


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

    public function loginAccount()
    {
        return $this->belongsTo(User::class, 'employee_id', 'employee_id');
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
        return $this->hasOne(EmployeeLeaveForwardedBalance::class, 'Employee_id', 'Employee_id');
    }

    public function compensatory_leaves()
    {
        return $this->hasMany(CompensatoryLeave::class, 'employee_id', 'employee_id');
    }
}
