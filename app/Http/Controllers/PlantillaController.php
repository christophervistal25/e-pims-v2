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
            'plantillaId'                   => 'required',
            'itemNo'                        => 'required',
            'oldItemNo'                     => 'required',
            'positionTitle'                 => 'required',
            'employeeName'                  => 'required',
            'salaryGrade'                   => 'required',
            'stepNo'                        => 'required',
            'salaryAmount'                  => 'required',
            'officeCode'                    => 'required',
            'divisionId'                    => 'required',
            'originalAppointment'           => 'required',
            'lastPromotion'                 => 'required',
            'status'                        => 'required',
            'areaCode'                      => 'required',
            'areaType'                      => 'required',
            'areaLevel'                     => 'required',
        ]);
        $plantilla = new Plantilla;
        $plantilla->plantilla_id           = $request['plantillaId'];
        $plantilla->item_no                = $request['itemNo'];
        $plantilla->old_item_no            = $request['oldItemNo'];
        $plantilla->position_id            = $request['positionTitle'];
        $plantilla->position_ext           = $request['positionTitleExt'];
        $plantilla->employee_id            = $request['employeeName'];
        $plantilla->sg_no                  = $request['salaryGrade'];
        $plantilla->step_no                = $request['stepNo'];
        $plantilla->salary_amount          = $request['salaryAmount'];
        $plantilla->office_code            = $request['officeCode'];
        $plantilla->division_id            = $request['divisionId'];
        $plantilla->date_original_appointment = $request['originalAppointment'];
        $plantilla->date_last_promotion    = $request['lastPromotion'];
        $plantilla->status                 = $request['status'];
        $plantilla->area_code              = $request['areaCode'];
        $plantilla->area_type              = $request['areaType'];
        $plantilla->area_level             = $request['areaLevel'];
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
