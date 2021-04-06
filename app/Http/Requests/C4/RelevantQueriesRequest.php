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

            'no_34_a' => [],
            'no_34_a_details' => [],
            'no_34_b' => [],
            'no_34_b_details' => [],

            'no_35_a' => [],
            'no_35_a_details' => [],
            'no_35_b' => [],
            'no_35_b_details' => [],

            'no_36' => [],
            'no_36_details' => [],
            'no_37' => [],
            'no_37_details' => [],

            'no_38_a' => [],
            'no_38_a_details' => [],
            'no_38_b' => [],
            'no_38_b_details' => [],

            'no_39' => [],
            'no_39_details' => [],

            'no_40_a' => [],
            'no_40_a_details' => [],

            'no_40_b' => [],
            'no_40_b_details' => [],

            'no_40_c' => [],
            'no_40_c_details' => []
        ];
    }
}
