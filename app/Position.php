<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['position_id', 'position_code' ,'position_name', 'sg_no' ,'position_short_name'];

    protected $primaryKey = 'position_id';


    public static function boot()
    {
        parent::boot();
        self::creating(function ($position) {
            $maxPositionCode       = self::max('position_code');
            $code                  = str_pad(($maxPositionCode + 1), 4, '0', STR_PAD_LEFT);
            $position->position_code = $code;
            Cache::forget('positions');
        });

        self::created(function() {
            Cache::forget('positions');
        });

        self::updated(function() {
            Cache::forget('positions');
        });

        self::saved(function() {
            Cache::forget('positions');
        });

        self::deleted(function() {
            Cache::forget('positions');
        });
    }


    public function getPositionNameAttribute($value)
    {
        return strtoupper($value);
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
        return $this->belongsTo(PlantillaPosition::class, 'position_id', 'pp_id');
    }
}


