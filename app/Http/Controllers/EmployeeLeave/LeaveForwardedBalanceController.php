<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveForwardedBalanceController extends Controller
{
    public function index()
    {
        return view('leave.leave-forwarded-balance');
    }
}



?>