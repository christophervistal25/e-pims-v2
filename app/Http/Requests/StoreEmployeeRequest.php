<?php

namespace App\Http\Requests;

use App\Rules\LandbankAccountNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'employeeID' => ['required', 'unique:employees,Employee_id'],
            'firstname'   => ['required'],
            'middlename'  => ['nullable'],
            'lastname'    => ['required'],
            'suffix'      => ['nullable'],
            'birthdate'   => ['required', 'date'],
            'birthplace'   => ['required'],
            'contact_no' => ['nullable', 'regex:/((^(\+)(\d){12}$)|(^\d{11}$))/', 'exclude_if:contact_no,n/a','exclude_if:contact_no,N/A'],
            'office_assignment' => ['required'],
            'office_charging' => ['required'],
            'status'      => ['required'],
            'pagibig_no'    => ['nullable', 'min:10', 'unique:employees,pagibig_no'],
            'philhealth_no' => ['nullable', 'min:10', 'unique:employees,philhealth_no'],
            'gsis_no'       => ['nullable', 'min:10', 'unique:employees,gsis_no'],
            'address' => ['required', 'max:200'],
            'gender' => ['required', 'in:MALE,FEMALE'],
            'tin_no' => ['nullable', 'unique:employees,tin_no'],
            'salary_rate' => ['required', 'numeric', 'min:300'],
            'salary_grade' => ['nullable', 'numeric', 'min:1', 'max:33'],
            'step_increment' => ['nullable', 'numeric', 'min:1', 'max:8'],
            'position' => ['nullable'],
            'username' => ['nullable', 'min:4', 'unique:EPIMS_Users'],
            'password' => ['nullable', 'min:6', 'confirmed'],
        ];

        $rules['dbp_account_no'] = ['nullable', 'numeric', 'digits:10', 'unique:employees,dbp_account_no'];
        $rules['lbp_account_no'] = ['nullable', 'numeric','digits:10', new LandbankAccountNumberRule(), 'unique:employees,lbp_account_no'];

        return $rules;
    }

    public function attributes()
    {
        return [
            'tin_no'            => 'TIN #',
            'gsis_no'           => 'GSIS #',
            'philhealth_no'     => 'Philhealth #',
            'pagibig_no'        => 'Pag-ibig #',
            'office_charging'   => 'Office Charging',
            'office_assignment' => 'Office Assignment',
            'contact_no'        => 'Contact Number',
            'status'            => 'Work Status',
            'lbp_account_no'    => 'Landbank Account Number',
            'dbp_account_no'    => 'DBP Account Number',
            'employeeID' => 'Employee ID'
        ];
    }
}
