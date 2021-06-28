<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\PlantillaPosition;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\Office;
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
        $position = Position::select('position_id', 'position_name', 'sg_no')->get();
        return view('PlantillaOfPosition.PlantillaOfPosition', compact('position', 'office'));
    }

    public function list(Request $request )
    {
        if ($request->ajax()) {
            $data = PlantillaPosition::select('pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name')->with('position:position_id,position_name', 'office:office_code,office_name')->orderBy('pp_id', 'DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('position', function ($row) {
                        return $row->position->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_name;
                    })
                    ->addColumn('action', function($row){

                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-position.edit', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
                        $btn = $btn."<a title='Delete Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
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
            'positionTitle'                 => 'required',
            'itemNo'                        => 'required|numeric',
            'salaryGrade'                   => 'required | in:' . implode(',',range(1, 33)),
            'officeCode'                    => 'required',
        ]);
        $plantillaposition = new PlantillaPosition;
        $plantillaposition->position_id                       = $request['positionTitle'];
        $plantillaposition->item_no                           = $request['itemNo'];
        $plantillaposition->sg_no                             = $request['salaryGrade'];
        $plantillaposition->office_code                       = $request['officeCode'];
        $plantillaposition->old_position_name                 = $request['positionOldName'];
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
    public function edit($pp_id)
    {
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('position_id', 'position_name', 'sg_no')->get();
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
        PlantillaPosition::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }

    public function delete($id)
    {
        PlantillaPosition::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
