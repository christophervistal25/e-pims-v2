<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLeaveApplication extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'recommending_approval',
        'approved_by',
        'leave_type_id',
        'incase_of',
        'no_of_days',
        'commutation',
        'approved_status',
        'date_approved',
        'date_applied',
        'date_from',
        'date_to',
        'deleted_at',
        'disapproved_due_to',
        'approved_for',
    ];

    public $dates = ['date_from', 'date_to', 'date_applied', 'date_approved', 'deleted_at'];

    // protected $appends = [
    //     'in_case_of_text',
    // ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function leave_records()
    {
        return $this->hasMany(EmployeeLeaveRecord::class, 'leave_application_id', 'id');
    }
    
    public function type()
    {
        return $this->hasOne(LeaveType::class, 'id', 'leave_type_id');
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
