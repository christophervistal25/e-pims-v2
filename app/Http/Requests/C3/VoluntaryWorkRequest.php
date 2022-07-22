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
            '*.name_and_address' => ['required'],
            '*.inclusive_date_from' => ['nullable', 'required_with:*.name_and_address', 'date', 'before:*.inclusive_date_to'],
            '*.inclusive_date_to' => ['nullable', 'required_with:*.name_and_address', 'date', 'after:*.inclusive_date_from'],
            '*.no_of_hours' => ['nullable', 'required_with:*.name_and_address'],
            '*.position' => ['nullable', 'required_with:*.name_and_address'],
        ];
    }

    public function attributes()
    {
        return [
            '*.name_and_address' => 'Name & Address Organization',
            '*.inclusive_date_from' => 'Inclusive Date From',
            '*.inclusive_date_to' => 'Inclusive Date to',
            '*.no_of_hours' => 'Number of Hours',
            '*.position' => 'Position',
        ];
    }
}
