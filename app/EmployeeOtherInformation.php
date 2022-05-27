<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeOtherInformation extends Model
{
    protected $fillable = [
        'id',
        'employee_id',
        'special_skill',
        'non_academic',
        'organization',
    ];
}
