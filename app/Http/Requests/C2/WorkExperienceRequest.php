<?php

namespace App\Http\Requests\C2;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperienceRequest extends FormRequest
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
            '*.from'      => ['nullable', 'required_with:*.statOfApp', 'required_with:*.govServ', 'required_with:*.to', 'date', 'before:*.to'],
            '*.to'        => ['nullable', 'required_with:*.statOfApp', 'required_with:*.govServ', 'required_with:*.from', 'date', 'after:*.from'],
            '*.position'  => ['nullable', 'required_with:*.statOfApp', 'required_with:*.govServ', 'required_with:*.from', 'required_with:*.to'],
            '*.dept'      => ['nullable', 'required_with:*.statOfApp', 'required_with:*.govServ', 'required_with:*.position', 'string'],
            '*.monSalary' => ['nullable', 'required_with:*.statOfApp', 'required_with:*.govServ'],
            '*.payGrade'  => ['nullable', 'required_with:*.statOfApp', 'required_with:*.govServ'],
            '*.statOfApp' => ['required'],
            '*.govServ'   => ['required', 'in:Y,N,y,n'],
        ];
    }

    public function messages()
    {
        return [
            '*.govServ.in' => 'You can only type (Y,N) in goverment service.'
        ];
    }

    public function attributes()
    {
        return [
            '*.from'      => 'Inclusive date from',
            '*.to'        => 'Inclusive date to',
            '*.statOfApp' => 'Status of appointment',
            '*.govServ'   => 'Government Service',
            '*.dept'      => 'Department',
            '*.position'  => 'Position',
            '*.monSalary' => 'Monthly Salary',
            '*.payGrade'  => 'Pay Grade',
        ];
    }
}
