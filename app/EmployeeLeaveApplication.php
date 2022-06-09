<?php

namespace App;

use App\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLeaveApplication extends Model
{
    // use SoftDeletes;

    protected $primaryKey = 'application_id'; 
    public $with = ['employee', 'type'];
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $table = 'employee_leave_applications';
    public $timestamp = true;

    protected $fillable = [
        'application_id',
        'Employee_id',
        'leave_type_id',
        'incase_of',
        'specify',
        'no_of_days',
        'commutation',
        'status',
        'date_approved',
        'date_rejected',
        'date_applied',
        'date_from',
        'date_to',
        'deleted_at',
        'recommendation',
    ]; 

    // public $timestamp = false;
    public $dates = ['date_from', 'date_to', 'date_applied', 'date_approved'];

    // protected $appends = [
    //     'in_case_of_text',
    // ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_id', 'Employee_id')->select('Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2')->withDefault();
    }

    public function leave_records()
    {
        return $this->hasMany(EmployeeLeaveRecord::class, 'leave_application_id', 'application_id');
    }
    
    public function type()
    {
        return $this->hasOne(LeaveType::class, 'leave_type_id', 'leave_type_id');
    }

    public static function recordByStatus(string $status)
    {
        return self::where('approved_status', $status)->count();
    }

    public function getAttributeInCaseOfText($value)
    {
        return Str::upper(str_replace('_', ' ', $value));
    }

}
