<?php

namespace App\Services;

use App\PlantillaPosition;
use Illuminate\Database\Eloquent\Collection;

class PlantillaPositionService
{

      /**
       * It returns a collection of plantilla positions that don't have plantillas and are in the
       * specified office
       * 
       * @param string office the office code
       * 
       * @return Collection A collection of plantilla positions that do not have a plantilla.
       */
      public function positionsByOffice(string $office) :Collection
      {
            return PlantillaPosition::with('position')->whereDoesntHave('plantillas', function ($query) {
                $query->where('year', date('Y'));
            })->where('office_code', $office)->get();
      }

      /**
       * It returns a PlantillaPosition object from the database
       * 
       * @param int plantillaPositionID The ID of the plantilla position you want to get the details
       * of.
       * 
       * @return PlantillaPosition A single record from the database.
       */
      public function getPlantillaPositionDetails(int $plantillaPositionID) :PlantillaPosition
      {
            return PlantillaPosition::find($plantillaPositionID);
      }
}
