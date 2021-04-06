<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\StepIncrement;
use App\Plantilla;

class SalaryAdjustmentController extends Controller
{
    public function index()
    {
        $employee = Employee::with('plantilla')->get();
        return view('SalaryAdjustment.SalaryAdjustment', compact('employee'));
        
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
        // $this->validate($request, [
        //     'plantilla_id' => 'required',
        //     // 'employee_id' => 'required',
        //     // 'new_item_no' => 'required',
        //     // 'employee_name' => 'required',
        //     // 'position_title' => 'required',
        //     'date_step_increment' => 'required',
        //     // 'date_last_promotion' => 'required',
        //     'sg_no_from' => 'required',
        //     'step_no_from' => 'required',
        //     'sg_year_from' => 'required',
        //     // 'amount' => 'required',
        //     'sg_no_to' => 'required',
        //     'step_no_to' => 'required',
        //     'sg_year_to' => 'required',
        //     // 'amount_to' => 'required',
        //     // 'monthlyDifference' => 'required',
        // ]);

            $step_increment = New StepIncrement;
            $step_increment->plantilla_id=$request['plantillaId'];
            $step_increment->date_step_increment=$request['dateIncrement'];
            $step_increment->date_latest_appointment=$request['datePromotion'];
            $step_increment->sg_no_from=$request['sgNo'];
            $step_increment->step_no_from=$request['stepNo'];
            $step_increment->sg_year_from=$request['sgYear'];
            // $step_increment->salary_amount_from=$request['amount'];
            $step_increment->sg_no_to=$request['sgNo2'];
            $step_increment->step_no_to=$request['stepNo2'];
            $step_increment->sg_year_to=$request['sgYear2'];
            // $step_increment->salary_amount_to=$request['amount2'];
            // $step_increment->monthly_difference=$request['monthlyDifference'];
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
