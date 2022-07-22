<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;

class LeaveStartingBalanceController extends Controller
{
    public function index()
    {
        return view('leave.leave-starting-balance');
    }
}
