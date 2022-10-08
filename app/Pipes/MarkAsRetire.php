<?php

namespace App\Pipes;

use App\Employee;

final class MarkAsRetire
{
    public function handle($plantilla)
    {
        $employee = Employee::find($plantilla->getOriginal('employee_id'), ['Employee_id', 'IsActive']);
        $employee->isActive = 0;
        $employee->save();
        $plantilla->save();
    }
}
