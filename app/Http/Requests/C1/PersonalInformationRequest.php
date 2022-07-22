<?php

namespace App\Http\Requests\C1;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInformationRequest extends FormRequest
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
        $sex = ['MALE', 'FEMALE'];
        $status = ['SINGLE', 'MARRIED', 'WIDOWED', 'SEPARATED', 'OTHERS'];

        return [
            'Employee_id' => ['required', 'unique:Employees,Employee_id,'.request()->idNumber.',Employee_id'],
            'LastName' => 'required|regex:/^[a-zA-Z ].+$/u',
            'FirstName' => 'required|regex:/^[a-zA-Z ].+$/u',
            'MiddleName' => ['nullable', 'regex:/^[a-zA-Z].+$/u', 'min:2'],
            'Suffix' => ['nullable', 'max:5'],
            'Birthdate' => 'required',
            'BirthPlace' => 'required',
            'Gender' => 'required|in:'.implode(',', $sex),
            'CivilStatus' => 'required|in:'.implode(',', $status),
            'other_status' => ['nullable', 'required_if:CivilStatus,OTHERS'],
            'height' => ['nullable', 'between:0,99.99'],
            'weight' => ['nullable', 'between:0,99.99'],
            'blood_type' => ['nullable', 'max:3'],
            'gsis_id_no' => ['nullable',  'exclude_if:gsis_id_no,n/a', 'exclude_if:gsis_id_no,N/A', 'unique:Employees,gsis_id_no,'.request()->idNumber.',Employee_id'],
            'pagibig_no' => ['nullable', 'exclude_if:pagibig_no,n/a', 'exclude_if:pagibig_no,N/A', 'unique:Employees,pagibig_no,'.request()->idNumber.',Employee_id'],
            'philhealth_no' => ['nullable', 'exclude_if:philhealth_no,n/a', 'exclude_if:philhealth_no,N/A', 'unique:Employees,philhealth_no,'.request()->idNumber.',Employee_id'],
            'sss_no' => ['nullable', 'exclude_if:sss_no,n/a', 'exclude_if:sss_no,N/A', 'unique:Employees,sss_no,'.request()->idNumber.',Employee_id'],
            'tin_no' => ['nullable', 'exclude_if:tin_no,n/a', 'exclude_if:tin_no,N/A',  'unique:Employees,tin_no,'.request()->idNumber.',Employee_id'],
            'agency_employee_no' => ['nullable', 'exclude_if:agency_employee_no,n/a', 'exclude_if:agency_employee_no,*'],
            'citizenship' => ['required'],
            'citizenship_by' => ['required_if:citizenship,DUAL CITIZEN'],
            'indicate_country' => ['required_if:citizenship,DUAL CITIZEN'],
            'telephone_no' => [],
            'ContactNumber' => ['nullable', 'max:13', 'min:11'],
            'email' => [],
            'residential_house_no' => ['nullable'],
            'residential_street' => ['nullable'],
            'residential_village' => ['nullable'],
            'residentialProvince.province_code' => ['required', 'exists:Provinces,province_code'],
            'residentialCity.city_code' => ['required', 'exists:Cities,city_code'],
            'residentialBarangay.barangay_code' => ['required', 'exists:Barangays,barangay_code'],
            'residentialZipCode' => ['required', 'min:4', 'max:4'],
            'permanent_house_no' => [],
            'permanent_street' => [],
            'permanent_village' => [],
            'permanentProvince.province_code' => ['required', 'exists:Provinces,province_code'],
            'permanentCity.city_code' => ['required', 'exists:Cities,city_code'],
            'permanentBarangay.barangay_code' => ['required', 'exists:Barangays,barangay_code'],
            'permanentZipCode' => ['required', 'min:4', 'max:4'],
        ];
    }

    public function attributes()
    {
        return [
            'BirthPlace' => 'Place of birth',
            'Gender' => 'sex',
            'residentialProvince.province_code' => 'residential province',
            'residentialCity.city_code' => 'residential city',
            'residentialBarangay.barangay_code' => 'residential barangay',
            'permanentProvince.province_code' => 'permanent province',
            'permanentCity.city_code' => 'permanent city',
            'permanentBarangay.barangay_code' => 'permanent barangay',
        ];
    }
}
