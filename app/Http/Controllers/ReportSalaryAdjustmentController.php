<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Plantilla;
use App\PlantillaPosition;
use App\SalaryAdjustment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ReportSalaryAdjustmentController extends Controller
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
        return view('reports.SalaryAdjustment.SalaryAdjustmentPerOffice', compact('plantillaOffices', 'dates', 'class'));
    }

    public function withoffice(string $office, string $year = null)
    {
        if($office == '*'){
            $data = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->with(['Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            }])->where('year', $year)->get();
        }else{
            $data = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->with(['Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            }, 'office' => function ($query) use ($office) {
                $query->where('office_code', $office);
            }])->where('office_code', $office)
                ->where('year', $year)
                ->get();
        }

        return DataTables::of($data)
        //     ->addColumn('action', function ($row) {
        //         $btn = "<a title='Edit Salary Adjustment' href='".route('salary-adjustment-per-office.edit', $row->salary_adjustment[0]->id)."' class=' edit btn btn-success mr-1'><i class='la la-pencil'></i></a>";
        //         $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='".$row->salary_adjustment[0]->id."' class='delete delete btn btn-danger mr-1'><i class='la la-trash'></i></a>
        // ";

        //         return $btn;
        //     })
        //    ->rawColumns(['action'])
        ->make(true);
    }

    public function withoutoffice(string $office, string $year)
    {
        $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) use ($year) {
            $query->whereYear('date_adjustment', $year);
        })->with(['Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment'
        => function($query) use ($year) {$query->whereYear('date_adjustment', $year); },'office'])
        ->where('Employee_id', '!=', null)
        ->where('year', $year)
        ->where('office_code', $office)
        ->get();


        return DataTables::of($data)
            ->editColumn('checkbox', function ($row) {
                $checkbox = "<input id='checkbox{$row}' name='checkboxNotSelected' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
                // $checkbox = "<input id='checkbox{$row}' name='checkboxNotSelected' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
                return $checkbox;
            })->rawColumns(['checkbox'])
            ->make(true);
    }

    
    // public function list(Request $request)
    // {
    //     $data = DB::table('salary_adjustments')
    //         ->join('employees', 'salary_adjustments.employee_id', '=', 'employees.employee_id')
    //         ->join('plantillas', 'salary_adjustments.employee_id', '=', 'plantillas.employee_id')
    //         ->select('id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'salary_adjustments.item_no', 'salary_adjustments.pp_id', DB::raw("DATE_FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'salary_adjustments.sg_no', 'salary_adjustments.step_no', 'salary_adjustments.salary_previous', 'salary_new', 'salary_adjustments.salary_diff', 'plantillas.office_code')
    //         ->whereNull('deleted_at')
    //         ->get();

    //     return DataTables::of($data)
    //     ->addColumn('action', function ($row) {
    //         $btn = "<a title='Edit Salary Adjustment' href='".route('salary-adjustment.edit', $row->id)."' class=' edit btn btn-success mr-1'><i class='la la-pencil'></i></a>";
    //         $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete  delete btn btn-danger mr-1'><i class='la la-trash'></i></a>
    //             ";

    //         return $btn;
    //     })
    //    ->rawColumns(['action'])
    //         ->make(true);

    //     return view('SalaryAdjustmentPerOffice.SalaryAdjustmentPerOffice');
    // }

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
