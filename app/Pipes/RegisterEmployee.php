<?php

namespace App\Pipes;

class RegisterEmployee
{
    public function handle($employee)
    {
        $employee = tap($employee)->save();
        return $employee;
    }
}
