<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    public $connection = 'E_PIMS_CONNECTION';
    public $incrementing  = false;
    public $table = 'positions';
    public $primaryKey = 'position_code';
    protected $fillable = ['position_id', 'position_code' ,'position_name', 'sg_no' ,'position_short_name'];

    public function getPositionNameAttribute($value)
    {
        return Str::upper($value);
    }

    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class, 'position_id', 'position_id');
    }

    public function salary_grade()
    {
        return $this->hasOne(SalaryGrade::class, 'sg_no', 'sg_no');
    }
    public function service_record()
    {
        return $this->belongsTo(service_record::class, 'position_id', 'position_id');
    }
    public function salary_adjustment()
    {
        return $this->hasOne(SalaryAdjustment::class, 'position_id', 'position_id');
    }
    public function plantilla_positions()
    {
        return $this->belongsTo(PlantillaPosition::class, 'position_id', 'position_id');
    }

    public function PlantillaSchedule()
    {
        return $this->belongsTo(PlantillaSchedule::class, 'position_id', 'position_id');
    }

    public function PositionSchedule()
    {
        return $this->belongsTo(PositionSchedule::class, 'position_id', 'position_id');
    }


}


