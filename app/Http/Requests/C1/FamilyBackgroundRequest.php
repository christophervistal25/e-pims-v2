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
            'ssurname'     => [],
            'sfirstname'   => [],
            'smiddleame'   => [],
            'snameexten'   => [],
            'soccupation'  => [],
            'sempname'     => [],
            'sbusadd'      => [],
            'stelno'       => [],
            'cname'        => [],
            'cdateOfBirth' => [],
            'fsurname'     => 'required|regex:/^[a-zA-Z]+$/u',
            'ffirstname'   => 'required|regex:/^[a-zA-Z]+$/u',
            'fmiddlename'  => 'required|regex:/^[a-zA-Z]+$/u',
            'fnameexten'   => '',
            'msurname'     => 'required|regex:/^[a-zA-Z]+$/u',
            'mfirstname'   => 'required|regex:/^[a-zA-Z]+$/u',
            'mmiddlename'  => 'required|regex:/^[a-zA-Z]+$/u',
        ];
    }

    public function attributes()
    {
        return [
            'fsurname'     => 'Father\'s Surname',
            'ffirstname'   => 'Father\'s Firstname',
            'fmiddlename ' => 'Father\'s Middlename',
            'msurname'    => 'Mother\'s Surname',
            'mfirstname'   => 'Mother\'s Firstname',
            'mmiddlename'  => 'Mother\'s Middlename',
        ];
    }
}
