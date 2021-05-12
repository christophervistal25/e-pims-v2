<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrintIncrement;
use App\StepIncrement;
use App\Office;
use App\Employee;

class PrintIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stepIncrement.print.printIncrement');
    }

    public function print($id)
    {
        $stepIncrement = StepIncrement::with(['employee:employee_id,firstname,middlename,lastname,extension', 'employee.information:EmpIDNo,office_code,pos_code', 'employee.information.office', 'employee.information.position'])->find($id);

        return view('stepIncrement.print.previewed', compact('stepIncrement'));
        // return view('stepIncrement.print.printIncrement', compact('stepIncrement'));
    }

    public function printList($id)
    {
        $stepIncrement = StepIncrement::with(['plantilla', 'plantilla.position', 'plantilla.office'])->find($id);
        // dd($stepIncrement->employee);
        // dd($stepIncrement->employee->information->position->position_name);
        // $data = PrintIncrement::with('step-increment')->find($id);
        return view('stepIncrement.print.printIncrement', compact('stepIncrement', 'id'));
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
