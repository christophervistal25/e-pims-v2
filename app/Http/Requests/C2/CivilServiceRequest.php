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
            '*.dateOfExam'  => ['required_with:*.careerServ'],
            '*.placeOfExam' => ['required_with:*.careerServ'],
            '*.rating'      => ['nullable', 'numeric', 'between:0,99.99'],
            '*.number'      => ['nullable', 'numeric'],
            '*.dateOfValid' => ['nullable', 'date'],
        ];
    }
}
