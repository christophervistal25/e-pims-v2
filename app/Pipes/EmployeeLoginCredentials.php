<?php

namespace App\Pipes;

use App\User;

class EmployeeLoginCredentials
{
    public function __construct(private readonly User $user)
    {}

    public function handle($employee)
    {
        $this->perform($employee);
    }


    private function perform($employee)
    {
        $data = ['user_type' => request()->user_type];

        if (! is_null(request()->username) ) {
            data_set($data, 'username', request()->username);
        }

        if(! is_null(request()->password)) {
            data_set($data, 'password', bcrypt(request()->password));
        }

        return $this->user->updateOrCreate(['Employee_id' => $employee->Employee_id], $data);
    }

}
