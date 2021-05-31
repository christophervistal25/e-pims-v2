<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRelevantQuery extends Model
{
    protected $fillable = [
        // 'affinity_in_government',
        // 'affinity_in_government_answer',
        // 'afffinity_in_government_details',

        // 'filed_cases',
        // 'filed_cases_answer',
        // 'filed_cases_details',

        // 'conviction_violation',
        // 'conviction_violation_answer',
        // 'conviction_violation_details',

        // 'service_record',
        // 'service_record_answer',
        // 'service_record_details',

        // 'electoral_and_immigration',
        // 'electoral_and_immigration_answer',
        // 'electoral_and_immigration_details',

        // 'indigency_social_matters',
        // 'indigency_social_matters_answer',
        // 'indigency_social_matters_details',
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
