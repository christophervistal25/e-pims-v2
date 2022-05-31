<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Plantilla;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\SalaryAdjustment;
use App\SalaryGrade;

class SalaryAdjustmentPerOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillaOffices =  Plantilla::select('office_code')
            ->distinct('office_code')
            ->with(['office', 'office.desc'])
            ->get();

        $dates = SalaryAdjustment::select('date_adjustment')->whereYear('date_adjustment', '!=', date('Y'))
            ->get()
            ->pluck('date_adjustment')
            ->map(fn ($adjustment) => $adjustment->format('Y'))
            ->unique();

        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice', compact('plantillaOffices', 'dates'));
    }

    public function list(Request $request)
    {
        $data = DB::table('salary_adjustments')
            ->join('employees', 'salary_adjustments.employee_id', '=', 'employees.employee_id')
            ->join('plantillas', 'salary_adjustments.employee_id', '=', 'plantillas.employee_id')
            ->select('id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'salary_adjustments.item_no', 'salary_adjustments.pp_id', DB::raw("DATE_FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'salary_adjustments.sg_no', 'salary_adjustments.step_no', 'salary_adjustments.salary_previous', 'salary_new', 'salary_adjustments.salary_diff', 'plantillas.office_code')
            ->whereNull('deleted_at')
            ->get();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
            ";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice');
    }

    public function NotSelectedlist(Request $request)
    {
        $data = DB::table('plantillas')
            ->join('employees', 'plantillas.employee_id', '=', 'employees.employee_id')
            ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
            ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
            ->select('plantilla_id', 'plantillas.item_no', 'plantillas.office_code', 'positions.position_name', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
            ->get();
        return DataTables::of($data)
            ->editColumn('checkbox', function ($row) {
                $checkbox = "<input id='checkbox$row->plantilla_id' style='transform:scale(1.35)' value='$row->plantilla_id' type='checkbox' />";
                return $checkbox;
            })->rawColumns(['checkbox'])
            ->make(true);
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
        return json_encode(array('statusCode' => 200));
    }
}
