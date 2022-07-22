<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantillaOfSchedule extends Model
{
    protected $fillable = [
        'ps_id',
        'plantilla_id',
        'old_item_no',
        'item_no',
        'pp_id',
        'position_id',
        'position_ext',
        'sg_no',
        'step_no',
        'salary_amount',
        'employee_id',
        'area_code',
        'area_type',
        'area_level',
        'date_original_appointment',
        'date_last_promotion',
        'office_code',
        'division_id',
        'status',
        'year',
    ];

    protected $primaryKey = 'ps_id';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'office_code', 'office_code');
    }

    public function position()
    {
        return $this->hasOne('App\Position', 'position_id', 'pp_id');
    }

    public function plantillaPosition()
    {
        return $this->hasOne('App\PlantillaPosition', 'pp_id', 'pp_id');
    }

    public function plantilla()
    {
        return $this->hasOne('App\Plantilla', 'plantilla', 'plantilla');
    }
}
