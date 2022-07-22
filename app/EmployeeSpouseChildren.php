<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSpouseChildren extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = [
        'id',
        'employee_id',
        'name',
        'date_of_birth',
    ];
}
