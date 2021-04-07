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
            "*.from"      => ['nullable', 'required_with:*.to', 'date'],
            "*.to"        => ['nullable', 'required_with:*.from', 'date'],
            "*.position"  => ['nullable', 'required_with:*.from', 'required_with:*.to'],
            "*.dept"      => ['nullable', 'required_with:*.position', 'string'],
            "*.monSalary" => ['nullable'],
            "*.payGrade"  => ['nullable'],
            "*.statOfApp" => ['required'],
            "*.govServ"   => ['required', 'in:Y,N'],
        ];
    }

    public function attributes()
    {
        return [
            '*.from'      => 'FROM',
            '*.to'        => 'TO',
            '*.statOfApp' => 'Status of appointment',
            '*.govServ'   => 'Gov\'t Service',
            '*.dept'      => 'Department',
            '*.position'  => 'Position',
        ];
    }
}
