<?php

namespace App\Http\Requests\Employee;

use App\Rules\StoreTrapfullname;
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
        $rules = [
            'firstName'                    => ['required', new StoreTrapfullname()],
            'middleName'                   => ['nullable', new StoreTrapfullname()],
            'lastName'                     => ['required', new StoreTrapfullname()],
            'extension'                    => ['nullable', new StoreTrapfullname()],
            'dateOfBirth'                  => ['required', 'date', new StoreTrapfullname()],
            'designation.position_code'    => 'required|exists:positions,position_code',
            'officeAssignment.office_code' => 'required|exists:offices,office_code',
            'employmentStatus'             => 'required',
            'employmentStatus.stat_code'   => 'required_with:employmentStatus|exists:ref_statuses,stat_code',
            'pagibigMidNo'                 => 'nullable',
            'philhealthNo'                 => 'nullable',
            'sssNo'                        => 'nullable|unique:employees,sss_no',
            'tinNo'                        => 'nullable|unique:employees,tin_no',
        ];
        
        if(request()->employmentStatus && request()->employmentStatus['status_name'] === 'PERMANENT') {
            // Ignore rules if the user enter an asterisk (*)
            echo request()->dbpAccountNo;
            if(request()->dbpAccountNo === '*') {
                $rules['dbpAccountNo'] = 'required';
            } else {
                $rules['dbpAccountNo'] = 'required|unique:employees,dbp_account_no';
            }
        } else {
            if(request()->lbpAccountNo === '*') {
                $rules['lbpAccountNo'] = 'required';
            } else {
                $rules['lbpAccountNo'] = 'required|unique:employees,lbp_account_no';
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
            'lbpAccountNo' => 'LBP account no.',
            'dbpAccountNo' => 'DBP account no.'
        ];
    }
}
