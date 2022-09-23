<?php

namespace App\Services;

use App\Plantilla;
use App\Setting;
use Illuminate\Support\Str;

class PlantillaPersonnelService
{
    /**
     * It returns the first record of the `Plantilla` model where the year is equal to the `year`
     * parameter and the `employee_id` is equal to the `employeeID` parameter
     *
     * @param int year 2019
     * @param string employeeID is the employee's ID
     * @return Plantilla A single record from the database.
     */
    public function getPersonnelPlantilla(int $year, string $employeeID): Plantilla
    {
        return Plantilla::with(['plantilla_positions', 'plantilla_positions.position', 'plantilla_positions.division', 'plantilla_positions.section', 'plantilla_positions.office'])
                        ->where('year', $year)
                        ->where('employee_id', $employeeID)
                        ->first();
    }

    /**
     * It deletes the current plantilla
     *
     * @param Plantilla plantilla The plantilla object that you want to delete.
     * @return bool The return value is a boolean value.
     */
    public function removeCurrentPlantilla(Plantilla $currentPlantilla): bool
    {
        return $currentPlantilla->delete();
    }

    /**
     * It creates a new plantilla record and increments the AUTONUMBER2 setting by 1
     *
     * @param Plantilla currentPlantilla the current plantilla that is being edited
     * @param array data array of data to be inserted
     * @return Plantilla The newly created Plantilla.
     */
    public function addNewPlantilla($currentPlantilla, array $data = []): Plantilla
    {
        return tap(Plantilla::where('pp_id', $data['position'])->first())->update([
            'employee_id'          => $data['employee'],
            'old_item_no'          => $data['old_item_no'],
            'original_appointment' => $currentPlantilla->original_appointment,
            'date_last_promotion'  => $data['date_promotion'],
        ]);
    }
}
