<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class MaintenancePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId = Position::latest('position_code')->first();
        return view('MaintenancePosition.position', compact('lastId'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Position::select('position_id','position_code', 'position_name', 'sg_no', 'position_short_name')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Position' href='". route('maintenance-position.edit', $row->position_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                        $btn = $btn."<a title='Delete Position' id='delete' value='$row->position_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    return view('MaintenancePosition.position');
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
            'positionCode'                 => 'required|unique:positions,position_code',
            'positionName'                 => 'required',
            'salaryGradeNo'                => 'required',
            'positionShortName'            => 'required',

        ]);
        $position = new Position;
        $position->position_code                = $request['positionCode'];
        $position->position_name                = $request['positionName'];
        $position->sg_no                        = $request['salaryGradeNo'];
        $position->position_short_name          = $request['positionShortName'];
        $position->save();
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
    public function edit($position_id)
    {
        $position = Position::find($position_id);
        return view('MaintenancePosition.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $position_id)
    {
        $this->validate($request, [
            'positionCode'                   => 'required',
            'positionName'                   => 'required',
            'salaryGradeNo'                  => 'required',
            'positionShortName'              => 'required',
        ]);
        $position                               = Position::find($position_id);
        $position->position_code                = $request['positionCode'];
        $position->position_name                = $request['positionName'];
        $position->sg_no                        = $request['salaryGradeNo'];
        $position->position_short_name          = $request['positionShortName'];
        $position->save();
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
        Position::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }

    public function delete($id)
    {
        Position::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
