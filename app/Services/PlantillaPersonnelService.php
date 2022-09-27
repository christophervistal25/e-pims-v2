<?php

namespace App\Services;

use App\Plantilla;

final class PlantillaPersonnelService
{
    public function __construct(private readonly Plantilla $plantilla)
    {}

    public function getByYearAndEmployeeID(int $year, string $employeeID): Plantilla
    {
        return $this->plantilla
                ->with(['plantilla_positions', 'plantilla_positions.position', 'plantilla_positions.division', 'plantilla_positions.section', 'plantilla_positions.office'])
                ->where('year', $year)
                ->where('employee_id', $employeeID)
                ->first();
    }


    public function addNewPlantilla($currentPlantilla, array $data = []): Plantilla
    {
        return tap(Plantilla::where('pp_id', $data['position'])->first())->update([
            'employee_id'               => $data['employee'],
            'old_item_no'               => $data['old_item_no'],
            'date_original_appointment' => $currentPlantilla->date_original_appointment,
            'date_last_increment'       => $currentPlantilla->date_last_increment,
            'date_last_promotion'       => $data['date_promotion'],
            'step_no'                   => 1,
            'salary_amount_yearly'      => 0,
            'salary_amount'             => 0,
        ]);
    }
}
