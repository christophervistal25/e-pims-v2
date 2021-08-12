<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkExperience extends Model
{
    protected $fillable = [
        'employee_id',
        'from',
        'to',
        'position_title',
        'office',
        'monthly_salary',
        'salary_job_pay_grade',
        'status_of_appointment',
        'government_service',
        'is_present',
    ];
}
