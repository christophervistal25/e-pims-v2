<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryGrade;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class SalaryGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $salary_grade = SalaryGrade::get();
        return view('SalaryGrade.SalaryGrade');
    }
    public function list(Request $request)
    {
      if ($request->ajax()) {
        $data = SalaryGrade::select('*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "<a title='Edit Salary Grade' href='". route('salary-grade.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    return view('SalaryGrade.SalaryGrade');
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
            'sgNo'  => [
                'required',
                    Rule::unique('salary_grades','sg_no')->where(function ($query) use ($request) {
                    return $query
                    ->where('sg_no', $request->sgNo)
                    ->where('sg_year', $request->sgYear);
                }),
            ],
            'sgStep1' => 'required',
            'sgStep2' => 'required',
            'sgStep3' => 'required',
            'sgStep4' => 'required',
            'sgStep5' => 'required',
            'sgStep6' => 'required',
            'sgStep7' => 'required',
            'sgStep8' => 'required',
            'sgYear'  =>  [
                'required',
                    Rule::unique('salary_grades','sg_year')->where(function ($query) use ($request) {
                    return $query
                    ->where('sg_year', $request->sgYear)
                    ->where('sg_no', $request->sgNo);
                }),
            ],
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
        return response()->json(['success'=>true]);
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
        $salaryGrade = SalaryGrade::find($id);
        return view ('SalaryGrade.edit', compact('salaryGrade'));
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
        $this->validate($request, [
            'sgNo'    => 'required|in:' . implode(',',range(1, 33)),
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

        $salarygrade           = SalaryGrade::find($id);
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
        Session::flash('alert-success', 'Update Salary Grade Successfully');
        return back()->with('success','Updated Successfully');
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
