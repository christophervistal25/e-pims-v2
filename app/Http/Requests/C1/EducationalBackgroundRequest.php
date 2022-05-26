<?php

namespace App\Http\Requests\C1;

use Illuminate\Foundation\Http\FormRequest;

class EducationalBackgroundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'elementary_name'                                    => [],
            'elementary_education'                               => [],
            'elementary_period_from'                             => ['nullable', 'numeric', 'required_with:elementary_name', 'digits:4', 'before:elementary_period_to'],
            'elementary_period_to'                               => ['nullable', 'numeric', 'required_with:elementary_name', 'required_with:elementary_period_from', 'digits:4', 'after:elementary_period_from'],
            'elementary_highest_level_units_earned'              => [],
            'elementary_year_graduated'                          => ['nullable', 'numeric', 'digits:4'],
            'elementary_scholarship'                             => [],

            'secondary_name'                                     => [],
            'secondary_education'                                => [],
            'secondary_period_from'                              => ['nullable', 'numeric', 'required_with:secondary_name', 'digits:4', 'before:secondary_period_to'],
            'secondary_period_to'                                => ['nullable', 'numeric', 'required_with:secondary_name', 'required_with:secondary_period_from', 'digits:4', 'after:secondary_period_from'],
            'secondary_highest_level_units_earned'               => [],
            'secondary_year_graduated'                           => ['nullable', 'numeric', 'digits:4'],
            'secondary_scholarship'                              => [],

            'vocational_trade_course_name'                       => [],
            'vocational_education'                               => [],
            'vocational_trade_course_period_from'                => ['nullable', 'numeric', 'required_with:vocational_trade_course_name', 'required_with:vocational_education', 'digits:4'],
            'vocational_trade_course_period_to'                  => ['nullable', 'numeric', 'required_with:vocational_trade_course_name', 'required_with:vocational_education', 'required_with:vocational_trade_course_period_from', 'digits:4', 'after:vocational_trade_course_period_from',],
            'vocational_trade_course_highest_level_units_earned' => [],
            'vocational_trade_course_year_graduated'             => ['nullable', 'numeric', 'digits:4'],
            'vocational_trade_course_scholarship'                => [],

            'college_name'                                       => [],
            'college_education'                                  => ['nullable', 'required_with:college_name'],
            'college_period_from'                                => ['nullable', 'numeric', 'required_with:college_name', 'digits:4'],
            'college_highest_level_units_earned'                 => [],
            'college_year_graduated'                             => ['nullable', 'numeric', 'digits:4'],
            'college_scholarship'                                => [],

            'graduate_studies_name'                              => [],
            'graduate_studies_education'                         => [],
            'graduate_studies_period_from'                       => ['nullable', 'numeric', 'required_with:graduate_studies_name', 'digits:4', 'before:graduate_studies_period_to'],
            'graduate_studies_highest_level_units_earned'        => [],
            'graduate_studies_year_graduated'                    => ['nullable', 'numeric', 'digits:4'],
            'graduate_studies_scholarship'                       => []
        ];
    }
}
