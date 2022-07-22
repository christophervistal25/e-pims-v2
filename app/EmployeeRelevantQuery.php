<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRelevantQuery extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = [
        'id',
        'employee_id',
        'question_34_a_answer',
        'question_34_a_details',
        'question_34_b_answer',
        'question_34_b_details',
        'question_35_a_answer',
        'question_35_a_details',
        'question_35_b_answer',
        'question_35_b_details',
        'question_35_b_date_filled',
        'question_35_b_status_of_cases',
        'question_36_a_answer',
        'question_36_a_details',
        'question_37_a_answer',
        'question_37_a_details',
        'question_38_a_answer',
        'question_38_a_details',
        'question_38_b_answer',
        'question_38_b_details',
        'question_39_a_answer',
        'question_39_a_details',
        'question_40_a_answer',
        'question_40_a_details',
        'question_40_b_answer',
        'question_40_b_details',
        'question_40_c_answer',
        'question_40_c_details',
    ];
}
