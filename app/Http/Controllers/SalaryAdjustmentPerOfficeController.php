<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Plantilla;
use App\PlantillaPosition;
use App\SalaryAdjustment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class SalaryAdjustmentPerOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillaOffices = Plantilla::select('office_code')
            ->distinct('office_code')
            ->with(['office', 'office.desc'])
            ->get();

        $dates = SalaryAdjustment::select('date_adjustment')->whereYear('date_adjustment', '!=', date('Y'))
            ->get()
            ->pluck('date_adjustment')
            ->map(fn ($adjustment) => $adjustment->format('Y'))
            ->unique();
        $class = 'mini-sidebar';
        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice', compact('plantillaOffices', 'dates', 'class'));
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
            $btn = "<a title='Edit Salary Adjustment' href='".route('salary-adjustment.edit', $row->id)."' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
            $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                ";

            return $btn;
        })
       ->rawColumns(['action'])
            ->make(true);

        return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice');
    }

    public function NotSelectedlist(Request $request)
    {
        $data = DB::table('plantillas')->join('employees', 'plantillas.employee_id', '=', 'employees.employee_id')->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')->select('plantilla_id', 'plantillas.item_no', 'plantillas.office_code', 'positions.position_name', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))->get();

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
        $employee = Employee::select('Employee_id', 'Firstname', 'Lastname', 'Middlename')->get();
        $plantillaPosition = PlantillaPosition::select('pp_id', 'PosCode', 'item_no', 'sg_no', 'office_code', 'old_position_name')->with('position:PosCode,Description')->get();
        $salaryAdjustment = SalaryAdjustment::find($id);
        $class = 'mini-sidebar';
        return view('SalaryAdjustmentPerOffice.edit', compact('salaryAdjustment', 'employee', 'plantillaPosition', 'class'));
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
            'employeeName' => 'required',
            'itemNo' => 'required',
            'position' => 'required',
            'dateAdjustment' => 'required',
            'salaryGrade' => 'required',
            'stepNo' => 'required',
            'salaryPrevious' => 'required|numeric',
            'salaryNew' => 'required|numeric',
            'salaryDifference' => 'required|numeric',
        ]);
        $salaryAdjustmentPerOffice = SalaryAdjustment::find($id);
        $salaryAdjustmentPerOffice->employee_id = $request->employeeName;
        $salaryAdjustmentPerOffice->item_no = $request->itemNo;
        $salaryAdjustmentPerOffice->pp_id = $request->position;
        $salaryAdjustmentPerOffice->date_adjustment = $request->dateAdjustment2;
        $salaryAdjustmentPerOffice->sg_no = $request->salaryGrade;
        $salaryAdjustmentPerOffice->step_no = $request->stepNo;
        $salaryAdjustmentPerOffice->salary_previous = $request->salaryPrevious;
        $salaryAdjustmentPerOffice->salary_new = $request->salaryNew;
        $salaryAdjustmentPerOffice->salary_diff = $request->salaryDifference;
        $salaryAdjustmentPerOffice->remarks = $request->remarks;
        $salaryAdjustmentPerOffice->save();
        DB::table('plantillas')->where('employee_id', $request->employeeName)->where('year', $request->currentSgyear)
       ->update(['salary_amount' => $request->salaryNew,
       ]);

        return response()->json(['success' => true]);
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

        return json_encode(['statusCode' => 200]);
    }
}
