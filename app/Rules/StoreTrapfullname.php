<?php

namespace App\Rules;

use App\Employee;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class StoreTrapfullname implements Rule
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
        $records = Employee::where('lastname', Str::upper(request()->lastName))
                ->where('firstname', Str::upper(request()->firstName))
                ->where('middlename', Str::upper(request()->middleName))
                ->where('extension', Str::upper(request()->extension))
                ->where('date_birth', request()->dateOfBirth)
                ->count();
            
        return $records <= 0;
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
