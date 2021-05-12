<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StepIncrement extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [        
        'employee_id',
        'item_no',
        'position_id',
        'date_step_increment',
        'sg_no_from',
        'date_latest_appointment',
        'step_no_from',
        'salary_amount_from',
        'sg_no_to',
        'step_no_to',
        'salary_amount_to',
        'salary_diff',
        'office_code',
        'deleted_at'
    ];

     public static function boot()
    {
        parent::boot();
        self::creating(function ($position) {
            Cache::forget('step_increment_records');
        });

        self::created(function() {
            Cache::forget('step_increment_records');
        });

        self::updated(function() {
            Cache::forget('step_increment_records');
        });

        self::saved(function() {
            Cache::forget('step_increment_records');
        });

        self::deleted(function() {
            Cache::forget('step_increment_records');
        });
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'employee_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id', 'position_id');
    }

    public function plantilla()
    {
        return $this->hasOne('App\Plantilla', 'employee_id', 'employee_id');
    }

}
