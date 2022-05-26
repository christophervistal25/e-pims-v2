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
            '*.from'      => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.to', 'date', 'before:*.to'],
            '*.to'        => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.from', 'string', 'date', 'after:*.from'],
            '*.position_title'  => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.from', 'required_with:*.to'],
            '*.office'      => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.position_title', 'string'],
            '*.monthly_salary' => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service'],
            '*.salary_job_pay_grade'  => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service'],
            '*.status_of_appointment' => ['required'],
            '*.government_service'   => ['required', 'in:Y,N,y,n'],
        ];
    }

    public function messages()
    {
        return [
            '*.government_service.in' => 'You can only type (Y,N) in goverment service.'
        ];
    }

    public function attributes()
    {
        return [
            '*.from'      => 'Inclusive date from',
            '*.to'        => 'Inclusive date to',
            '*.status_of_appointment' => 'Status of appointment',
            '*.government_service'   => 'Government Service',
            '*.office'      => 'Department',
            '*.position_title'  => 'Position',
            '*.monthly_salary' => 'Monthly Salary',
            '*.salary_job_pay_grade'  => 'Pay Grade',
        ];
    }
}
