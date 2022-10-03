<?php

namespace App\Pipes;

use App\Plantilla;
use Illuminate\Support\Str;
use App\Services\SalaryGradeService;

final class CreateNewPlantillaForEmployee
{
    private const TWELVE_MONTHS = 12;

    public function __construct(private readonly SalaryGradeService $salaryGradeService)
    {}

    public function handle($plantilla)
    {
        return $this->createNewPlantilla(current : $plantilla);
    }

    private function getSalaryAmountForItemWithStepOne(int $year, int $grade)
    {
       return Str::remove(",", $this->salaryGradeService->getSalaryAmount(grade: $grade, step: 1, year: $year));
    }

    private function createNewPlantilla(Plantilla $current)
    {
        $plantilla = Plantilla::where(['year' => request()->salary_grade_year, 'pp_id' => request()->position])->first();
        $plantilla->step_no                       = 1;
        $plantilla->old_item_no                   = $current->item_no;
        $plantilla->salary_amount                 = $this->getSalaryAmountForItemWithStepOne(request()->salary_grade_year, request()->salary_grade);
        $plantilla->salary_amount_yearly          = $plantilla->salary_amount * self::TWELVE_MONTHS;
        $plantilla->sg_no_previous                = null;
        $plantilla->step_no_previous              = null;
        $plantilla->salary_amount_previous        = $this->getSalaryAmountForItemWithStepOne(request()->salary_grade_year, request()->salary_grade);
        $plantilla->salary_amount_previous_yearly = $this->getSalaryAmountForItemWithStepOne(request()->salary_grade_year, request()->salary_grade) * self::TWELVE_MONTHS;
        $plantilla->date_original_appointment     = $current->getOriginal('date_original_appointment');
        $plantilla->employee_id                   = request()->employee;
        $plantilla->date_last_promotion           = request()->date_promotion;
        $plantilla->date_last_increment = $current->getOriginal('date_last_increment');
        $current->save();

        return $current;
    }
}
