<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return view('leave.index');
    }
    
    public function show()
    {
        return view('leave.leave-application');
    }
}