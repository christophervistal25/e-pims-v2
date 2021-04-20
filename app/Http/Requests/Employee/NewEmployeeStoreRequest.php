<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class NewEmployeeStoreRequest extends FormRequest
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
            'lastName'         => 'required',
            'dateOfBirth'      => 'required|date',
            'designation'      => 'required|exists:positions,position_code',
            'designation'      => 'required',
            'employmentFrom'   => 'required|date',
            'employmentTo'     => 'required|date',
            'employmentStatus' => 'required|exists:ref_statuses,stat_code',
            'firstName'        => 'required',
            'middleName'       => 'required',
            'pagibigMidNo'     => 'required|unique:employees,pag_ibig_no',
            'philhealthNo'     => 'required|unique:employees,philhealth_no',
            'sssNo'            => 'required|unique:employees,sss_no',
            'tinNo'            => 'required|unique:employees,tin_no',
        ];
    }
}
