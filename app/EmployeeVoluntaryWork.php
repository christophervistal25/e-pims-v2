<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeVoluntaryWork extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'address_of_organization',
        'inclusive_date_from',
        'inclusive_date_to',
        'position'
    ];
}
