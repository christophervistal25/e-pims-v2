<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveApplication extends Model
{
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
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function type()
    {
        return $this->hasOne(LeaveType::class, 'id', 'leave_type_id');
    }

    public static function recordByStatus(string $status)
    {
        return self::where('approved_status', $status)->count();
    }
}
