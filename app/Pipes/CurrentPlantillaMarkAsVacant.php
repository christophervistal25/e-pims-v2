<?php

namespace App\Pipes;

use App\Plantilla;
use Illuminate\Support\Str;
use App\Services\SalaryGradeService;

final class CurrentPlantillaMarkAsVacant
{
    private const TWELVE_MONTHS = 12;

    public function __construct(private readonly SalaryGradeService $salaryGradeService)
    {}

    public function handle($data)
    {
        return $this->markAsVacant($data);
    }

    private function getSalaryAmountForItemWithStepOne(int $year, int $grade)
    {
       return Str::remove(",", $this->salaryGradeService->getSalaryAmount(grade: $grade, step: 1, year: $year));
    }

    private function markAsVacant($data)
    {
        $plantilla = Plantilla::where(['employee_id' => $data['employee_id'], 'year' => $data['current_salary_grade_year']])
                            ->first();

        $plantilla->employee_id                   = null;
        $plantilla->old_item_no                   = null;
        $plantilla->date_original_appointment     = null;
        $plantilla->date_last_promotion           = null;
        $plantilla->date_last_increment           = null;
        $plantilla->salary_amount_previous_yearly = null;
        $plantilla->salary_amount_previous        = null;
        $plantilla->step_no_previous              = 1;
        $plantilla->step_no                       = 1;
        $plantilla->sg_no_previous                = null;
        $plantilla->salary_amount = $this->getSalaryAmountForItemWithStepOne($data['current_salary_grade_year'], $plantilla->sg_no);
        $plantilla->salary_amount_yearly = $plantilla->salary_amount * self::TWELVE_MONTHS;

        return $plantilla;
    }
}
