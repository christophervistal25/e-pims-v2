<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Plantilla;
use App\SalaryAdjustment;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
class SalaryAdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::with(['plantilla', 'plantilla.position'])->get();
        return view('SalaryAdjustment.SalaryAdjustment', compact('employee'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {

            $data = SalaryAdjustment::select('id','employee_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff')->with('employee:employee_id,firstname,middlename,lastname,extension')->orderBy('date_adjustment', 'DESC')->orderBy('id', 'DESC');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('action', function($row){
                           $btn = "<a href='". route('salary-adjustment.edit', $row->id) . "' class='edit btn btn-primary btn-sm'>Edit</a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('SalaryAdjustment.SalaryAdjustment');
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
            'employeeName'                        => 'required',
            'itemNo'                              => 'required',
            'positionId'                          => 'required',
            'dateAdjustment'                      => 'required',
            'salaryGrade'                         => 'required',
            'stepNo'                              => 'required',
            'salaryPrevious'                      => 'required|numeric',
            'salaryNew'                           => 'required|numeric',
            'salaryDifference'                    => 'required|numeric',
        ]);
        $salaryAdjustment = new SalaryAdjustment;
        $salaryAdjustment->employee_id                = $request['employeeId'];
        $salaryAdjustment->item_no                    = $request['itemNo'];
        $salaryAdjustment->position_id                = $request['positionId'];  
        $salaryAdjustment->date_adjustment            = $request['dateAdjustment'];
        $salaryAdjustment->sg_no                      = $request['salaryGrade'];
        $salaryAdjustment->step_no                    = $request['stepNo'];
        $salaryAdjustment->salary_previous            = $request['salaryPrevious'];
        $salaryAdjustment->salary_new                 = $request['salaryNew'];
        $salaryAdjustment->salary_diff                = $request['salaryDifference'];
        $salaryAdjustment->save();
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
        
        $employee = Employee::select('employee_id', 'firstname', 'lastname', 'middlename')->get();
        $position = Position::select('position_id', 'position_name')->get();
        $salaryAdjustment = SalaryAdjustment::find($id);
        return view('SalaryAdjustment.edit', compact('salaryAdjustment','employee', 'position'));
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
            'employeeName'                        => 'required',
            'itemNo'                              => 'required',
            'position'                            => 'required',
            'dateAdjustment'                      => 'required',
            'salaryGrade'                         => 'required',
            'stepNo'                              => 'required',
            'salaryPrevious'                      => 'required|numeric',
            'salaryNew'                           => 'required|numeric',
            'salaryDifference'                    => 'required|numeric',
        ]);
        $salaryAdjustment                             =  SalaryAdjustment::find($id);
        $salaryAdjustment->employee_id                = $request['employeeName'];
        $salaryAdjustment->item_no                    = $request['itemNo'];
        $salaryAdjustment->position_id                = $request['position'];  
        $salaryAdjustment->date_adjustment            = $request['dateAdjustment'];
        $salaryAdjustment->sg_no                      = $request['salaryGrade'];
        $salaryAdjustment->step_no                    = $request['stepNo'];
        $salaryAdjustment->salary_previous            = $request['salaryPrevious'];
        $salaryAdjustment->salary_new                 = $request['salaryNew'];
        $salaryAdjustment->salary_diff                = $request['salaryDifference'];
        $salaryAdjustment->save();
        Session::flash('alert-success', 'Update Salary Adjustment Successfully');
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
