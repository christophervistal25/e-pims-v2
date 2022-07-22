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
        return Plantilla::with(['plantilla_positions', 'plantilla_positions.position', 'office'])->where('year', $year)->where('employee_id', $employeeID)->first();
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
    public function addNewPlantilla(Plantilla $currentPlantilla, array $data = []): Plantilla
    {
        return Plantilla::create([
            'plantilla_id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'old_item_no' => $currentPlantilla->item_no,
            'item_no' => $data['item_no'],
            'pp_id' => $data['position'],
            'sg_no' => $data['salary_grade'],
            'step_no' => $data['step'],
            'salary_amount' => Str::remove(',', $data['salary_amount']),
            'employee_id' => $data['employee'],
            'area_code' => $data['area_code'],
            'area_type' => $data['area_type'],
            'area_level' => $data['area_level'],
            'date_original_appointment' => $data['original_appointment'],
            'date_last_promotion' => $data['last_promotion'],
            'office_code' => $data['office'],
            'division_id' => $data['division'] ?? 0,
            'status' => $data['status'],
            'year' => date('Y'),
        ]);
    }
}
