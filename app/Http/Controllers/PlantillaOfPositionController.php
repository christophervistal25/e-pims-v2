<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Yajra\Datatables\Datatables;
// use Illuminate\Support\Facades\Session;
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

    public function list()
    {
        return DataTables::of(Position::query())->make(true);
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
            'positionName'                 => 'required',
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
    public function edit($id)
    {
        //
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
        //
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
