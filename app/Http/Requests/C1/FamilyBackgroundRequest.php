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
            'ssurname'     => ['required_if:has_spouse,true'],
            'sfirstname'   => ['required_if:has_spouse,true'],
            'smiddleame'   => [],
            'snameexten'   => [],
            'soccupation'  => [],
            'sempname'     => [],
            'sbusadd'      => [],
            'stelno'       => [],
            'spouse.*.cname'        => ['nullable'],
            'spouse.*.cdateOfBirth' => ['required_with:spouse.*.cname'],
            'fsurname'     => 'required|regex:/^[a-zA-Z ].+$/u',
            'ffirstname'   => 'required_with:fsurname|regex:/^[a-zA-Z ].+$/u',
            'fmiddlename'  => 'nullable|regex:/^[a-zA-Z ].+$/u',
            'fnameexten'   => '',
            'msurname'     => 'required|regex:/^[a-zA-Z ].+$/u',
            'mfirstname'   => 'required_with:msurname|regex:/^[a-zA-Z ].+$/u',
            'mmiddlename'  => 'nullable|regex:/^[a-zA-Z ].+$/u',
        ];
    }

    public function attributes()
    {
        return [
            'fsurname'     => 'Father\'s Surname',
            'ffirstname'   => 'Father\'s Firstname',
            'fmiddlename' => 'Father\'s Middlename',
            'msurname'    => 'Mother\'s Surname',
            'mfirstname'   => 'Mother\'s Firstname',
            'mmiddlename'  => 'Mother\'s Middlename',
            'sfirstname' => 'Spouse\'s Firstname',
            'ssurname' => 'Spouse\'s Surname'
        ];
    }

    public function messages()
    {
        return [
            'spouse.*.cdateOfBirth.required_with' => 'The Date of birth field is required when Name of children is present.'
        ];
    }
}
