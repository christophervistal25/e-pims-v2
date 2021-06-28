<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompensatoryBuildUpController extends Controller
{
    public function index()
    {
        return view('leave.compensatory-build-up');
    }
}





?>