<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Plantilla;
use App\Employee;
use App\SalaryGrade;
use App\Office;
class PlantillaController extends Controller
{

    public function employee()
    {
        return Employe::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $employee = Employee::get();
        $office = Office::get();
        $salarygrade = SalaryGrade::get(['sg_no']);
        // $sg_no = 1;
        // $selected_step = 2;
        // $currentSalaryamount = SalaryGrade::where('sg_no', $sg_no)->first(['sg_year', 'sg_step' . $selected_step ]);
        // dd($currentSalaryamount);
        return view('Plantilla.Plantilla', compact('employee', 'office', 'salarygrade'));
    }
    // }
    public function list()
    {
        return Datatables::of(Plantilla::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'old_item_no'                        => 'required',
            'new_item_no'                        => 'required',
            'position_title'                     => 'required',
            'position_title_ext'                 => 'required',
            'employee_id'                        => 'required',
            'employee_name'                      => 'required',
            'current_salary_grade'               => 'required',
            'current_step_no'                    => 'required',
            'current_salary_amount'              => 'required',
            'office_code'                        => 'required',
            'division_code'                      => 'required',
            'date_original_appointment'          => 'required',
            'date_last_promotion'                => 'required',
            'status'                             => 'required',
            'dbm_previous_sg_no'                 => 'required',
            'dbm_previous_step_no'               => 'required',
            'dbm_previous_sg_year'               => 'required',
            'dbm_previous_amount'                => 'required',
            'dbm_current_sg_no'                  => 'required',
            'dbm_current_step_no'                => 'required',
            'dbm_current_sg_year'                => 'required',
            'dbm_current_amount'                 => 'required',
            'csc_previous_sg_no'                 => 'required',
            'csc_previous_step_no'               => 'required',
            'csc_previous_sg_year'               => 'required',
            'csc_previous_amount'                => 'required',
            'csc_current_sg_no'                  => 'required',
            'csc_current_step_no'                => 'required',
            'csc_current_sg_year'                => 'required',
            'csc_current_amount'                 => 'required',
            'area_code'                          => 'required',
            'area_type'                          => 'required',
            'area_level'                         => 'required',
        ]);
        $plantilla = new Plantilla;
        $plantilla->old_item_no          = $request['old_item_no'];
        $plantilla->new_item_no          = $request['new_item_no'];
        $plantilla->position_title      = $request['position_title'];
        $plantilla->position_title_ext  = $request['position_title_ext'];
        $plantilla->employee_id         = $request['employee_id'];
        $plantilla->current_salary_grade = $request['current_salary_grade'];
        $plantilla->current_step_no      = $request['current_step_no'];
        $plantilla->current_salary_amount = $request['current_salary_amount'];
        $plantilla->office_code          = $request['office_code'];
        $plantilla->division_code        = $request['division_code'];
        $plantilla->date_original_appointment = $request['date_original_appointment'];
        $plantilla->date_last_promotion  = $request['date_last_promotion'];
        $plantilla->status               = $request['status'];
        $plantilla->dbm_previous_sg_no   = $request['dbm_previous_sg_no'];
        $plantilla->dbm_previous_step_no = $request['dbm_previous_step_no'];
        $plantilla->dbm_previous_sg_year = $request['dbm_previous_sg_year'];
        $plantilla->dbm_previous_amount  = $request['dbm_previous_amount'];
        $plantilla->dbm_current_sg_no    = $request['dbm_current_sg_no'];
        $plantilla->dbm_current_step_no  = $request['dbm_current_step_no'];
        $plantilla->dbm_current_sg_year  = $request['dbm_current_sg_year'];
        $plantilla->dbm_current_amount   = $request['dbm_current_amount'];
        $plantilla->csc_previous_sg_no   = $request['csc_previous_sg_no'];
        $plantilla->csc_previous_step_no = $request['csc_previous_step_no'];
        $plantilla->csc_previous_sg_year = $request['csc_previous_sg_year'];
        $plantilla->csc_previous_amount  = $request['csc_previous_amount'];
        $plantilla->csc_current_sg_no   = $request['csc_current_sg_no'];
        $plantilla->csc_current_step_no  = $request['csc_current_step_no'];
        $plantilla->csc_current_sg_year  = $request['csc_current_sg_year'];
        $plantilla->csc_current_amount   = $request['csc_current_amount'];
        $plantilla->area_code            = $request['area_code'];
        $plantilla->area_type            = $request['area_type'];
        $plantilla->area_level           = $request['area_level'];
        $plantilla->save();
        return redirect('/plantilla')->with('success','Added Successfully');
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
