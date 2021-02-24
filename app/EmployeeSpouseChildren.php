<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSpouseChildren extends Model
{
    protected $fillable = [
        'employee_id',
        'name' ,
        'date_of_birth'
    ];
}
