<?php

namespace App\Actions\Employees;

use App\Employee;

class GetEmployeePersonnelFiles
{
    public function handle(string $employeeID)
    {
        return Employee::with(['file_records', 'file_records.file_details'])
                        ->without(['position', 'office_charging', 'office_assignment'])
                        ->find($employeeID, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix']);
    }

    public function asApi(string $employeeID)
    {
        return $this->handle($employeeID);
    }
}
