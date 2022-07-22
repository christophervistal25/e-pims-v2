<?php

namespace App\Http\Requests\C1;

use Illuminate\Foundation\Http\FormRequest;

class FamilyBackgroundRequest extends FormRequest
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
            'has_spouse' => ['nullable'],
            'spouse_lastname' => ['required_if:has_spouse,true'],
            'spouse_firstname' => ['required_if:has_spouse,true'],
            'spouse_middlename' => ['nullable', 'min:2', 'regex:/^[a-zA-Z ].+$/u'],
            'spouse_extension' => ['nullable', 'min:2', 'regex:/^[a-zA-Z ].+$/u'],
            'spouse_occupation' => [],
            'spouse_employer_business_name' => [],
            'spouse_business_address' => [],
            'spouse_telephone_number' => [],
            'spouse.*.name' => ['nullable'],
            'spouse.*.date_of_birth' => ['required_with:spouse.*.name'],
            'father_lastname' => 'required|regex:/^[a-zA-Z ].+$/u',
            'father_firstname' => 'required_with:father_lastname|regex:/^[a-zA-Z ].+$/u',
            'father_middlename' => 'nullable|regex:/^[a-zA-Z ].+$/u',
            'father_extension' => '',
            'mother_lastname' => 'required|regex:/^[a-zA-Z ].+$/u',
            'mother_firstname' => 'required_with:mother_lastname|regex:/^[a-zA-Z ].+$/u',
            'mother_middlename' => 'nullable|regex:/^[a-zA-Z ].+$/u',
        ];
    }

    public function attributes()
    {
        return [
            'fsurname' => 'Father\'s Surname',
            'ffirstname' => 'Father\'s Firstname',
            'fmiddlename' => 'Father\'s Middlename',
            'msurname' => 'Mother\'s Surname',
            'mfirstname' => 'Mother\'s Firstname',
            'mmiddlename' => 'Mother\'s Middlename',
            'sfirstname' => 'Spouse\'s Firstname',
            'ssurname' => 'Spouse\'s Surname',
            'spouse.*.name' => 'child fullname',
            'spouse.*.date_of_birth' => 'date of birth',
        ];
    }

    public function messages()
    {
        return [
            'spouse.*.date_of_birth.required_with' => 'The Date of birth field is required when Name of children is present.',
        ];
    }
}
