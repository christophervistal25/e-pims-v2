<?php
namespace App\Pipes;

use Error;
use App\Employee;

class EditEmployee
{
    public function __construct(private readonly Employee $employee)
    {}

    public function handle($data)
    {
        $employee = $this->employee->find($data['employeeID']);
        return $this->edit($employee, $data);
    }

    private function edit(Employee $employee, array $data = []) : Employee
    {
        $employee->FirstName     = $data['firstname'];
        $employee->LastName      = $data['lastname'];
        $employee->MiddleName    = $data['middlename'];
        $employee->Suffix        = $data['suffix'];
        $employee->Birthdate     = $data['birthdate'];
        $employee->BirthPlace    = $data['birthplace'];
        $employee->Gender        = $data['gender'];
        $employee->CivilStatus   = $data['civil_status'];
        $employee->Address       = $data['address'];
        $employee->ContactNumber = $data['contact_no'];
        $employee->isActive      = $data['active_status'];
        $employee->OfficeCode    = $data['office_charging'];
        $employee->OfficeCode2   = $data['office_assignment'];
        $employee->Work_Status   = $data['status'];
        $employee->salary_rate   = $data['salary_rate'];
        $employee->sg_no         = $data['salary_grade'];
        $employee->step          = $data['step_increment'];

        return $employee;
    }
}
