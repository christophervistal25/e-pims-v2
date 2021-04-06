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
            'surname'                => 'required|regex:/^[a-zA-Z]+$/u',
            'firstname'              => 'required|regex:/^[a-zA-Z]+$/u',
            'middlename'             => ['nullable', 'regex:/^[a-zA-Z]+$/u', 'max:2'],
            'nameExtension'          => ['nullable', 'max:3' , 'regex:/^[a-zA-Z].+$/u'],
            'dateOfBirth'            => 'required',
            'placeOfBirth'           => 'required',
            'sex'                    => 'required|in:' . implode(',', $sex),
            'status'                 => 'required|in:'  . implode(',', $status),
            'height'                 => ['required', 'integer'],
            'weight'                 => ['required', 'integer'],
            'bloodType'              => 'required',
            'gsisIdNo'               => [],
            'pagibigIdNo'            => [],
            'philHealthIdNo'         => [],
            'sssIdNo'                => [],
            'tinIdNo'                => [],
            'agencyEmpIdNo'          => [],
            'citizenship'            => ['required'],
            'citizenshipBy'          => ['required_if:citizenship,DUAL CITIZEN'],
            'country'                => ['required_if:citizenship,DUAL CITIZEN'],
            'telephoneNumber'        => [],
            'mobileNumber'           => ['required', 'max:13', 'min:11', 'unique:employees,mobile_no'],
            'emailAddress'           => [],
            'residentialLotNo'       => [],
            'residentialStreet'      => [],
            'residentialSubdivision' => [],
            'residentialBarangay'    => ['required', 'exists:barangays,code'],
            'residentialCity'        => ['required', 'exists:cities,code'],
            'residentialProvince'    => ['required', 'exists:provinces,code'],
            'residentialZipCode'     => ['required', 'integer'],
            'permanentLotNo'         => [],
            'permanentStreet'        => [],
            'permanentSubdivision'   => [],
            'permanentBarangay'      => ['required', 'exists:barangays,code'],
            'permanentCity'          => ['required', 'exists:cities,code'],
            'permanentProvince'      => ['required', 'exists:provinces,code'],
            'permanentZipCode'       => ['required', 'integer']
        ];
    }
}
