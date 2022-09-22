<?php

namespace App\Http\Controllers\Reports;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CSCPlantillaGenerateRequest;
use App\Services\Reports\PlantillaPositionService;
use Yajra\Datatables\Datatables;

final class CSCPlantillaController extends Controller
{
    public function __construct(private readonly PlantillaPositionService $service)
    {}

    public function list($year = '*')
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->get();
        return Datatables::of($data)->make(true);
    }

    public function index()
    {
        return view('reports.plantilla.index', [
            'class' => 'mini-sidebar',
            'years' => range(2015, date('Y') + 1),
            'reports' => $this->service->getReports(),
        ]);
    }

    public function generate(CSCPlantillaGenerateRequest $request)
    {
        DB::transaction(function () use($request) {
            $id = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->insert([
                'Year'           => $request->year,
                'Asof_date'      => $request->asOfDate,
                'Description'    => $request->description,
                'Plantilla_type' => $request->plantillaType,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]);

            $data = $this->service->getByYear($request->year);

            $records = json_decode($data, true);

            data_set($records, '*.R_Id', DB::connection('E_PIMS_CONNECTION')->getPdo()->lastInsertId(), true);

            $chunkedRecords = array_chunk($records, 20);

            foreach($chunkedRecords as $records) {
                DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->insert($records);
            }
        });

        return response()->json(['success' => true]);
    }

    public function checkpoint(Request $request)
    {
        // $exists = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')
        //         ->where(['Plantilla_type' => $request->plantillaType, 'Year' => $request->year])
        //         ->get()
        //         ->count();
        return response()->json(['success' => true]);
    }

    public function remove(int $id)
    {
        DB::transaction(function () use($id) {
            DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->where('Id', $id)->delete();
            DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('R_Id', $id)->delete();
        });
        return response()->json(['success' => true]);
    }
}
