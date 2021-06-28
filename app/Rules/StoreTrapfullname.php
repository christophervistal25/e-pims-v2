<?php

namespace App\Rules;

use App\Employee;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class StoreTrapfullname implements Rule
{
    private $data;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
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
        if(count($this->data) !== 0) {
            $records = Employee::where('lastname', $this->data['lastname'])
                                ->where('firstname', $this->data['firstname'])
                                ->where('middlename', $this->data['middlename'] ?? '')
                                ->where('extension', $this->data['extension'] ?? '')
                                ->where('date_birth', $this->data['date_of_birth'])
                                ->count();
        } else {
            $records = Employee::where('lastname', request()->lastName)
                                ->where('firstname', request()->firstName)
                                ->where('middlename', request()->middleName ?? '')
                                ->where('extension', request()->extension  ?? '')
                                ->where('date_birth', request()->dateOfBirth)
                                ->count();
                                
        }
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
