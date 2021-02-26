<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTrainingAttained extends Model
{
    protected $fillable = [
        'employee_id',
        'title',
        'date_of_attendance_from',
        'date_of_attendance_to',
        'numbe_of_hours',
        'type_of_id',
        'sponsored_by',
    ];
}
