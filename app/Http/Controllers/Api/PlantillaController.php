<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalaryGrade;
class PlantillaController extends Controller
{
    public function salarySteplist($sg_no, $sg_step, $sg_year)
    {
        return SalaryGrade::where('sg_no', $sg_no)
                            ->where('sg_year', $sg_year)
                            ->first(['sg_year' ,'sg_step' . $sg_step]);
    }





    
    public function dbmPrevious($sg_no, $sg_step, $sg_year)
    {
        // ->where(['sg_no' => $sg_no, 'sg_year' => $sg_year])
        return SalaryGrade::where('sg_no', $sg_no)
                            ->where('sg_year', $sg_year)
                            ->first(['sg_year' ,'sg_step' . $sg_step]);
    }
    public function dbmCurrent($sg_no, $sg_step, $sg_year)
    {
        return SalaryGrade::where('sg_no', $sg_no)
                            ->where('sg_year', $sg_year)
                            ->first(['sg_year' ,'sg_step' . $sg_step]);
    }
    public function cscPrevious($sg_no, $sg_step, $sg_year)
    {
        return SalaryGrade::where('sg_no', $sg_no)
                            ->where('sg_year', $sg_year)
                            ->first(['sg_year' ,'sg_step' . $sg_step]);
    }
}
