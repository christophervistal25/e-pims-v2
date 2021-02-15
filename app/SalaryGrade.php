<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
    protected $fillable = [
        'id','salary_grade_step1', 'salary_grade_step2','salary_grade_step3','salary_grade_step4','salary_grade_step5','salary_grade_step6','salary_grade_step7','salary_grade_step8','salary_grade_year',
    ];
}
