<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Position extends Model
{
    protected $fillable = ['position_name', 'position_id', 'position_code' ,'position_name', 'salary_grade' ,'position_short_name'];

    protected $primaryKey = 'position_id';


    public static function boot()
    {
        parent::boot();
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


    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class, 'position_id', 'position_id');
    }

    public function salary_grade()
    {
        return $this->hasOne(SalaryGrade::class, 'sg_no', 'salary_grade');
    }
}


