<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRelevantQuery extends Model
{
    protected $fillable = [
        'affinity_in_government',
        'affinity_in_government_answer',
        'afffinity_in_government_details',

        'filed_cases',
        'filed_cases_answer',
        'filed_cases_details',

        'conviction_violation',
        'conviction_violation_answer',
        'conviction_violation_details',

        'service_record',
        'service_record_answer',
        'service_record_details',

        'electoral_and_immigration',
        'electoral_and_immigration_answer',
        'electoral_and_immigration_details',

        'indigency_social_matters',
        'indigency_social_matters_answer',
        'indigency_social_matters_details',
    ];
}
