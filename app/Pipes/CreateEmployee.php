<?php
namespace App\Pipes;

use App\Employee;

class CreateEmployee
{
    public function __construct(private readonly Employee $employee)
    {}

    public function handle($data)
    {
        return $this->prepare($data);
    }

    private function prepare(array $data = [])
    {
        return new $this->employee([
            'Employee_id'   => $data['employeeID'],
            'FirstName'     => $data['firstname'],
            'LastName'      => $data['lastname'],
            'MiddleName'    => $data['middlename'],
            'Suffix'        => $data['suffix'],
            'Birthdate'     => $data['birthdate'],
            'BirthPlace'    => $data['birthplace'],
            'Gender'        => $data['gender'],
            'CivilStatus'   => $data['civil_status'],
            'Address'       => $data['address'],
            'ContactNumber' => $data['contact_no'],
            'isActive'      => $data['active_status'],
            'OfficeCode'    => $data['office_charging'],
            'OfficeCode2'   => $data['office_assignment'],
            'Work_Status'   => $data['status'],
            'salary_rate'   => $data['salary_rate'],
            'sg_no'         => $data['salary_grade'],
            'step'          => $data['step_increment'],
        ]);
    }
}
