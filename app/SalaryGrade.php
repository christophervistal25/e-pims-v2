<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
    protected $fillable = [
        'sg_step1',
        'sg_step2',
        'sg_step3',
        'sg_step4',
        'sg_step5',
        'sg_step6',
        'sg_step7',
        'sg_step8',
        'sg_year',
    ];
}
