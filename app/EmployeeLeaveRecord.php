<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveRecord extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'leave_type_id',
        'earned',
        'used',
        'fb_as_of',
        'particular',
        'absences_under_time_with_pay_balance',
        'absences_under_time_without_pay_balance',
    ];
    public function type()
    {
        return $this->hasOne(LeaveType::class, 'id', 'leave_type_id');
    }
}
