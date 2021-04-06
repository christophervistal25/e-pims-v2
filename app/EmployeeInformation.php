<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
     protected $table      = 'employee_information';
     public $incrementing  = false;
     protected $primaryKey = 'EmpIDNo';
     public $timestamps    = false;
}
