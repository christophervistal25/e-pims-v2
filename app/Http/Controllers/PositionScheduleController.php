<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantillaPosition;
use Yajra\Datatables\Datatables;
use App\Office;
use App\Position;
use App\PositionSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PositionScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::select('OfficeCode', 'Description')->get();
        $PositionScheduleYear = PositionSchedule::select('year')->orderBy('year', 'DESC')->distinct()->get();
        return view('PositionSchedule.PositionSchedule', compact('office', 'PositionScheduleYear'));
    }

    public function list(Request $request)
    {
        $year = Carbon::now()->format('Y') - 1;
        $data = DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
                ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
                ->join('offices', 'plantilla_positions.office_code', '=', 'offices.office_code')
                ->select('pp_id', 'positions.position_name', 'item_no', 'plantilla_positions.sg_no', 'offices.office_name', 'old_position_name', 'year')
                ->where('year' ,'=',  $year)
                ->get();

        return DataTables::of($data)
        ->addColumn('action', function($row){
                $btn = "<a title='Edit Plantilla Of Position' href='". route('position-schedule.edits', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1 id__holder' data-id='".$row->pp_id."'><i class='la la-pencil'></i></a>";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        //old query
        // if ($request->ajax()) {
        //     $year = Carbon::now()->format('Y') - 1;
        //     $data = PlantillaPosition::select('pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name' , 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('year' ,'=',  $year)->orderBy('pp_id', 'DESC');
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('position', function ($row) {
        //                 return $row->position->position_name;
        //             })
        //             ->addColumn('office', function ($row) {
        //                 return $row->office->office_name;
        //             })
        //             ->addColumn('action', function($row){

        //                 $btn = "<a title='Edit Plantilla Of Position' href='". route('position-schedule.edits', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1 id__holder' data-id='".$row['pp_id']."'><i class='la la-pencil'></i></a>";
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        return view('PositionSchedule.PositionSchedule');
    }

    // public function adjustedlist(Request $request, $year = null)
    public function adjustedlist(Request $request, $year)
    {
        $data = DB::connection('E_PIMS_CONNECTION')
                    ->table('position_schedules')
                    ->join('offices', 'position_schedules.office_code', '=', 'offices.office_code')
                    ->join('positions', 'position_schedules.position_id', '=', 'positions.position_id')
                    ->select('pos_id', 'pp_id', 'positions.position_name','item_no', 'position_schedules.sg_no', 'offices.office_name', 'old_position_name' , 'position_schedules.year')
                    ->where('position_schedules.year', $year)
                    ->orderBy('pos_id', 'DESC')
                    ->get();

        return DataTables::of($data)
        ->make(true);
        //old query
        // if ($request->ajax()) {
        //     $data = PositionSchedule::select('pos_id','pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name' , 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('year', $year)->orderBy('pp_id', 'DESC');
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('position', function ($row) {
        //                 return $row->position->position_name;
        //             })
        //             ->addColumn('office', function ($row) {
        //                 return $row->office->office_name;
        //             })
        //             ->make(true);
        // }
        return view('PositionSchedule.PositionSchedule');
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
        //
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
    public function edit($pos_id)
    {
        $PositionSchedule = PositionSchedule::find($pos_id);
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('position_id', 'position_name', 'sg_no')->get();
        return view('PositionSchedule.editPositionSchedule', compact('PositionSchedule', 'office', 'position'));
    }

    public function edits($pp_id)
    {
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('position_id', 'position_name', 'sg_no')->get();
        $plantillaofposition = PlantillaPosition::find($pp_id);
        return view('PositionSchedule.edit', compact('plantillaofposition','position', 'office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pos_id)
    {
        //
    }


    public function updates(Request $request, $pp_id)
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
        Session::flash('alert-success', 'Position Updated Successfully');
        return back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
