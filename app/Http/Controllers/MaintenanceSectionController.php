<?php

namespace App\Http\Controllers;

use App\Office;
use App\Section;
use App\Setting;
use App\Division;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MaintenanceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::get(['office_code', 'office_name']);
        $division = Division::get(['division_id', 'division_name', 'office_code']);
        return view('MaintenanceSection.section', compact('office', 'division'));
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


    public function list(string $office = '*')
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('Sections')
        ->join('Divisions', 'Sections.division_id', '=', 'Divisions.division_id')
        ->join('Offices', 'Sections.office_code', '=', 'Offices.office_code')
        ->select('Sections.section_id', 'Sections.section_name', 'Sections.division_id', 'Divisions.division_name', 'Offices.office_name');

        if (request()->ajax()) {
            $sectionData = ($office != '*') ? $data->where('Sections.office_code', $office)->get()
            : $data->get();
            return Datatables::of($sectionData)
                    ->addColumn('action', function ($row) {
                        $btn = "<a title='Edit Section' href='".route('maintenance-section.edit', $row->section_id)."' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                        $btn = $btn."<a title='Delete Section' id='delete' value='$row->section_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
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
            'sectionName' => 'required',
            'officeCode' => 'required',
            'divisionCode' => 'required',
        ]);

        $section = new Section();
        $section->section_id = tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue;
        $section->section_name = $request['sectionName'];
        $section->office_code = $request['officeCode'];
        $section->division_id = $request['divisionCode'];
        $section->save();

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
    public function edit($section_id)
    {
        $division = Division::get(['division_id', 'division_name']);

        $section = DB::connection('E_PIMS_CONNECTION')->table('Sections')->where('section_id', $section_id)->first();
        return view('MaintenanceSection.edit', compact('section', 'division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $section_id)
    {
        $this->validate($request, [
            'sectionName' => 'required',
            'divisionId' => 'required',
        ]);
        DB::connection('E_PIMS_CONNECTION')->table('Sections')
        ->where('section_id', $section_id)
        ->update(['section_name' => $request['sectionName'], 'division_id' => $request['divisionId']]);
        Session::flash('alert-success', 'Section Updated Successfully');
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($section_id)
    {
        DB::connection('E_PIMS_CONNECTION')->table('Sections')->where('section_id', $section_id)->delete();
        return json_encode(['statusCode' => 200]);
    }
}
