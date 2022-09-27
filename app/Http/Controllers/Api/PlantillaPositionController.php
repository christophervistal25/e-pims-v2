<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PlantillaPositionService;

class PlantillaPositionController extends Controller
{
    public function __construct(public PlantillaPositionService $plantillaPositionService)
    {
    }

    public function positionsByOffice(string $office)
    {
        return response()->json(['positions' => $this->plantillaPositionService->positionsByOffice($office)]);
    }

    public function getPositionDetails(int $plantillaPositionID)
    {
        return $this->plantillaPositionService->getDetails($plantillaPositionID);
    }
}
