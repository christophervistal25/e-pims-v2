<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTimeInterface;

class SalaryAdjustment extends Model
{
    use SoftDeletes;
    protected $dates = ['date_adjustment','deleted_at', 'date_adjustment'];
    protected $fillable = [
        'employee_id',
        'item_no',
        'position_id',
        'date_adjustment',
        'sg_no',
        'step_no',
        'salary_previous',
        'salary_new',
        'salary_diff',
    ];

    protected $appends = [
        'date_adjustment_year'
    ];

    public function getDateAdjustmentYearAttribute()
    {
        return $this->date_adjustment->format('Y');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }
    public function plantillaPosition()
    {
        return $this->belongsTo(PlantillaPosition::class, 'pp_id', 'pp_id');
    }
    public function plantilla()
    {
        return $this->belongsTo(Plantilla::class, 'employee_id', 'employee_id');
    }

    public function serializeDate(DateTimeInterface  $date)
    {
        return $date->format('Y-m-d');
    }

    public function service_record()
    {
        return $this->hasOne('App\service_record', 'employee_id', 'employee_id');
    }
}

