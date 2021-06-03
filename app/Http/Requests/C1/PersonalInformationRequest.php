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
            'surname'                  => 'required|regex:/^[a-zA-Z ].+$/u',
            'firstname'                => 'required|regex:/^[a-zA-Z ].+$/u',
            'middlename'               => ['nullable', 'regex:/^[a-zA-Z].+$/u', 'min:2'],
            'nameExtension'            => ['nullable'],
            'dateOfBirth'              => 'required',
            'placeOfBirth'             => 'required',
            'sex'                      => 'required|in:' . implode(',', $sex),
            'status'                   => 'required|in:'  . implode(',', $status),
            'other_status'             => ['nullable', 'required_if:status,OTHERS'],
            'height'                   => ['required','between:0,99.99'],
            'weight'                   => ['required', 'between:0,99.99'],
            'bloodType'                => ['required', 'max:3'],
            'gsisIdNo'                 => [],
            'pagibigIdNo'              => [],
            'philHealthIdNo'           => [],
            'sssIdNo'                  => [],
            'tinIdNo'                  => [],
            'agencyEmpIdNo'            => [],
            'citizenship'              => ['required'],
            'citizenshipBy'            => ['required_if:citizenship,DUAL CITIZEN'],
            'country'                  => ['required_if:citizenship,DUAL CITIZEN'],
            'telephoneNumber'          => [],
            'mobileNumber'             => ['required', 'max:13', 'min:11', 'unique:employees,mobile_no'],
            'emailAddress'             => [],
            'residentialLotNo'         => [],
            'residentialStreet'        => [],
            'residentialSubdivision'   => [],
            'residentialBarangay.code' => ['required', 'exists:barangays,code'],
            'residentialCity.code'     => ['required', 'exists:cities,code'],
            'residentialProvince.code' => ['required', 'exists:provinces,code'],
            'residentialZipCode'       => ['required', 'min:4', 'max:4'],
            'permanentLotNo'           => [],
            'permanentStreet'          => [],
            'permanentSubdivision'     => [],
            'permanentBarangay.code'   => ['required', 'exists:barangays,code'],
            'permanentCity.code'       => ['required', 'exists:cities,code'],
            'permanentProvince.code'   => ['required', 'exists:provinces,code'],
            'permanentZipCode'         => ['required', 'min:4', 'max:4']
        ];
    }

    public function attributes()
    {
        return [
            'residentialProvince.code' => 'residential province',
            'residentialCity.code'     => 'residential city',
            'residentialBarangay.code' => 'residential barangay',
            'permanentProvince.code'   => 'permanent province',
            'permanentCity.code'       => 'permanent city',
            'permanentBarangay.code'   => 'permanent barangay',
        ];
    }
}
