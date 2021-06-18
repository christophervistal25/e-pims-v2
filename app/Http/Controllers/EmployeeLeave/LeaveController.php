<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return view('leave.leave-starting-balance');
    }
    
    public function show()
    {
        return view('leave.leave-application');
    }

    public function create()
    {
        return view('leave.leave-monitoring');
    }
}