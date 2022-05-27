<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeReference extends Model
{
    protected $fillable = [
        'id',
        'employee_id',
        'name',
        'address',
        'telephone_number'
    ];
}
