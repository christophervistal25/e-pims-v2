<?php

namespace App\Http\Controllers;

use App\Office;
use App\PlantillaPosition;
use App\Position;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;

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
        $areacode = DB::table('EPims.dbo.Area_code')->get();
        $areatype = DB::table('EPims.dbo.Area_type')->get();
        $arealevel = DB::table('EPims.dbo.Area_level')->get();
        return view('PlantillaOfPosition.PlantillaOfPosition', compact('position', 'office', 'lastId', 'areacode', 'areatype', 'arealevel'));
    }

    public function list(string $office = '*')
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
        ->join('Positions', 'plantilla_positions.PosCode', '=', 'Positions.PosCode')
        ->join('Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
        ->select('pp_id',  'plantilla_positions.area_level as area_level','Positions.PosCode', 'item_no', 'plantilla_positions.sg_no as sg_no', 'Offices.office_name as office_name', 'Positions.Description as Description', 'old_position_name')->orderBy('item_no', 'desc');

        if (request()->ajax()) {
            $PlantillaPositionData = ($office != '*') ? $data->where('Offices.office_code', $office)->get()
            : $data->get();

            return DataTables::of($PlantillaPositionData)
            ->addColumn('action', function ($row) {
                $btn = "<a title='Edit Plantilla Of Position' href='".route('plantilla-of-position.edit', $row->pp_id)."' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                // $btn = $btn."<a title='Delete Plantilla Of Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                $btn = $btn."<a title='save Plantilla Of Position' id='save' value='$row->pp_id' class=' rounded-circle btn btn-primary btn-sm mr-1'><i class='la la-check'></i></a>
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
        // $this->validate($request, [
        //     'positionTitle' => 'required',
        //     'itemNo' => 'required|numeric',
        //     'salaryGrade' => 'required | in:'.implode(',', range(1, 33)),
        //     'officeCode' => 'required',
        // ]);

        $this->validate($request, [
            'positionTitle' => [
                'required',
                Rule::unique('E_PIMS_CONNECTION.plantilla_positions', 'PosCode')->where(function ($query) use ($request) {
                    return $query
                ->where('PosCode', $request->positionTitle)
                ->where('item_no', $request->itemNo)
                ->where('office_code', $request->officeCode);
                }),
            ],
            'itemNo' => [
                'required',
                Rule::unique('E_PIMS_CONNECTION.plantilla_positions', 'item_no')->where(function ($query) use ($request) {
                    return $query
                ->where('item_no', $request->itemNo)
                ->where('PosCode', $request->positionTitle)
                ->where('office_code', $request->officeCode);
                }),
            ],
            'salaryGrade' => 'required | in:'.implode(',', range(1, 33)),
            'officeCode' => [
                'required',
                Rule::unique('E_PIMS_CONNECTION.plantilla_positions', 'office_code')->where(function ($query) use ($request) {
                    return $query
                ->where('office_code', $request->officeCode)
                ->where('PosCode', $request->positionTitle)
                ->where('item_no', $request->itemNo);
                }),
            ],
            'areaCode' => 'required',
            'areaType' => 'required',
            'areaLevel' => 'required',
        ]);




        $plantillaposition = new PlantillaPosition();
        $plantillaposition->pp_id = tap(Setting::where('Keyname', 'PP_ID')->first())->increment('Keyvalue', 1)->Keyvalue;
        $plantillaposition->PosCode = $request['positionTitle'];
        $plantillaposition->item_no = $request['itemNo'];
        $plantillaposition->sg_no = $request['salaryGrade'];
        $plantillaposition->office_code = $request['officeCode'];
        $plantillaposition->old_position_name = $request['positionOldName'];
        $plantillaposition->area_code = $request['areaCode'];
        $plantillaposition->area_type = $request['areaType'];
        $plantillaposition->area_level = $request['areaLevel'];
        $plantillaposition->save();

        return response()->json(['success' => true]);
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
        $areacode = DB::table('EPims.dbo.Area_code')->get();
        $areatype = DB::table('EPims.dbo.Area_type')->get();
        $arealevel = DB::table('EPims.dbo.Area_level')->get();
        return view('PlantillaOfPosition.edit', compact('plantillaofposition', 'position', 'office', 'areacode','areatype','arealevel'));
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
            'itemNo' => 'required|numeric',
            'salaryGrade' => 'required | in:'.implode(',', range(1, 33)),
            'officeCode' => 'required',
            'areaCode' => 'required',
            'areaType' => 'required',
            'areaLevel' => 'required',
        ]);
        $plantillaposition = PlantillaPosition::find($pp_id);
        $plantillaposition->item_no = $request['itemNo'];
        $plantillaposition->sg_no = $request['salaryGrade'];
        $plantillaposition->office_code = $request['officeCode'];
        $plantillaposition->old_position_name = $request['positionOldName'];
        $plantillaposition->area_code = $request['areaCode'];
        $plantillaposition->area_type = $request['areaType'];
        $plantillaposition->area_level = $request['areaLevel'];
        $plantillaposition->save();

        return response()->json(['success' => true]);
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
        return json_encode(['statusCode' => 200]);
    }
}
