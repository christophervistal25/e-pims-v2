<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Services\EmployeeBirthdayService;
use Carbon\Carbon;

class BirthdayCardController extends Controller
{
    public function __construct(public EmployeeBirthdayService $birthdayService)
    {
    }

    public function firstCard(string $name)
    {
        [$employeeID, $name] = explode('-', $name);
        $employee = Employee::find($employeeID, ['Employee_id', 'BirthDate']);
        $ageOrdinal = $this->birthdayService->transformToOrdinal(Carbon::parse($employee->BirthDate)->age);

        return view('birthday-card', compact('name', 'employeeID', 'ageOrdinal'));
    }

    public function secondCard(string $name)
    {
        [$employeeID, $name] = explode('-', $name);
        $employee = Employee::find($employeeID, ['Employee_id', 'BirthDate']);
        $ageOrdinal = $this->birthdayService->transformToOrdinal(Carbon::parse($employee->BirthDate)->age);

        return view('birthday-card-2', compact('name', 'employeeID', 'ageOrdinal'));
    }
}
