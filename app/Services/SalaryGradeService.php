<?php

namespace App\Services;

use App\SalaryGrade;

class SalaryGradeService
{
    /**
     * It gets the salary amount of a specific grade and step
     *
     * @param int grade Salary Grade
     * @param int step 1-10
     * @param int year the year of the salary grade
     */
    public function getSalaryAmount(int $grade, int $step, int $year): string
    {
        $sg_step = 'sg_step'.$step;

        $grade = SalaryGrade::where('sg_year', $year)
                  ->where('sg_no', $grade)
                  ->first([$sg_step, 'sg_no']);

        return number_format($grade->$sg_step, 2, '.', ',');
    }

    public function yearsAvailable()
    {
        return SalaryGrade::get(['sg_year'])->pluck('sg_year')->unique()->toArray();
    }
}
