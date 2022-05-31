<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveUndertime extends Model
{
    protected $primaryKey = 'undertime_id';
    protected $connection = 'DTR_PAYROLL_CONNECTION';
    protected $table = 'employee_leave_undertime';

    protected $fillable = [
        'undertime_id',
        'Employee_id',
        'hours_late',
        'mins_late',
        'hours_undertime',
        'mins_undertime',
        'equivalent',
        'month_year',
    ];

    public $dates = ['month_year'];
    

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function leave_records()
    {
        return $this->hasOne(EmployeeLeaveRecord::class, 'undertime_id', 'id');
    }
}
