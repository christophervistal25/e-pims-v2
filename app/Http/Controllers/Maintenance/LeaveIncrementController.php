<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\LeaveIncrement;
use Illuminate\Http\Request;

class LeaveIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maintenance.leave.leaveIncrement');
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
        //update for sick .

        $increments = LeaveIncrement::where('id', $id)->get();
        if ($id == 1) {
            foreach ($increments as $increment) {
                // Insert Record with As of.
                $increment->increment = $request['sick_increment'];
                $increment->description = $request['sick_description'];
                $increment->save();
            }
        } elseif ($id == 2) {
            foreach ($increments as $increment) {
                // Insert Record with As of.
                $increment->increment = $request['vacation_increment'];
                $increment->description = $request['vacation_description'];
                $increment->save();
            }
        }

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
        //
    }
}
