<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSpouseChildren extends Model
{
    protected $fillable = [
        'id',
        'employee_id',
        'name',
        'date_of_birth'
    ];
}
