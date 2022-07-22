<?php

namespace App\Http\Controllers;

use App\Employee;

class LeaveIncrementJobController extends Controller
{
    public function __invoke()
    {
        $employees = Employee::permanent()->active()
                            ->pluck('Employee_id')
                            ->toArray();
        foreach ($employees as $employee) {
        }

        return true;
    }
}
