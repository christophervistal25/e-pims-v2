<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeReference extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = [
        'id',
        'employee_id',
        'name',
        'address',
        'telephone_number',
    ];
}
