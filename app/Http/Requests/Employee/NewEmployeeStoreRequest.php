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
        dd(request());
        return [
            'lastName'         => 'required',
            'dateOfBirth'      => 'required|date',
            'designation'      => 'required|exists:positions,position_code',
            'officeAssignment' => 'required|exists:offices,office_code',
            'employmentStatus' => 'required|exists:ref_statuses,stat_code',
            'firstName'        => 'required',
            'middleName'       => 'required',
            'pagibigMidNo'     => 'nullable|unique:employees,pag_ibig_no',
            'philhealthNo'     => 'nullable|unique:employees,philhealth_no',
            'sssNo'            => 'nullable|unique:employees,sss_no',
            'tinNo'            => 'nullable|unique:employees,tin_no',
        ];
    }
}
