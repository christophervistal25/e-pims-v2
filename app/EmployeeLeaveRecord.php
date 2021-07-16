<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveRecord extends Model
{
    public function type()
    {
        return $this->hasOne(LeaveType::class, 'id', 'leave_type_id');
    }
}
