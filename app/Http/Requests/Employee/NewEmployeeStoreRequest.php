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
            'designation.position_code'      => 'required|exists:positions,position_code',
            'officeAssignment.office_code' => 'required|exists:offices,office_code',
            'employmentStatus.stat_code' => 'required|exists:ref_statuses,stat_code',
            'firstName'        => 'required',
            'middleName'       => 'required',
            'pagibigMidNo'     => 'nullable',
            'philhealthNo'     => 'nullable',
            'sssNo'            => 'nullable|unique:employees,sss_no',
            'tinNo'            => 'nullable|unique:employees,tin_no',
        ];
    }

    public function attributes()
    {
        return [
            'employmentStatus.stat_code'   => 'employment status',
            'designation.position_code'    => 'designation',
            'officeAssignment.office_code' => 'office',
        ];
    }
}
