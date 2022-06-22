<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SalaryGradeService;

class SalaryGradeController extends Controller
{
      public function __construct(public SalaryGradeService $salaryGradeService)
      {
      }

      /**
       * > This function returns the salary amount for a given grade, step, and year
       * 
       * @param int grade The grade of the employee
       * @param int step The step of the salary grade.
       * @param int year The year of the salary grade.
       * 
       * @return The salary amount for the given grade, step, and year.
       */
      public function salary(int $grade, int $step, int $year)
      {
            return $this->salaryGradeService->getSalaryAmount($grade, $step, $year);
      }
}
