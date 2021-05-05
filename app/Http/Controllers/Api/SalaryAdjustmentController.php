<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalaryGrade;

class SalaryAdjustmentController extends Controller
{
    public function salaryAdjustment($sg_no, $sg_step, $sg_year)
    {
        return SalaryGrade::where('sg_no', $sg_no)
                            ->where('sg_year', $sg_year)
                            ->first(['sg_year' ,'sg_step' . $sg_step]);
    }
}
