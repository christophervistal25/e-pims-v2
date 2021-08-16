<?php

namespace App\Rules;

use App\CompensatoryLeave;
use Illuminate\Contracts\Validation\Rule;

class CompensatoryDateEarned implements Rule
{
    public $month;
    public $year;
    public $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($month, $year, $id)
    {
        $this->month = $month;
        $this->year = $year;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !CompensatoryLeave::where('employee_id', $this->id)->whereMonth('date_added', $this->month)->whereYear('date_added', $this->year)->exists();                                                                                                                                                 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '<small>Compensatory is given monthly.</small>';
    }
}
