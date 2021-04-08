<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepIncrement extends Model
{
    protected $fillable = [        
        'employee_id',
        'item_no',
        'position_id',
        'date_step_increment',
        'date_latest_appointment',
        'sg_no_from',
        'step_no_from',
        'salary_amount_from',
        'sg_no_to',
        'step_no_to',
        'salary_amount_to',
        'salary_diff'
    ];
}
