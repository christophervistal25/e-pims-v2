<?php

namespace App\Http\Requests\C2;

use Illuminate\Foundation\Http\FormRequest;

class CivilServiceRequest extends FormRequest
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
            '*.career_service'  => ['required'],
            '*.date_of_examination'  => ['nullable', 'required_with:*.career_service', 'date'],
            '*.place_of_examination' => ['required_with:*.career_service'],
            '*.rating'      => ['nullable', 'numeric', 'required_with:*.career_service', 'between:1,99.99'],
            '*.license_number'      => ['nullable'],
            '*.date_of_validitiy' => ['nullable', 'date'],
        ];
    }

    public function attributes()
    {
        return [
            '*.career_service'       => 'Career service',
            '*.date_of_examination'  => 'Date of examination',
            '*.place_of_examination' => 'Place of examination',
            '*.rating'               => 'Rating',
            '*.license_number'       => "License Number",
            '*.date_of_validitiy'     => 'Date of validity',
        ];
    }
}
