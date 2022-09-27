<?php

namespace App\Pipes;

class EditEmployeeSocialInsurance
{
    public function handle($employee)
    {
        return $this->edit($employee);
    }

    private function edit($employee)
    {
        $employee->philhealth_no = request()->philhealth_no;
        $employee->pagibig_no    = request()->pagibig_no;
        $employee->tin_no        = request()->tin_no;
        $employee->gsis_no       = request()->gsis_no;

        return $employee;
    }
}
