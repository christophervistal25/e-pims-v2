<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use App\Division;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class MaintenanceDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::select('office_code', 'office_name')->get();
        return view('MaintenanceDivision.division', compact('office'));
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
            'divisionName'               => 'required',
            'officeCode'                 => 'required',
        ]);
        $division = new Division;
        $division->division_name                = $request['divisionName'];
        $division->office_code                = $request['officeCode'];
        $division->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Division::select('division_id','division_name', 'office_code')->with('offices:office_code,office_name,office_short_name')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('offices', function ($row) {
                        return $row->offices->office_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Division' href='". route('maintenance-division.edit', $row->division_id) . "' class='rounded-circle text-white edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
                        $btn = $btn."<a title='Delete Division' id='delete' value='$row->division_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    return view('MaintenanceDivision.division');
        }
    }


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
    public function edit($division_id)
    {
        $office = Office::select('office_code', 'office_name')->get();
        $division = Division::find($division_id);
        return view('MaintenanceDivision.edit', compact('division', 'office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $division_id)
    {
        $this->validate($request, [
            'divisionName'                   => 'required',
            'officeCode'                   => 'required',
        ]);
        $division                               = Division::find($division_id);
        $division->division_name                = $request['divisionName'];
        $division->office_code                = $request['officeCode'];
        $division->save();
        Session::flash('alert-success', 'Division Updated Successfully');
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
        Division::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }

    public function delete($id)
    {
        Division::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
