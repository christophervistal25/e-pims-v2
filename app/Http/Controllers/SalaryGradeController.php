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
    public function list(Request $request)
    {
    //   return Datatables::of(SalaryGrade::query())->make(true);

      if ($request->ajax()) {
        $data = SalaryGrade::select('*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
   
                       $btn = '<a href="" class="edit btn btn-info btn-sm">View</a>';
     
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    return view('users');
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
            'sgNo'    => 'required|unique:salary_grades,sg_no|in:' . implode(',',range(1, 33)),
            'sgStep1' => 'required',
            'sgStep2' => 'required',
            'sgStep3' => 'required',
            'sgStep4' => 'required',
            'sgStep5' => 'required',
            'sgStep6' => 'required',
            'sgStep7' => 'required',
            'sgStep8' => 'required',
            'sgYear'  => 'required|date_format:Y',
        ]);

        $salarygrade           = new SalaryGrade;
        $salarygrade->sg_no    = $request['sgNo'];   
        $salarygrade->sg_step1 = $request['sgStep1'];
        $salarygrade->sg_step2 = $request['sgStep2'];
        $salarygrade->sg_step3 = $request['sgStep3'];
        $salarygrade->sg_step4 = $request['sgStep4'];
        $salarygrade->sg_step5 = $request['sgStep5'];
        $salarygrade->sg_step6 = $request['sgStep6'];
        $salarygrade->sg_step7 = $request['sgStep7'];
        $salarygrade->sg_step8 = $request['sgStep8'];
        $salarygrade->sg_year  = $request['sgYear' ];
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
