<?php

namespace App\Http\Requests\PersonalDataSheet;

use Illuminate\Foundation\Http\FormRequest;

class PersonInformationFormRequest extends FormRequest
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
            "surname"         => "",
            "firstname"       => "",
            "middlename"      => "",
            "nameExtension"   => "",
            "dateOfBirth"     => "",
            "placeOfBirth"    => "",
            "sex"             => "",
            "height"          => "",
            "weight"          => "",
            "bloodtype"       => "",
            "gsisIdNo"        => "",
            "pagibigIdNo"     => "",
            "philHealthIdNo"  => "",
            "sssIdNo"         => "",
            "tinIdNo"         => "",
            "agencyEmpIdNo"   => "",
            "citizenship"     => "",
            "citizenshipBy"   => "",
            "country"         => "",
            "telephoneNumber" => "",
            "mobileNumber"    => "",
            "lotno"           => "",
            "street"          => "",
            "subdivision"     => "",
            "barangay"        => "",
            "city"            => "",
            "province"        => "",
            "zipcode"         => "",
        ];
    }
}
