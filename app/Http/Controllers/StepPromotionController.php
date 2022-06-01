<?php

namespace App\Http\Controllers;

use App\Employee;
use App\StepIncrement;
use Illuminate\Http\Request;

class StepPromotionController extends Controller
{
    public function upcomingStep()
    {
        $promotionInSixMonths = Employee::permanent()
            ->where('last_step_increment', '!=', null)
            ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'PosCode', 'OfficeCode', 'first_day_of_service', 'last_step_increment'])
            ->each(function ($employee) {
                $lastStepIncrementPlusThreeYears = $employee->last_step_increment->addYears(3);
                $sixMonthRange = $lastStepIncrementPlusThreeYears->copy();
                $employee->in_range_of_six_months = $employee->last_step_increment->between($sixMonthRange->subMonths(6), $lastStepIncrementPlusThreeYears) ? true : false;
                $employee->in_range_of_six_months = true;

            });
            
            $promotionInSixMonths = $promotionInSixMonths->where('in_range_of_six_months', true);


        return view('StepIncrement.see-more', compact('promotionInSixMonths'));
    }

}
