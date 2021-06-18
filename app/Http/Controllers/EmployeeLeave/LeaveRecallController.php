<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveRecallController extends Controller
{
    public function index()
    {
        return view('leave.leave-recall');
    }
} 






?>