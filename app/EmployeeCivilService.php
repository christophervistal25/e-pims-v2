<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCivilService extends Model
{
    public $connection = 'E_PIMS_CONNECTION';
    public $table = 'employee_civil_services';
    protected $fillable = [
        'employee_id',
        'career_service',
        'rating',
        'date_of_examination',
        'place_of_examination',
        'license_number',
        'date_of_validitiy',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_id', 'employee_id');
    }
}
