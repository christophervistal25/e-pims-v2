<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTrainingAttained extends Model
{
    public $connection = 'E_PIMS_CONNECTION';
    public $table = 'employee_training_attaineds';

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
