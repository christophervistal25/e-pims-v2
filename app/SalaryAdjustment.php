<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryAdjustment extends Model
{
    protected $fillable = [        
        'employee_id',
        'item_no',
        'position_id',
        'date_adjustment',
        'sg_no',
        'step_no',
        'salary_previous',
        'salary_new',
        'salary_diff'
    ];
}
