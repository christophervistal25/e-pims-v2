<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCivilService extends Model
{
    protected $fillable = [
        'employee_id',
        'career_service',
        'rating',
        'date_of_examination',
        'place_of_examination',
        'license_number',
        'date_of_validitiy',
    ];
}
