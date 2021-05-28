<?php

namespace App\Http\Requests\C1;

use Illuminate\Foundation\Http\FormRequest;

class EducationalBackgroundRequest extends FormRequest
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
            'elementary'    => [],
            'ebasicEduc'    => [],
            'eperiodFrom'   => ['nullable', 'required_with:elementary', 'date', 'before:eperiodTo'],
            'eperiodTo'     => ['nullable', 'required_with:eperiodFrom', 'date', 'after:eperiodFrom'],
            'eunitEarned'   => [],
            'eyrGrad'       => ['required_with:eunitEarned'],
            'escholarship'  => [],
            'snameOfSchool' => [],
            'sbasicEduc'    => [],
            'speriodFrom'   => ['required_with:snameOfSchool'],
            'speriodTo'     => ['required_with:speriodFrom'],
            'sunitEarned'   => [],
            'syrGrad'       => ['required_with:sunitEarned'],
            'sscholarship'  => [],
            'vnameOfVoc'    => [],
            'vbasicEduc'    => [],
            'vperiodFrom'   => ['nullable', 'required_with:vnameOfVoc', 'date', 'before:vperiodTo'],
            'vperiodTo'     => ['nullable', 'required_with:vperiodFrom', 'date', 'after:vperiodFrom'],
            'vunitEarned'   => [],
            'vyrGrad'       => ['required_with:vunitEarned'],
            'vscholarship'  => [],
            'cnameOfSchool' => [],
            'cbasicEduc'    => [],
            'cperiodFrom'   => ['nullable', 'required_with:cnameOfSchool', 'date', 'before:cperiodTo'],
            'cperiodTo'     => ['nullable', 'required_with:cperiodFrom', 'date', 'after:cperiodFrom'],
            'cunitEarned'   => [],
            'cyrGrad'       => ['required_with:cunitEarned'],
            'cscholarship'  => [],
            'gnameOfSchool' => [],
            'gbasicEduc'    => [],
            'gperiodFrom'   => ['nullable', 'required_with:gnameOfSchool', 'date', 'before:gperiodTo'],
            'gperiodTo'     => ['nullable', 'required_with:gperiodFrom', 'date', 'after:gperiodFrom'],
            'gunitEarned'   => [],
            'gyrGrad'       => ['required_with:gunitEarned'],
            'gscholarship'  => []
        ];
    }

    public function attributes()
    {
        return [
            'eperiodFrom' => 'Period of attendance (FROM)',
            'eperiodTo'   => 'Period of attendance (TO)',
            'eyrGrad'     => 'Year Graduated',

            'speriodFrom' => 'Period of attendance (FROM)',
            'speriodTo'   => 'Period of attendance (TO)',
            'syrGrad'     => 'Year Graduated',

            'vperiodFrom' => 'Period of attendance (FROM)',
            'vperiodTo'   => 'Period of attendance (TO)',
            'vyrGrad'     => 'Year Graduated',

            'cperiodFrom' => 'Period of attendance (FROM)',
            'cperiodTo'   => 'Period of attendance (TO)',
            'cyrGrad'     => 'Year Graduated',

            'gperiodFrom' => 'Period of attendance (FROM)',
            'gperiodTo'   => 'Period of attendance (TO)',
            'gyrGrad'     => 'Year Graduated',


        ];
    }
}
