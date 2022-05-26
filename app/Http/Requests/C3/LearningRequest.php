<?php

namespace App\Http\Requests\C3;

use Illuminate\Foundation\Http\FormRequest;

class LearningRequest extends FormRequest
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
            '*.title' => ['required'],
            '*.date_of_attendance_from'           => ['nullable', 'required_with:*.title', 'date', 'before:*.date_of_attendance_to'],
            '*.date_of_attendance_to'             => ['nullable', 'required_with:*.title', 'date', 'after:*.date_of_attendance_from'],
            '*.number_of_hours'      => ['nullable', 'required_with:*.title', 'numeric'],
            '*.type_of_id'       => ['nullable', 'required_with:*.title'],
            '*.sponsored_by'      => ['nullable', 'required_with:*.title'],
        ];
    }

    public function attributes()
    {
        return [
            '*.title' => 'Name of training',
            '*.date_of_attendance_from'           => 'Inclusive date From',
            '*.date_of_attendance_to'             => 'Inclusive date To',
            '*.number_of_hours'      => 'No. of hours',
            '*.type_of_id'       => 'type of LD',
            '*.sponsored_by'      => 'Conducted/Sponsored',
        ];
    }
}
