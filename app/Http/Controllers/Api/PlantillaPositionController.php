<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
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

    public function itemNo($office_code)
    {
        $total = DB::connection('E_PIMS_CONNECTION')
        ->table('EPims.dbo.plantilla_positions')
        ->select('office_code', 'item_no')
        ->where('office_code', $office_code)
        ->count();
        return $total;
    }
}
