<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Office;
use App\PlantillaPosition;
use App\PlantillaSchedule;
use Illuminate\Http\Request;

class PrintPlantillaOfScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plantillaOfSchedule.print.printPlantillaOfSchedule');
    }

    public function print($id)
    {
        $plantillaPosition = PlantillaPosition::select('pp_id', 'position_id', 'item_no', 'sg_no', 'office_code', 'old_position_name', 'year')->with('position:position_id,position_name', 'plantillas:pp_id,step_no,salary_amount,employee_id,year,area_code,area_type,area_level', 'salary_grade:sg_no,sg_step1')->where('office_code', $id)->get();
        $plantillaEmployeeid = array_column(array_column($plantillaPosition->toArray(), 'plantillas'), 'employee_id');
        $plantillaPositionPpid = array_column($plantillaPosition->toArray(), 'pp_id');
        $plantillaPositionYear = array_column(array_column($plantillaPosition->toArray(), 'plantillas'), 'year');
        foreach ($plantillaPositionYear as $plantillaPositionYears) {
            $newPlantillaPositionYear[] = $plantillaPositionYears - 1;
        }
        $plantillaSchedule = PlantillaSchedule::select('ps_id', 'pp_id', 'item_no', 'salary_amount', 'date_original_appointment', 'date_last_promotion', 'year', 'status')->whereIn('pp_id', $plantillaPositionPpid)->whereIn('year', $newPlantillaPositionYear)->get();
        $plantillaSchedulePpid = array_column($plantillaSchedule->toArray(), 'pp_id');
        $plantillaScheduleSalaryAmount = array_column($plantillaSchedule->toArray(), 'salary_amount');
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename', 'date_birth')->whereIn('employee_id', $plantillaEmployeeid)->get();
        $item_no = array_column($plantillaSchedule->toArray(), 'item_no');
        $plantillaPositionCount = count($plantillaPosition);
        $office = Office::select('office_code', 'office_short_name', 'office_address')->whereIn('office_code', [$id])->get();

        return view('plantillaOfSchedule.print.previewed', compact('employee', 'plantillaPosition', 'plantillaSchedule', 'plantillaPositionCount', 'office', 'id'));
    }

    public function printList($id)
    {
        $plantillaPosition = PlantillaPosition::select('pp_id', 'position_id', 'item_no', 'sg_no', 'office_code', 'old_position_name', 'year')->with('position:position_id,position_name', 'plantillas:pp_id,step_no,salary_amount,employee_id,year,area_code,area_type,area_level', 'salary_grade:sg_no,sg_step1')->where('office_code', $id)->get();
        $plantillaEmployeeid = array_column(array_column($plantillaPosition->toArray(), 'plantillas'), 'employee_id');
        $plantillaPositionPpid = array_column($plantillaPosition->toArray(), 'pp_id');
        $plantillaPositionYear = array_column(array_column($plantillaPosition->toArray(), 'plantillas'), 'year');
        foreach ($plantillaPositionYear as $plantillaPositionYears) {
            $newPlantillaPositionYear[] = $plantillaPositionYears - 1;
        }
        $plantillaSchedule = PlantillaSchedule::select('ps_id', 'pp_id', 'item_no', 'salary_amount', 'date_original_appointment', 'date_last_promotion', 'year', 'status')->whereIn('pp_id', $plantillaPositionPpid)->whereIn('year', $newPlantillaPositionYear)->get();
        $plantillaSchedulePpid = array_column($plantillaSchedule->toArray(), 'pp_id');
        $plantillaScheduleSalaryAmount = array_column($plantillaSchedule->toArray(), 'salary_amount');
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename', 'date_birth')->whereIn('employee_id', $plantillaEmployeeid)->get();
        $item_no = array_column($plantillaSchedule->toArray(), 'item_no');
        $plantillaPositionCount = count($plantillaPosition);
        $office = Office::select('office_code', 'office_short_name', 'office_address')->whereIn('office_code', [$id])->get();

        return view('plantillaOfSchedule.print.printPlantillaOfSchedule', compact('employee', 'plantillaPosition', 'plantillaSchedule', 'plantillaPositionCount', 'office', 'id'));
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
