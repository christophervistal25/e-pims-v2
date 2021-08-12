<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveCardController extends Controller
{
    public function index()
    {
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find(Auth::user()->employee_id);
        return view('accounts.employee.leave.leave-card', compact('employee'));
    }
}
