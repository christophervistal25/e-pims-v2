<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Plantilla;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $dates = SalaryAdjustment::select('date_adjustment')->whereYear('date_adjustment', '!=', Carbon::now()->format('Y'))->get()->pluck('date_adjustment')->map(function ($date) {
            return $date->format('Y');
        })->toArray();
        $dates = array_values(array_unique($dates));
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice', compact('plantilla', 'dates'));
    }

    public function list(Request $request)
    {
        $data = DB::table('salary_adjustments')
        ->join('employees', 'salary_adjustments.employee_id', '=', 'employees.employee_id')
        ->join('plantillas', 'salary_adjustments.employee_id', '=', 'plantillas.employee_id')
        ->select('id',DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'),'salary_adjustments.item_no','salary_adjustments.pp_id', DB::raw("DATE_FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'salary_adjustments.sg_no', 'salary_adjustments.step_no', 'salary_adjustments.salary_previous','salary_new','salary_adjustments.salary_diff', 'plantillas.office_code')
        ->whereNull('deleted_at')
        ->get();
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
            ";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        //old query
        // if ($request->ajax()) {
        //     $data = SalaryAdjustment::select('id','employee_id','item_no','pp_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous','salary_new','salary_diff')->with('plantillaPosition:pp_id,position_id','plantillaPosition', 'plantillaPosition.position','employee:employee_id,firstname,middlename,lastname,extension', 'plantilla:employee_id,office_code');
        //     return (new Datatables)->eloquent($data)
        //             ->addIndexColumn()
        //             ->addColumn('employee', function ($row) {
        //                 return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
        //             })
        //             ->addColumn('plantilla', function ($row) {
        //                 return $row->plantilla->office_code;
        //             })
        //             ->addColumn('action', function($row){
        //                 $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        //                 ";
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice');
    }

    public function NotSelectedlist(Request $request){
        $salaryAdjustment = SalaryAdjustment::get()->pluck('employee_id')->toArray();
        $data = DB::table('plantillas')
        ->join('employees', 'plantillas.employee_id', '=', 'employees.employee_id')
        ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
        ->select('plantilla_id','plantillas.item_no', 'plantillas.office_code', 'positions.position_name', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
        ->get();
        return DataTables::of($data)
        ->editColumn('checkbox', function ($row) {
            $checkbox = "<input id='checkbox$row->plantilla_id' style='transform:scale(1.35)' value='$row->plantilla_id' type='checkbox' />";
            return $checkbox;
        })->rawColumns(['checkbox'])
        ->make(true);

        //old query
        // if ($request->ajax()) {
        //     $salaryAdjustment = SalaryAdjustment::get()->pluck('employee_id')->toArray();
        //     $data = Plantilla::select('plantilla_id','item_no', 'office_code', 'pp_id', 'sg_no', 'step_no', 'salary_amount', 'employee_id')->with('plantillaPosition:pp_id,position_id','plantillaPosition', 'plantillaPosition.position','employee:employee_id,firstname,middlename,lastname,extension')->whereNotIn('employee_id', $salaryAdjustment );
        //     return (new Datatables)->eloquent($data)
        //             ->addIndexColumn()
        //             ->addColumn('employee', function ($row) {
        //                 return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
        //             })
        //             ->addColumn('plantillaPosition', function ($row) {
        //                 return $row->plantillaPosition->position->position_name;
        //             })
        //             ->editColumn('checkbox', function ($row) {
        //                 $checkbox = "<input id='checkbox$row->plantilla_id' style='transform:scale(1.35)' value='$row->plantilla_id' type='checkbox' />";
        //                 return $checkbox;
        //             })->rawColumns(['checkbox'])
        //             ->make(true);
        // }
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
        SalaryAdjustment::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
