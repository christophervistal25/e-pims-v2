<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Plantilla;
use App\Office;
use App\Position;
use App\Employee;
use App\SalaryAdjustment;

class SalaryAdjustmentPerOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantilla =  Plantilla::select('office_code')->with('office:office_code,office_short_name,office_name')->groupBy('office_code')->get();
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice', compact('plantilla'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = SalaryAdjustment::select('id','employee_id','item_no','position_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous','salary_new','salary_diff')->with('position:position_id,position_name','employee:employee_id,firstname,middlename,lastname,extension', 'plantilla:employee_id,office_code');

            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('plantilla', function ($row) {
                        return $row->plantilla->office_code;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Salary Adjustment' href='$row->id' class='rounded-circle edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
                        $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice');
    }

    public function NotSelectedlist(Request $request){
        if ($request->ajax()) {
            $salaryAdjustment = SalaryAdjustment::get()->pluck('employee_id')->toArray();
            $data = Plantilla::select('plantilla_id','item_no', 'office_code', 'position_id', 'sg_no', 'step_no', 'salary_amount', 'employee_id')->with('position:position_id,position_name','employee:employee_id,firstname,middlename,lastname,extension')->whereNotIn('employee_id', $salaryAdjustment );
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('position', function ($row) {
                        return $row->position->position_name;
                    })
                    ->editColumn('checkbox', function ($row) {
                        $checkbox = "<input id='checkbox$row->plantilla_id' style='transform:scale(1.35)' value='$row->plantilla_id' type='checkbox' />";
                        return $checkbox;
                    })->rawColumns(['checkbox'])
                    ->make(true);
        }
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice');

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
