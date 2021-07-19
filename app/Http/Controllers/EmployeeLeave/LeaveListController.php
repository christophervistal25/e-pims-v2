<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveListController extends Controller
{
    //Leave List
    public function index()
    {
        return view('leave.leave-list');
    }
}
