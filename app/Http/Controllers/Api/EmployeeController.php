<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    // Method to display all employee in PDS
    public function list()
    {
        return Employee::select(['employee_id', 'lastname', 'firstname', 'middlename', 'extension'])->paginate(10);
    }

    public function show(string $employeeIdNumber) :Employee
    {
        return Employee::fetchWithFullInformation($employeeIdNumber);
    }

    public function records()
    {
        return Employee::select(['employee_id', 'lastname', 'firstname', 'middlename', 'extension'])->paginate(10);
    }

}
