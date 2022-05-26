<?php

namespace App\Http\Requests\C4;

use Illuminate\Foundation\Http\FormRequest;

class RelevantQueriesRequest extends FormRequest
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
            'question_34_a_answer'          => ['required'],
            'question_34_a_details'         => ['required_if:question_34_a_answer,yes'],
            'question_34_b_answer'          => ['required'],
            'question_34_b_details'         => ['required_if:question_34_b_answer,yes'],
            'question_35_a_answer'          => ['required'],
            'question_35_a_details'         => ['required_if:question_35_a_answer,yes'],
            'question_35_b_answer'          => ['required'],
            'question_35_b_details'         => ['required_if:question_35_b_answer,yes'],
            'question_35_b_date_filled'     => ['nullable', 'required_if:question_35_b_answer,yes', 'date', 'before:today', 'after:1900-01-01'],
            'question_35_b_status_of_cases' => ['required_if:question_35_b_answer,yes'],
            'question_36_a_answer'          => ['required'],
            'question_36_a_details'         => ['required_if:question_36_a_answer,yes'],
            'question_37_a_answer'          => ['required'],
            'question_37_a_details'         => ['required_if:question_37_a_answer,yes'],
            'question_38_a_answer'          => ['required'],
            'question_38_a_details'         => ['required_if:question_38_a_answer,yes'],
            'question_38_b_answer'          => ['required'],
            'question_38_b_details'         => ['required_if:question_38_b_answer,yes'],
            'question_39_a_answer'          => ['required'],
            'question_39_a_details'         => ['required_if:question_39_a_answer,yes'],
            'question_40_a_answer'          => ['required'],
            'question_40_a_details'         => ['required_if:question_40_a_answer,yes'],
            'question_40_b_answer'          => ['required'],
            'question_40_b_details'         => ['required_if:question_40_b_answer,yes'],
            'question_40_c_answer'          => ['required'],
            'question_40_c_details'         => ['required_if:question_40_c_answer,yes']
        ];
    }
}
