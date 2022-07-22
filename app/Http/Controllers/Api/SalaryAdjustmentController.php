<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SalaryGrade;
use App\Setting;
use Illuminate\Http\Request;

class SalaryAdjustmentController extends Controller
{
    public function salaryAdjustment($sg_no, $sg_step, $sg_year)
    {
        return SalaryGrade::where('sg_no', $sg_no)
                            ->where('sg_year', $sg_year)
                            ->first(['sg_year', 'sg_step'.$sg_step]);
    }

    public function printEdit(Request $request)
    {
        $Setting = Setting::find($request['key_id']);
        $Setting->key_value = $request['key_value'];
        $Setting->save();

        return response()->json(['success' => true]);
    }
}
