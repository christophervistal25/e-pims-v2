<?php

namespace App\Http\Controllers;

use App\Office;
use App\Setting;
use App\Division;
use App\Section;
use App\Position;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

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
        $position = Position::select('PosCode', 'Description', 'sg_no', 'isJocos')->where('isJocos', NULL)->get();
        $lastId = Position::latest('PosCode')->first();
        $areacode = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Area_code')->get();
        $areatype = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Area_type')->get();
        $arealevel = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Area_level')->get();
        $section = DB::connection('E_PIMS_CONNECTION')->table('Sections')->orderBy('section_name')->get();
        $division = Division::with('offices')->orderBy('division_name')->get();
        $class = 'mini-sidebar';
        return view('PlantillaOfPosition.PlantillaOfPosition', compact('position', 'office', 'lastId', 'areacode', 'areatype', 'arealevel', 'section', 'division', 'class'));
    }

    public function list(string $office = '*')
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.plantilla_positions')
        ->leftJoin('EPims.dbo.Divisions', 'plantilla_positions.division_id', '=', 'Divisions.division_id')
        ->leftJoin('EPims.dbo.Sections', 'plantilla_positions.section_id', '=', 'Sections.section_id')
        ->join('DTRPayroll.dbo.Position', 'plantilla_positions.PosCode', '=', 'Position.PosCode')
        ->join('EPims.dbo.Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
        ->select('pp_id', 'office_name', 'Description', 'plantilla_positions.sg_no as sg_no', 'item_no', 'plantilla_positions.old_position_name as position', 'Divisions.division_name as division_name', 'Sections.section_name as section_name')
        ->orderBy('item_no', 'desc');

        if (request()->ajax()) {
            $PlantillaPositionData = ($office != '*') ? $data->where('plantilla_positions.office_code', $office)->get()
            : $data->get();

            return DataTables::of($PlantillaPositionData)
            ->addColumn('action', function ($row) {
                $btn = "<a title='Edit Plantilla Of Position' href='".route('plantilla-of-position.edit', $row->pp_id)."' class=' text-white edit btn btn-success  mr-1'><i class='la la-pencil'></i></a>";
                $btn = $btn."<a title='Delete Plantilla Of Position' id='delete' value='$row->pp_id' class='delete  delete btn btn-danger  mr-1'><i class='la la-trash'></i></a>
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
        $plantillaposition->division_id = $request['divisionId'];
        $plantillaposition->section_id = $request['sectionId'];
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
        $areacode = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Area_code')->get();
        $areatype = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Area_type')->get();
        $arealevel = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Area_level')->get();
        $section = DB::connection('E_PIMS_CONNECTION')->table('Sections')->orderBy('section_name')->get();
        $division = Division::orderBy('division_name')->get();

        $officeCode = $plantillaofposition->office_code;
        $division_id = $plantillaofposition->division_id;
        $divisionedit = Division::where('office_code', $officeCode)->get(['division_id', 'division_name', 'office_code']);
        $sectionedit = Section::where('division_id', $division_id)->get(['section_id', 'section_name', 'division_id']);
        $class = 'mini-sidebar';
        return view('PlantillaOfPosition.edit', compact('plantillaofposition', 'position', 'office', 'areacode','areatype','arealevel', 'section', 'division', 'divisionedit', 'sectionedit', 'class'));
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
        $plantillaposition->PosCode = $request['positionTitle'];
        $plantillaposition->sg_no = $request['salaryGrade'];
        $plantillaposition->office_code = $request['officeCode'];
        $plantillaposition->old_position_name = $request['positionOldName'];
        $plantillaposition->area_code = $request['areaCode'];
        $plantillaposition->area_type = $request['areaType'];
        $plantillaposition->area_level = $request['areaLevel'];
        $plantillaposition->division_id = $request['divisionId'];
        $plantillaposition->section_id = $request['sectionId'];
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
