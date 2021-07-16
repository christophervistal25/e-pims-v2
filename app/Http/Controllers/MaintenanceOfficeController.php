<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class MaintenanceOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('MaintenanceOffice.office');
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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Office::select('office_code','office_name', 'office_short_name', 'office_address', 'office_head', 'office_short_address', 'position_name')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Office' href='". route('maintenance-office.edit', $row->office_code) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                        $btn = $btn."<a title='Delete Office' id='delete' value='$row->office_code' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    return view('MaintenancePosition.position');
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
            'officeCode'                 => 'required|numeric',
            'officeName'                 => 'required',
            'officeShortName'            => 'required',
            'officeHead'                 => 'required',
            'positionName'               => 'required',
        ]);
        $office = new Office;
        $office->office_code                = $request['officeCode'];
        $office->office_name                = $request['officeName'];
        $office->office_short_name          = $request['officeShortName'];
        $office->office_address             = $request['officeAddress'];
        $office->office_short_address       = $request['officeShortAddress'];
        $office->office_head                = $request['officeHead'];
        $office->position_name              = $request['positionName'];
        $office->save();
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
    public function edit($office_code)
    {
        $office = Office::find($office_code);
        return view('MaintenanceOffice.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $office_code)
    {
        $this->validate($request, [
            'officeCode'                 => 'required|numeric',
            'officeName'                 => 'required',
            'officeShortName'            => 'required',
            'officeHead'                 => 'required',
            'positionName'               => 'required',
        ]);
        $office                             = Office::find($office_code);
        $office->office_code                = $request['officeCode'];
        $office->office_name                = $request['officeName'];
        $office->office_short_name          = $request['officeShortName'];
        $office->office_address             = $request['officeAddress'];
        $office->office_short_address       = $request['officeShortAddress'];
        $office->office_head                = $request['officeHead'];
        $office->position_name              = $request['positionName'];
        $office->save();
        Session::flash('alert-success', 'Office Updated Successfully');
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
        Office::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }

    public function delete($id)
    {
        Office::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
