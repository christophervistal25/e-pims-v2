<?php

namespace App\Http\Controllers;

use App\Office;
use App\Setting;
use App\Position;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PlantillaOfPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('PosCode', 'Description', 'sg_no')->get();
        $lastId = Position::latest('PosCode')->first();
        $year = PlantillaPosition::select('year')->distinct()->orderBy('year', 'DESC')->get();
        $selectedYear = PlantillaPosition::select('year')->orderBy('year', 'DESC')->first();
        return view('PlantillaOfPosition.PlantillaOfPosition', compact('position', 'office', 'lastId', 'year', 'selectedYear'));
    }

    public function list(string $office = '*', $year)
    {
        $data = DB::table('plantilla_positions')->join('Position', 'plantilla_positions.PosCode', '=', 'Position.PosCode')
        ->join('Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
        ->select('pp_id', 'Position.PosCode', 'item_no', 'plantilla_positions.sg_no as sg_no', 'Offices.office_name as office_name', 'Position.Description as Description', 'old_position_name', 'year');

        if (request()->ajax()) {
        $PlantillaPositionData = ($office != '*') ? $data->where('Offices.office_code', $office)->where('year', $year)->get()
            : $data->where('year', $year)->get();
        return DataTables::of($PlantillaPositionData)
        ->addColumn('action', function($row){
                            $btn = "<a title='Edit Plantilla Of Position' href='". route('plantilla-of-position.edit', $row->pp_id) .  "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                            $btn = $btn."<a title='Delete Plantilla Of Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                            ";
                                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('settings')->where('Keyname', 'PP_ID')->first();
        $id = (int)$data->Keyvalue;
        $this->validate($request, [
            'positionTitle'                 => 'required',
            'itemNo'                        => 'required|numeric',
            'salaryGrade'                   => 'required | in:' . implode(',',range(1, 33)),
            'officeCode'                    => 'required',
        ]);

        $plantillaposition = new PlantillaPosition;
        $plantillaposition->pp_id                             = $id;
        $plantillaposition->PosCode                           = $request['positionTitle'];
        $plantillaposition->item_no                           = $request['itemNo'];
        $plantillaposition->sg_no                             = $request['salaryGrade'];
        $plantillaposition->office_code                       = $request['officeCode'];
        $plantillaposition->old_position_name                 = $request['positionOldName'];
        $plantillaposition->year                              = $request['year'];
        $plantillaposition->save();
        Setting::find('PP_id')->increment('Keyvalue');
        return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pp_id)
    {
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('PosCode', 'Description', 'sg_no')->get();
        $plantillaofposition = PlantillaPosition::find($pp_id);
        return view('PlantillaOfPosition.edit', compact('plantillaofposition','position', 'office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pp_id)
    {
        $this->validate($request, [
            'itemNo'                        => 'required|numeric',
            'salaryGrade'                   => 'required | in:' . implode(',',range(1, 33)),
            'officeCode'                    => 'required',
        ]);
        $plantillaposition = PlantillaPosition::find($pp_id);
        $plantillaposition->item_no                           = $request['itemNo'];
        $plantillaposition->sg_no                             = $request['salaryGrade'];
        $plantillaposition->office_code                       = $request['officeCode'];
        $plantillaposition->old_position_name                 = $request['positionOldName'];
        $plantillaposition->year                              = $request['year'];
        $plantillaposition->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlantillaPosition::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
