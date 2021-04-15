<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Plantilla;
use App\SalaryGrade;

class SalaryAdjustmentController extends Controller
{
    public function salaryAdjustment($emp_id)
    {
        return Employee::with('plantilla')->find($emp_id);
    }
}
