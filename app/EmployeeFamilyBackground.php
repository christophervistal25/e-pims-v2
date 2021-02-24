<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFamilyBackground extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function spouse_child()
    {
        return $this->hasMany(EmployeeSpouseChildren::class, 'spouse_id', 'id');
    }
}
