<?php

namespace App;

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
        'deleted_at'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'employee_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id', 'position_id');
    }

}
