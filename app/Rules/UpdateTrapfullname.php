<?php

namespace App\Rules;

use App\Employee;
use Illuminate\Contracts\Validation\Rule;

class UpdateTrapfullname implements Rule
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
            $employee = Employee::where('lastname', $this->data['lastname'])
                                ->where('firstname', $this->data['firstname'])
                                ->orWhere('middlename', $this->data['middlename'])
                                ->orWhere('extension', $this->data['extension'])
                                ->where('date_birth', $this->data['date_of_birth'])
                                ->where('employee_id', '!=', $this->data['employee_id'])
                                ->count();
        } else {
            $employee = Employee::where('lastname', request()->lastName)
                                ->where('firstname', request()->firstName)
                                ->orWhere('middlename', request()->middleName)
                                ->orWhere('extension', request()->extension)
                                ->where('date_birth', request()->dateOfBirth)
                                ->where('employee_id', '!=', request()->employee_id)
                                ->count();
        }
        return $employee <= 0;
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
