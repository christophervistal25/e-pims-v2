<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BirthdaysRangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'from' => ['date', 'required', 'before_or_equal:to'],
            'to' => ['date', 'required', 'after_or_equal:from'],
        ];
    }

    public function attributes():array
    {
        return [
            'from' => 'Start Date',
            'to' => 'End Date'
        ];
    }
}
