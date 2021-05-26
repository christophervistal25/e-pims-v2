<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalaryGrade;
use App\Position;
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
        return Position::with('salary_grade')->find($position_id);
    }

    // add position function
    public function addPosition(Request $request){
           $this->validate($request, [
            'positionCode'  => 'required|unique:positions,position_code',
            'positionName'  => 'required|unique:positions,position_name',
            'salaryGrades'  => 'required|in:' . implode(',',range(1, 33)),
            'positionShortName'  => 'required',
        ]);
        $addPosition = new Position;
        $addPosition->position_code     = $request['positionCode'];
        $addPosition->position_name     = $request['positionName'];
        $addPosition->salary_grade     = $request['salaryGrades'];
        $addPosition->position_short_name     = $request['positionShortName'];
        $addPosition->save();
        return response()->json(['success'=>true, 'position_id' => $addPosition->position_id]);

    }
}
