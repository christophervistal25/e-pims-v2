<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    protected $fillable = [
        'id','plantilla_id', 'old_item_no','salary_grade_step3','new_item_no','position_title','position_title_ext','employee_ids','office_code','division_code', 'date_original_appointment', 'date_last_promotion', 'status', 'dbm_previous_sg_no', 'dbm_previous_step_no', 'dbm_previous_sg_year', 'dbm_current_sg_no', 'dbm_current_step_no', 'dbm_current_sg_year', 'csc_previous_sg_no', 'csc_previous_step_no', 'csc_previous_sg_year', 'csc_current_sg_no', 'csc_current_step_no', 'csc_current_sg_year', 'area_code', 'area_type', 'area_level', 
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
