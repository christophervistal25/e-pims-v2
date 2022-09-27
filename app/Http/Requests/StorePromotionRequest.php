<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules() :array
    {
        return [
            'employee' => ['required', 'exists:E_PIMS_CONNECTION.plantillas,employee_id'],
            'office' => ['required', 'exists:E_PIMS_CONNECTION.Offices,office_code'],
            'position' => ['required'],
            'old_item_no' => ['required', 'integer'],
            'item_no' => ['required', 'integer'],
            'salary_grade_year' => ['required', 'digits:4', 'integer'],
            'salary_grade' => ['required', 'integer', 'min:1', 'max:33'],
            'step' => ['required', 'integer', 'min:1', 'max:8'],
            'salary_amount' => ['required'],
        ];
    }

    public function attributes() :array
    {
        return [
            'employee' => 'employee name'
        ];
    }
}
