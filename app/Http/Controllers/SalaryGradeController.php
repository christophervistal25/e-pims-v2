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
        return view('/salarygrade', compact("salary_grade"));
    }
    public function list(Request $request)
    {
        // return Datatables::of(SalaryGrade::query())->make(true);
        if ($request->ajax()) {
            $data = SalaryGrade::query();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="2" class="edit btn btn-info btn-sm">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('/edit');
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
            'salary_grade_step1' => 'required',
            'salary_grade_step2' => 'required',
            'salary_grade_step3' => 'required',
            'salary_grade_step4' => 'required',
            'salary_grade_step5' => 'required',
            'salary_grade_step6' => 'required',
            'salary_grade_step7' => 'required',
            'salary_grade_step8' => 'required',
            'salary_grade_year' => 'required',
        ]);

        $salarygrade = new SalaryGrade;
        $salarygrade->salary_grade_step1=$request['salary_grade_step1'];
        $salarygrade->salary_grade_step2=$request['salary_grade_step2'];
        $salarygrade->salary_grade_step3=$request['salary_grade_step3'];
        $salarygrade->salary_grade_step4=$request['salary_grade_step4'];
        $salarygrade->salary_grade_step5=$request['salary_grade_step5'];
        $salarygrade->salary_grade_step6=$request['salary_grade_step6'];
        $salarygrade->salary_grade_step7=$request['salary_grade_step7'];
        $salarygrade->salary_grade_step8=$request['salary_grade_step8'];
        $salarygrade->salary_grade_year=$request['salary_grade_year'];
        $salarygrade->save();
        return redirect('/salary_grade')->with('success','Added Successfully');
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
