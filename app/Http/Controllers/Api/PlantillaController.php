<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalaryGrade;
use App\Position;
use App\PlantillaPosition;
use App\Plantilla;
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
    //position display sg
    public function positionSalaryGrade($position_id)
    {
        return PlantillaPosition::with('salary_grade')->find($position_id);
    }

    // add position function
    public function addPosition(Request $request){
           $this->validate($request, [
            'addPositionCode'  => 'required|unique:Position,PosCode',
            'addPositionName'  => 'required|unique:Position,Description',
            'addSalaryGrade'  => 'required|in:' . implode(',',range(1, 33)),
            'addPositionShortName'  => 'required',
        ]);
        $addPosition = new Position;
        $addPosition->PosCode     = $request->addPositionCode;
        $addPosition->Description     = $request->addPositionName;
        $addPosition->sg_no     = $request->addSalaryGrade;
        $addPosition->position_short_name     = $request->addPositionShortName;
        $addPosition->save();
        return response()->json(['success'=>true, 'PosCode' => $addPosition->PosCode]);

    }
}
