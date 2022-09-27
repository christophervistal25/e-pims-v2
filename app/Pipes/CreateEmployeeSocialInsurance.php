<?php

namespace App\Pipes;

class CreateEmployeeSocialInsurance
{
    public function handle($employee)
    {
        return $this->prepare($employee);
    }

    private function prepare($employee)
    {
        $employee->philhealth_no = request()->philhealth_no;
        $employee->pagibig_no   = request()->pagibig_no;
        $employee->tin_no        = request()->tin_no;
        $employee->gsis_no       = request()->gsis_no;
        return $employee;
    }
}
