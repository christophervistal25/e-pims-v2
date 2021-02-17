<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryGrade;
use Yajra\Datatables\Datatables;

class SalaryGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary_grade = SalaryGrade::get();
        return view('SalaryGrade.SalaryGrade');
    }
    public function list()
    {
      return Datatables::of(SalaryGrade::query())->make(true);
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
            'sg_no'    => 'required',
            'sg_step1' => 'required',
            'sg_step2' => 'required',
            'sg_step3' => 'required',
            'sg_step4' => 'required',
            'sg_step5' => 'required',
            'sg_step6' => 'required',
            'sg_step7' => 'required',
            'sg_step8' => 'required',
            'sg_year'  => 'required',
        ]);

        $salarygrade           = new SalaryGrade;
        $salarygrade->sg_no = $request['sg_no'];   
        $salarygrade->sg_step1 = $request['sg_step1'];
        $salarygrade->sg_step2 = $request['sg_step2'];
        $salarygrade->sg_step3 = $request['sg_step3'];
        $salarygrade->sg_step4 = $request['sg_step4'];
        $salarygrade->sg_step5 = $request['sg_step5'];
        $salarygrade->sg_step6 = $request['sg_step6'];
        $salarygrade->sg_step7 = $request['sg_step7'];
        $salarygrade->sg_step8 = $request['sg_step8'];
        $salarygrade->sg_year = $request['sg_year' ];
        $salarygrade->save();
        return redirect('/salary-grade')->with('success','Added Successfully');
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
