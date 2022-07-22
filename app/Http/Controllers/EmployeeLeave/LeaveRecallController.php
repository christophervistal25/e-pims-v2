<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;

class LeaveRecallController extends Controller
{
    public function index()
    {
        return view('leave.leave-recall');
    }
}
