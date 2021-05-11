<?php

namespace App\Rules;

use App\Employee;
use Illuminate\Contracts\Validation\Rule;

class UpdateTrapfullname implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $employee = Employee::where(['lastname' => request()->lastName, 'firstname' => request()->firstName, 'middlename' => request()->middleName, 'extension' => request()->extension, 'date_birth' => request()->dateOfBirth])->where('employee_id', '!=', request()->employee_id)->count();
        return !$employee;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This employee already exists.';
    }
}
