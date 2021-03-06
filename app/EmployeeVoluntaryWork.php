<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeVoluntaryWork extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = [
        'id',
        'employee_id',
        'name_and_address',
        'inclusive_date_from',
        'inclusive_date_to',
        'no_of_hours',
        'position',
    ];
}
