<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\StepIncrement;
use App\Plantilla;

class StepIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::with(['plantilla', 'plantilla.position'])->get();
        return view('StepIncrement.StepIncrement', compact('employee'));
        
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
                'employee_id' => 'required',
                'date_step_increment' => 'required',                
                'sg_no_to' => 'required',
                'step_no_to' => 'required',                
                'amount_to' => 'required',
        
         ]);

        $step_increment = New StepIncrement;
        $step_increment->employee_id=$request['employeeId'];
        $step_increment->item_no=$request['item_no'];
        $step_increment->position_id=$request['position_id'];
        $step_increment->date_step_increment=$request['dateStepIncrement'];
        $step_increment->date_latest_appointment=$request['datePromotion'];
        $step_increment->sg_no_from=$request['sgNo'];
        $step_increment->step_no_from=$request['stepNo'];            
        $step_increment->salary_amount_from=$request['amount'];
        $step_increment->sg_no_to=$request['sg_no2'];
        $step_increment->step_no_to=$request['stepNo2'];
        $step_increment->salary_amount_to=$request['amount2'];            
        $step_increment->salary_diff=$request['monthlyDifference'];
        $step_increment->save();
        return redirect('/print-increment')->with('success','Successfully Added!');
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
