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
            'no_34_a'         => ['required'],
            'no_34_a_details' => ['required_if:no_34_a,yes'],
            'no_34_b'         => ['required'],
            'no_34_b_details' => ['required_if:no_34_b,yes'],

            'no_35_a'                 => ['required'],
            'no_35_a_details'         => ['required_if:no_35_a,yes'],
            'no_35_b'                 => ['required'],
            'no_35_b_details'         => ['required_if:no_35_b,yes'],
            'no_35_b_date_filled'     => ['nullable', 'required_if:no_35_b,yes', 'date', 'before:today', 'after:1900-01-01'],
            'no_35_b_status_of_cases' => ['required_if:no_35_b,yes'],

            'no_36'         => ['required'],
            'no_36_details' => ['required_if:no_36,yes'],
            'no_37'         => ['required'],
            'no_37_details' => ['required_if:no_37,yes'],

            'no_38_a'         => ['required'],
            'no_38_a_details' => ['required_if:no_38_a,yes'],
            'no_38_b'         => ['required'],
            'no_38_b_details' => ['required_if:no_38_b,yes'],

            'no_39'         => ['required'],
            'no_39_details' => ['required_if:no_39,yes'],

            'no_40_a'         => ['required'],
            'no_40_a_details' => ['required_if:no_40_a,yes'],

            'no_40_b'         => ['required'],
            'no_40_b_details' => ['required_if:no_40_b,yes'],

            'no_40_c'         => ['required'],
            'no_40_c_details' => ['required_if:no_40_c,yes']
        ];
    }
}
