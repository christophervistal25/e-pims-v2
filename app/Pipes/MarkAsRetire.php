<?php

namespace App\Pipes;

use App\Employee;

final class MarkAsRetire
{
    public function handle($data)
    {
        $employee = Employee::find($data['employee_id'], ['Employee_id', 'IsActive']);
        $employee->isActive = 0;
        $employee->save();
    }
}
