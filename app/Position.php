<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Position extends Model
{
    use SoftDeletes;

    // public $connection = 'E_PIMS_CONNECTION';

    public $incrementing = false;

    public $table = 'Position';

    public $primaryKey = 'PosCode';

    protected $fillable = ['PosCode', 'Description', 'sg_no', 'position_short_name'];

    public function __construct()
    {
        $this->table = 'DTRPayroll.dbo.Position';
    }
    public function getPositionNameAttribute($value)
    {
        return Str::upper($value);
    }

    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class, 'PosCode', 'PosCode');
    }

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

    public function step()
    {
        return $this->hasOne(StepIncrement::class, 'PosCode', 'PosCode');
    }
}
