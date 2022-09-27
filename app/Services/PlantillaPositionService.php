<?php

namespace App\Services;

use App\PlantillaPosition;
use Illuminate\Database\Eloquent\Collection;

final class PlantillaPositionService
{
    public function positionsByOffice(string $office): Collection
    {
        return PlantillaPosition::with(['position'])->whereHas('plantillas', function($query) {
            $query->whereNull('employee_id');
        })->where('office_code', $office)->get();
    }

    public function getDetails(int $plantillaPositionID): PlantillaPosition
    {
        return PlantillaPosition::with(['plantillas', 'position', 'office', 'areaCode', 'areaType', 'areaLevel', 'division', 'section'])
                                ->find($plantillaPositionID);
    }


    //FIXME
    public function positionsWithPlantillasByOfficeAndYear(string $office, int $year): Collection
    {
        $previousYear = $year - 1;

        return PlantillaPosition::with([
            'plantillas',
            'position',
            'plantillas.Employee',
            'plantillas.division',
            'plantilla_history',
            'plantilla_history.Employee',
            'salary_grade' => function ($query) use ($year, $previousYear) {
                $query->where('sg_year', $year)->orWhere('sg_year', $previousYear);
            }, ])->where('office_code', $office)
            ->get();
    }
}
