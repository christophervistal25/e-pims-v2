<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalaryGrade;
class PlantillaController extends Controller
{
    // public function process()
    // {
    //     return response()->json(['success' => true]);
    // }
    public function salaryList($sg_no)
    {
        // // return SalaryGrade::where('sg_no', $sg_no)->first(['sg_year', 'sg_step' . $sg_no ]);
        // $stepNo = 2;
        return SalaryGrade::where('sg_no', $sg_no)->first();
    }
    public function salarySteplist($sg_no, $sg_step)
    {
        return SalaryGrade::where('sg_no', $sg_no)->first(['sg_step' . $sg_step ]);
    }
}
