<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;
class Plantilla extends Model
{
    protected $fillable = [
        'plantilla_id', 'old_item_no', 'new_item_no','position_title','position_title_ext','employee_id', 'current_salary_grade', 'current_step_no', 'current_salary_amount', 'office_code','division_code', 'date_original_appointment', 'date_last_promotion', 'status', 'dbm_previous_sg_no', 'dbm_previous_step_no', 'dbm_previous_sg_year', 'dbm_previous_amount', 'dbm_current_sg_no', 'dbm_current_step_no', 'dbm_current_sg_year', 'dbm_current_ampount', 'csc_previous_sg_no', 'csc_previous_step_no', 'csc_previous_sg_year', 'csc_previous_amount', 'csc_current_sg_no', 'csc_current_step_no', 'csc_current_sg_year', 'csc_current_amount',  'area_code', 'area_type', 'area_level',
    ];

    protected $primaryKey = 'plantilla_id';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
<<<<<<< HEAD
=======
    }

    public function office()
    {
        return $this->hasOne(Office::class);
    }

    public function position()
    {
        return $this->hasMany(Position::class);
>>>>>>> 788c25a3a9d8d3fb83dafc09e8ca054bf00d2058
    }
}
