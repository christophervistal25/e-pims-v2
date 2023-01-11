<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;

class MaintenancePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId = Position::latest('PosCode')->first();
        $idNUmber = $lastId->PosCode + 1;
        $plusId = '0'.$idNUmber;
        $class = 'mini-sidebar';
        return view('MaintenancePosition.position', compact('plusId', 'class'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Position::select('PosCode', 'Description', 'sg_no', 'position_short_name', 'isJocos')->where('isJocos', NULL)->get();

            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = "<a title='Edit Position' href='".route('maintenance-position.edit', $row->PosCode)."' class=' text-white edit btn btn-success  mr-1'><i class='la la-pencil'></i></a>";
                            $btn = $btn."<a title='Delete Position' id='delete' value='$row->PosCode' class='delete  delete btn btn-danger  mr-1'><i class='la la-trash'></i></a>
                        ";

                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            // return view('MaintenancePosition.position');
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
            'positionCode' => 'required|unique:Position,PosCode',
            'positionName' => 'required',
            'salaryGradeNo' => 'required',
            // 'positionShortName' => 'required',

        ]);
        $position = new Position();

        $position->PosCode = $request['positionCode'];        // $position->position_id = Position::latest('position_id')->first()->position_id + 1 ?? 1;
        $position->Description = $request['positionName'];
        $position->sg_no = $request['salaryGradeNo'];
        $position->position_short_name = $request['positionShortName'];
        $position->save();

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
    public function edit($position_id)
    {
        $position = Position::where('PosCode', $position_id)->first();
        $class = 'mini-sidebar';
        return view('MaintenancePosition.edit', compact('position', 'class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'positionCode' => 'required',
            'positionName' => 'required',
            'salaryGradeNo' => 'required',
        ]);
        $position = Position::where('PosCode', $id)->first();
        $position->PosCode = $request->positionCode;
        $position->Description = $request->positionName;
        $position->sg_no = $request->salaryGradeNo;
        $position->position_short_name = $request->positionShortName;
        $position->save();
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
        Position::where('PosCode', $id)->delete();

        return response()->json(['statusCode' => 200]);
    }

    public function delete($id)
    {
        Position::find($id)->delete();

        return json_encode(['statusCode' => 200]);
    }
}
