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
            '*.nameOfTraining' => ['required'],
            '*.from'           => ['nullable', 'required_with:*.nameOfTraining', 'date', 'before:*.to'],
            '*.to'             => ['nullable', 'required_with:*.nameOfTraining', 'date', 'after:*.from'],
            '*.noOfHours'      => ['nullable', 'required_with:*.nameOfTraining', 'numeric'],
            '*.typeOfLD'       => ['nullable', 'required_with:*.nameOfTraining'],
            '*.conducted'      => ['nullable', 'required_with:*.nameOfTraining'],
        ];
    }

    public function attributes()
    {
        return [
            '*.nameOfTraining' => 'Name of training',
            '*.from'           => 'Inclusive date FROM',
            '*.to'             => 'Inclusive date TO',
            '*.noOfHours'      => 'No. of hours',
            '*.typeOfLD'       => 'type of LD',
            '*.conducted'      => 'Conducted/Sponsored',
        ];
    }
}
