<?php

namespace App;

use App\Setting;
use Illuminate\Database\Eloquent\Model;

class EmployeeTrainingAttained extends Model
{
    protected $fillable = [
        'id',
        'employee_id',
        'title',
        'date_of_attendance_from',
        'date_of_attendance_to',
        'number_of_hours',
        'type_of_id',
        'sponsored_by',
    ];
}
