<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonalDataSheetController extends Controller
{
    public function index()
    {
        $employee = Employee::fetchWithFullInformation(Auth::user()->employee_id);
        return view('accounts.employee.personal_data_sheet.index', compact('employee'));
    }

    public function edit()
    {
        $employee = Employee::fetchWithFullInformation(Auth::user()->employee_id);
        return view('accounts.employee.personal_data_sheet.edit', compact('employee'));
    }
}
