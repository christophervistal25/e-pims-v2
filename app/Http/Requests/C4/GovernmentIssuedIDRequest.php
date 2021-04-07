<?php

namespace App\Http\Requests\C4;

use Illuminate\Foundation\Http\FormRequest;

class GovernmentIssuedIDRequest extends FormRequest
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
            "nameOfGovId"    => ['required'],
            "idNo"           => ['required', 'unique:employee_issued_i_d_s,id_no'],
            "dateOfIssuance" => 'required',
        ];
    }
}
