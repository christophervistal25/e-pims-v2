<?php

namespace App\Http\Controllers;

use App\OfficeCharging;
use App\Plantilla;
use App\Setting;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PlantillaOfScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillaYear = Plantilla::select('year')
            ->distinct()
            ->orderBy('year', 'DESC')
            ->pluck('year')
            ->toArray();

        $currentYear = date('Y');

        // Check if plantilla year has current year
        if (! in_array($currentYear, $plantillaYear)) {
            $plantillaYear[] = $currentYear;
        }

        $PlantillaOfScheduleYear = [];

        $office = OfficeCharging::select('OfficeCode', 'Description')->get();

        return view('PlantillaOfSchedule.PlantillaOfSchedule', compact('office', 'plantillaYear', 'PlantillaOfScheduleYear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(string $office = '*', string $year = '*')
    {
        $records = Plantilla::with(['Employee', 'plantilla_positions', 'office']);

        if ($office !== '*') {
            $records->where('office_code', $office);
        }

        if ($year !== '*') {
            $records->where('year', $year);
        }

        $datatables = DataTables::of($records->get());

        $datatables->addColumn('action', function ($row) use ($year) {
            $class = $row->year == $year ? 'present_element' : '';

            $btn = "<a title='Edit Plantilla' 
                        href='".route('plantilla-of-personnel.edit', $row->plantilla_id)."' 
                        class='rounded-circle text-white edit btn btn-success btn-sm $class' 
                        data-id='".$row->plantilla_id."'>
                            <i class='la la-pencil'></i>
                    </a>";
            // $btn .= "&nbsp; <a title='Delete Plantilla' class='rounded-circle text-white edit btn btn-danger btn-sm id__holder' data-id='".$row->plantilla_id."'><i class='la la-trash'></i></a>";
            return $btn;
        });

        return $datatables->make(true);
    }

    /**
     * Responsible method for create new plantilla schedule.
     */
    public function store(Request $request)
    {
        $currentYear = $request->coveredYear - 1;

        foreach ($request->ids as $plantillaID) {
            $plantilla = Plantilla::where('year', $currentYear)->find($plantillaID);
            $currentData = $plantilla->getAttributes();
            $currentData['plantilla_id'] = tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue;
            $currentData['year'] = $currentYear + 1;

            unset($currentData['created_at']);
            unset($currentData['updated_at']);

            Plantilla::updateOrCreate([
                'year' => $currentData['year'],
                'status' => $currentData['status'],
                'office_code' => $currentData['office_code'],
                'employee_id' => $currentData['employee_id'],
                'pp_id' => $currentData['pp_id'],
            ], $currentData);
        }

        return response()->json(['success' => true]);
    }

    public function generate(Request $request)
    {
        $currentYear = date('Y');
        $fetchYear = date('Y') - 1;
        Plantilla::with('plantilla_positions')->where('year', $fetchYear)->get()->each(function ($record) use ($currentYear) {
            $currentData = $record->getAttributes();
            $currentData['plantilla_id'] = tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue;
            $currentData['year'] = $currentYear;

            unset($currentData['created_at']);
            unset($currentData['updated_at']);

            Plantilla::updateOrCreate([
                'year' => $currentData['year'],
                'status' => $currentData['status'],
                'office_code' => $currentData['office_code'],
                'employee_id' => $currentData['employee_id'],
                'pp_id' => $currentData['pp_id'],
            ], $currentData);
        });

        return response()->json(['success' => true]);
    }
}
