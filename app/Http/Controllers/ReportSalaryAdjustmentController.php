<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Plantilla;
use App\PlantillaPosition;
use App\Setting;
use App\SalaryAdjustment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\App;

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
            ->addColumn('action', function ($row) {
                // $btn = "<a title='Print Previewed Salary Adjustment' class=' printpreviewed btn btn-success mr-1'><i class='la la-print'></i></a>";
        //         $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='".$row->salary_adjustment[0]->id."' class='delete delete btn btn-danger mr-1'><i class='la la-trash'></i></a>
        // ";

        //         return $btn;
            })
           ->rawColumns(['action'])
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

    public function printlist(string $office, string $year)
    {
        if($office == '*'){
            $salary_adjustment = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->with(['Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            }])->where('year', $year)->get();
            $office_name = 'All Offices';
        }else{
            $salary_adjustment = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->with(['Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            }, 'office' => function ($query) use ($office) {
                $query->where('office_code', $office);
            }])->where('office_code', $office)
                ->where('year', $year)
                ->get();
            $office_name = $salary_adjustment[0]->office->office_name;
        }
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('reports.SalaryAdjustment.Print.PreviewedList', compact('salary_adjustment','year','office_name'))->setPaper('legal')->setOrientation('portrait');

        return $pdf->inline();
    }

    // public function print($id)
    // {
    //     $salaryAdjustment = SalaryAdjustment::find($id);
    //     $setting = Setting::find('SALARYADPRINT');
    //     // return view('salaryAdjustment.print.previewed', compact('salaryAdjustment', 'setting'));
    //     $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    //     $pdf = App::make('snappy.pdf.wrapper');
    //     $pdf->loadView('salaryAdjustment.print.previewed', compact('salaryAdjustment', 'setting', 'space'))->setPaper('letter')->setOrientation('portrait');

    //     return $pdf->inline();
    // }

    public function previewedindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $plantilla_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->where('plantilla_id', $plantilla_id)->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            // }])->where('year', $year)->first();
            }])->where('year', $year)->limit(1)->get();
            $office = $plantilla_id.'_'.$year;
            $year = 'individual';
        }else{
            if($office == '*'){
                $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                // }])->where('year', $year)->first();
                }])->where('year', $year)->limit(1)->get();
            }else{
                $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                }, 'office' => function ($query) use ($office) {
                    $query->where('office_code', $office);
                }])->where('office_code', $office)
                    ->where('year', $year)
                    // ->first();
                    ->get();
            }
        }
        // $key = 0;
        $setting = Setting::find('SALARYADPRINT');

        // return view('reports.SalaryAdjustment.Print.PreviewedIndividual', compact('key','salaryAdjustment','office','year', 'setting'));
        
        return view('reports.SalaryAdjustment.Print.PreviewedIndividual', compact('salaryAdjustments','office','year', 'setting'));
    }

    public function printindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $plantilla_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->where('plantilla_id', $plantilla_id)->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            // }])->where('year', $year)->first();
            }])->where('year', $year)->limit(1)->get();
        }else{
            if($office == '*'){
                $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                }])->where('year', $year)->get();
                $office_name = 'All Offices';
            }else{
                $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                }, 'office' => function ($query) use ($office) {
                    $query->where('office_code', $office);
                }])->where('office_code', $office)
                    ->where('year', $year)
                    ->get();
                $office_name = $salaryAdjustments[0]->office->office_name;
            }
        }
        $setting = Setting::find('SALARYADPRINT');
        $space = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('reports.SalaryAdjustment.Print.PrintIndividual', compact('salaryAdjustments','office','year', 'setting','space'))->setPaper('letter')->setOrientation('portrait');

        // return $pdf->download('NOTICE OF SALARY ADJUSTMENT '.date('m-d-Y').'.pdf');
        return $pdf->inline();
    }

    public function downloadindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $plantilla_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            })->where('plantilla_id', $plantilla_id)->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                $query->whereYear('date_adjustment', $year);
            // }])->where('year', $year)->first();
            }])->where('year', $year)->limit(1)->get();
            $office_name = $salaryAdjustments[0]->employee->fullname;
        }else{
            if($office == '*'){
                $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                }])->where('year', $year)->get();
                $office_name = 'All Offices';
            }else{
                $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                    $query->whereYear('date_adjustment', $year);
                }, 'office' => function ($query) use ($office) {
                    $query->where('office_code', $office);
                }])->where('office_code', $office)
                    ->where('year', $year)
                    ->get();
                $office_name = $salaryAdjustments[0]->office->office_name;
            }
        }
        $setting = Setting::find('SALARYADPRINT');
        $space = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('reports.SalaryAdjustment.Print.downloadIndividual', compact('salaryAdjustments','office','year', 'setting','space'))->setPaper('letter')->setOrientation('portrait');

        return $pdf->download('NOTICE OF SALARY ADJUSTMENT '.$office_name.date('m-d-Y').'.pdf');
        // return $pdf->inline();
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
    public function editfirstparagraph(Request $request)
    {
        $Setting = Setting::where('Keyname','SALARYADPRINT')->first();
        $Setting->Keyvalue = $request['key_value'];
        $Setting->save();

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
        //
    }
}
