<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $incrementing  = false;
    public $table = 'Position';
    public $primaryKey = 'PosCode';
    protected $fillable = ['PosCode', 'Description', 'sg_no', 'position_short_name'];

    public function getPositionNameAttribute($value)
    {
        return Str::upper($value);
    }

    // public function plantillas()
    // {
    //     return $this->belongsTo(Plantilla::class, 'pp_id', 'pp_id');
    // }

    public function salary_grade()
    {
        return $this->hasOne(SalaryGrade::class, 'sg_no', 'sg_no');
    }
    public function service_record()
    {
        return $this->belongsTo(service_record::class, 'position_id', 'PosCode');
    }
    public function salary_adjustment()
    {
        return $this->hasOne(SalaryAdjustment::class, 'position_id', 'PosCode');
    }
    public function plantilla_positions()
    {
        return $this->belongsTo(PlantillaPosition::class, 'PosCode', 'PosCode');
    }

    public function PlantillaSchedule()
    {
        return $this->belongsTo(PlantillaSchedule::class, 'position_id', 'PosCode');
    }

    public function PositionSchedule()
    {
        return $this->belongsTo(PositionSchedule::class, 'position_id', 'PosCode');
    }
}
