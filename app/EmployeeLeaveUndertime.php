<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveUndertime extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'hoursLate',
        'minsLate',
        'hoursUndertime',
        'minsUndertime',
        'equivalent',
        'month_year',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function leave_records()
    {
        return $this->hasOne(EmployeeLeaveRecord::class, 'undertime_id', 'id');
    }
}
