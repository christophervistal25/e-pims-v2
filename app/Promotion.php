<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = ['promotion_id', 'promotion_date', 'employee_id', 'oldpp_id', 'sg_no', 'step_no', 'sg_year', 'newpp_id'];

    public $timestamps = false;

    public $primaryKey = 'promotion_id';

    public function employee()
    {
        return $this->hasOne(Employee::class, 'Employee_id', 'employee_id')->select('Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode');
    }

    public function old_plantilla_position()
    {
        return $this->hasOne(PlantillaPosition::class, 'pp_id', 'oldpp_id');
    }

    public function new_plantilla_position()
    {
        return $this->hasOne(PlantillaPosition::class, 'pp_id', 'newpp_id');
    }
}
