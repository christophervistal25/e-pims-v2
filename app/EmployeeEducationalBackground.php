<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducationalBackground extends Model
{
    protected $fillable = [
        'employee_id',

        'elementary_name',
        'elementary_education',
        'elementary_period_from',
        'elementary_period_to',
        'elementary_highest_level_units_earned',
        'elementary_year_graduated',
        'elementary_scholarship',

        'secondary_name',
        'secondary_education',
        'secondary_period_from',
        'secondary_period_to',
        'secondary_highest_level_units_earned',
        'secondary_year_graduated',
        'secondary_scholarship',

        'vocational_trade_course_name',
        'vocational_education',
        'vocational_trade_course_period_from',
        'vocational_trade_course_period_to',
        'vocational_trade_course_highest_level_units_earned',
        'vocational_trade_course_year_graduated',
        'vocational_trade_course_scholarship',

        'college_name',
        'college_education',
        'college_period_from',
        'college_period_to',
        'college_highest_level_units_earned',
        'college_year_graduated',
        'college_scholarship',

        'graduate_studies_name',
        'graduate_studies_education',
        'graduate_studies_period_from',
        'graduate_studies_period_to',
        'graduate_studies_highest_level_units_earned',
        'graduate_studies_year_graduated',
        'graduate_studies_scholarship',

    ];

}
