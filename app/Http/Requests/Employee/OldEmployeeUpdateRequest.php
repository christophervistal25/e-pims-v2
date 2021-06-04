<?php

namespace App\Http\Requests\Employee;

use App\Rules\UpdateTrapfullname;
use Illuminate\Foundation\Http\FormRequest;

class OldEmployeeUpdateRequest extends FormRequest
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
        $rules = [
            'employee_id'      => 'required|exists:employees',
            'firstName'        => ['required', new UpdateTrapfullname()],
            'middleName'       => ['nullable', new UpdateTrapfullname()],
            'lastName'         => ['required', new UpdateTrapfullname()],
            'extension' => ['nullable', new UpdateTrapfullname()],
            'dateOfBirth'      => ['required', 'date', new UpdateTrapfullname()],
            'designation.position_code'      => 'required|exists:positions,position_code',
            'officeAssignment.office_code' => 'required|exists:offices,office_code',
            'employmentStatus.stat_code' => 'required|exists:ref_statuses,stat_code',
            'pagibigMidNo'     => 'nullable',
            'philhealthNo'     => 'nullable',
            'sssNo'            => 'nullable|unique:employees,sss_no,'. request('employee_id') . ',employee_id',
            'tinNo'            => 'nullable|unique:employees,tin_no,'. request('employee_id') . ',employee_id',
        ];

            if(request()->employmentStatus['status_name'] === 'PERMANENT') {
                if(request()->dbpAccountNo !== '*') {
                    $rules['dbpAccountNo'] = 'unique:employees,dbp_account_no,' . request()->employee_id . ',employee_id';
                } else {
                    $rules['dbpAccountNo'] = 'required';
                }
                
            } else {
                if(request()->lbpAccountNo !== '*') {
                    $rules['lbpAccountNo'] = 'required|unique:employees,lbp_account_no,' . request()->employee_id . ',employee_id';
                } else {
                    $rules['lbpAccountNo'] = 'required';
                }
            }

        return $rules;
    }

    public function attributes()
    {
        return [
            'employmentStatus.stat_code'   => 'employment status',
            'designation.position_code'    => 'designation',
            'officeAssignment.office_code' => 'office',
            'lbpAccountNo' => 'account no.'
        ];
    }
}
