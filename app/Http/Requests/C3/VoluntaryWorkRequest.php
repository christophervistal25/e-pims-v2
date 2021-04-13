<?php

namespace App\Http\Requests\C3;

use Illuminate\Foundation\Http\FormRequest;

class VoluntaryWorkRequest extends FormRequest
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
            '*.nameOfOrg' => ['nullable'],
            '*.from'      => ['nullable', 'required_with:*.nameOfOrg', 'date'],
            '*.to'        => ['nullable', 'required_with:*.nameOfOrg', 'date'],
            '*.noOfHrs'   => ['nullable', 'required_with:*.nameOfOrg'],
            '*.position'  => ['nullable', 'required_with:*.nameOfOrg'],
        ];
    }

    public function attributes()
    {
        return [
            '*.nameOfOrg' => 'Name & Address Organization',
            '*.from'      => 'Inclusive Date FROM',
            '*.to'        => 'Inclusive Date TO',
            '*.noOfHrs'   => 'Number of Hours',
            '*.position'  => 'Position',
        ];
    }
}
