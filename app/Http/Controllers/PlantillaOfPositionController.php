<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Yajra\Datatables\Datatables;
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

        return view('PlantillaOfPosition.PlantillaOfPosition');
    }

    public function list(Request $request )
    {
        // return DataTables::of(Position::query())->make(true);
        if ($request->ajax()) {
            $data = Position::select('position_id', 'position_code', 'position_name', 'sg_no', 'position_short_name')->orderBy('position_code', 'DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-position.edit', $row->position_id) . "' class='rounded-circle text-white edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
                        $btn = $btn."<a title='Delete Position' id='delete' value='$row->position_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('PlantillaOfPosition.PlantillaOfPosition');
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
            'positionCode'                 => 'required',
            'positionName'                 => 'required|unique:positions,position_name',
            'salaryGrade'                  => 'required | in:' . implode(',',range(1, 33)),
            'positionNameShortname'        => 'required'
        ]);
        $plantillaposition = new Position;
        $plantillaposition->position_code                       = $request['positionCode'];
        $plantillaposition->position_name                       = $request['positionName'];
        $plantillaposition->sg_no                               = $request['salaryGrade'];
        $plantillaposition->position_short_name                 = $request['positionNameShortname'];
        $plantillaposition->save();
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
        $plantillaofposition = Position::find($position_id);
        return view('PlantillaOfPosition.edit', compact('plantillaofposition'));
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
            'positionCode'                 => 'required',
            'positionName'                 => 'required',
            'salaryGrade'                  => 'required | in:' . implode(',',range(1, 33)),
            'positionNameShortname'        => 'required'
        ]);
        $plantillaposition = Position::find($position_id);
        $plantillaposition->position_code                       = $request['positionCode'];
        $plantillaposition->position_name                       = $request['positionName'];
        $plantillaposition->sg_no                               = $request['salaryGrade'];
        $plantillaposition->position_short_name                 = $request['positionNameShortname'];
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
        Position::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }

    public function delete($id)
    {
        Position::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
