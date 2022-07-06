<?php

namespace App\Http\Requests\Employee;

use App\Rules\LandBankRule;
use App\Rules\UpdateTrapfullname;
use Illuminate\Support\Facades\Auth;
use App\Rules\LandbankAccountNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'employeeID' => ['required', 'unique:employees,Employee_id,' . request('employeeID') . ',Employee_id'],
            'firstname'   => ['required'],
            'middlename'  => ['nullable'],
            'lastname'    => ['required'],
            'suffix'      => ['nullable'],
            'birthdate'   => ['required', 'date'],
            'birthplace'   => ['required'],
            'contact_no' => ['nullable', 'regex:/((^(\+)(\d){12}$)|(^\d{11}$))/', 'exclude_if:contact_no,n/a', 'exclude_if:contact_no,N/A'],
            'office_assignment' => ['required', 'exists:Office,OfficeCode'],
            'office_charging' => ['required', 'exists:Office2,OfficeCode2'],
            'status'      => ['required'],
            'pagibig_no'    => ['nullable', 'min:10', 'unique:employees,pagibig_no,' . request('employeeID') . ',Employee_id'],
            'philhealth_no' => ['nullable', 'min:10', 'unique:employees,philhealth_no,' . request('employeeID') . ',Employee_id'],
            'gsis_no'       => ['nullable', 'min:10', 'unique:employees,gsis_no,' . request('employeeID') . ',Employee_id'],
            'address' => ['required', 'max:200'],
            'gender' => ['required', 'in:MALE,FEMALE'],
            'tin_no' => ['nullable', 'unique:employees,tin_no,' . request('employeeID') . ',Employee_id'],
            'salary_rate' => ['required', 'numeric', 'min:300'],
            'salary_grade' => ['nullable', 'numeric', 'min:1', 'max:33'],
            'step_increment' => ['nullable', 'numeric', 'min:1', 'max:8'],
            'position' => ['nullable'],
            'username' => ['nullable', 'min:4', 'unique:EPIMS_Users,username,' . request('employeeID') . ',Employee_id'],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ];

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
            'lbp_account_no'            => 'Landbank Account Number',
            'dbp_account_no'            => 'DBP Account Number',
        ];
    }
}
