<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Employee;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryAdjustment;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
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
        $plantillaOffices = SalaryAdjustment::select('office_code')
            ->distinct('office_code')
            ->with(['office', 'office.desc'])
            ->where('ismagnacarta','0')
            ->get();
        $dates = SalaryAdjustment::select('date_adjustment')->whereYear('date_adjustment', '!=', date('Y'))
        ->where('ismagnacarta','0')
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
            $data = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
            }])
            ->where('ismagnacarta','0')->get();
        }else{
            $data = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee','office' => function ($query) use ($office) {
                $query->where('office_code', $office);
            }])->where('office_code', $office)
            ->where('ismagnacarta','0')
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
        // $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) use ($year) {
        //     $query->whereYear('date_adjustment', $year);
        // })->with(['Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment'
        // => function($query) use ($year) {$query->whereYear('date_adjustment', $year); },'office'])
        // ->where('Employee_id', '!=', null)
        // ->where('year', $year)
        // ->where('office_code', $office)
        // ->get();


        // return DataTables::of($data)
        //     ->editColumn('checkbox', function ($row) {
        //         $checkbox = "<input id='checkbox{$row}' name='checkboxNotSelected' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
        //         // $checkbox = "<input id='checkbox{$row}' name='checkboxNotSelected' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
        //         return $checkbox;
        //     })->rawColumns(['checkbox'])
        //     ->make(true);
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
            $salary_adjustment = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
            }])
            ->where('ismagnacarta','0')->get();
            $office_name = 'All Offices';
        }else{
            $salary_adjustment = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee','office' => function ($query) use ($office) {
                $query->where('office_code', $office);
            }])->where('office_code', $office)
            ->where('ismagnacarta','0')
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
            $salaryadjustment_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = SalaryAdjustment::where('id', $salaryadjustment_id)->whereYear('date_adjustment', $year)->with('Employee')
            ->where('ismagnacarta','0')->get();
            $office = $salaryadjustment_id.'_'.$year;
            $year = 'individual';
        }else{
            if($office == '*'){
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                    $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
                }])->limit(1)
                ->where('ismagnacarta','0')->get();
                $office_name = 'All Offices';
                // $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // // }])->where('year', $year)->first();
                // }])->where('year', $year)->limit(1)->get();
            }else{
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['plantillaPosition','Employee','office' => function ($query) use ($office) {
                    $query->where('office_code', $office);
                }])->where('office_code', $office)
                ->where('ismagnacarta','0')
                    ->get();
                // dd($salaryAdjustments[0]->plantillaPosition->position->Description);

                // $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // }, 'office' => function ($query) use ($office) {
                //     $query->where('office_code', $office);
                // }])->where('office_code', $office)
                //     ->where('year', $year)
                //     // ->first();
                //     ->get();
            }
        }
        // dd('asd');
        // $key = 0;
        $setting = Setting::find('SALARYADPRINT');

        // return view('reports.SalaryAdjustment.Print.PreviewedIndividual', compact('key','salaryAdjustment','office','year', 'setting'));
        
        return view('reports.SalaryAdjustment.Print.PreviewedIndividual', compact('salaryAdjustments','office','year', 'setting'));
    }

    public function printindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $salaryadjustment_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = SalaryAdjustment::where('id', $salaryadjustment_id)->whereYear('date_adjustment', $year)->with(['Employee' => function ($query) {
                $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
            }])
            ->where('ismagnacarta','0')->get();
        }else{
            if($office == '*'){
                // dd(SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) {
                //     $query->select('Employee_id','firstname', 'middlename', 'lastname');
                // }])->get()[0]);





                // dd(SalaryAdjustment::with('Employee:FirstName,MiddleName,LastName,Suffix')->whereYear('date_adjustment', $year)->get()[0]);

                // ->select('FirstName', 'MiddleName', 'LastName', 'Suffix')

                // dd($salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with('Employee:Employee_id,FirstName,MiddleName,LastName,Suffix')->get()[0]);
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)
                ->where('ismagnacarta','0')->get();
                // list($salaryAdjustments1, $salaryAdjustments2) = array_chunk($salaryAdjustments, ceil(count($salaryAdjustments) / 2));      
                // dd($salaryAdjustments1[0]); //161978
                // dd($salaryAdjustments1[494]); //282009
                // dd($salaryAdjustments2[0]); //282011
                // dd($salaryAdjustments2[493]); //282997
                $office_name = 'All Offices';
            }else{
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['plantillaPosition','Employee' => function ($query) {
                    $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
                },'office' => function ($query) use ($office) {
                    $query->where('office_code', $office);
                }])->where('office_code', $office)
                ->where('ismagnacarta','0')
                    ->get();
                    // dd($salaryAdjustments);
                // $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // }, 'office' => function ($query) use ($office) {
                //     $query->where('office_code', $office);
                // }])->where('office_code', $office)
                //     ->where('year', $year)
                //     ->get();
                // $office_name = $salaryAdjustments[0]->office->office_name;
            }
        }
        $setting = Setting::find('SALARYADPRINT');
        $space = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $pdf = App::make('snappy.pdf.wrapper');
        $count = count($salaryAdjustments);
        $array_date_adjustment = [];
        $array_Gender = [];
        $array_FirstName = [];
        $array_MiddleName = [];
        $array_LastName = [];
        $array_office_name = [];
        $array_office_address = [];
        $array_salary_new = [];
        $array_step_no = [];
        $array_salary_previous = [];
        $array_sg_no = [];
        $array_salary_diff = [];
        $array_Description = [];
        $array_item_no = [];
        $num = 0;
        foreach($salaryAdjustments as $salaryAdjustment){
            $array_date_adjustment[$num] = Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y');
            $employee = Employee::select('Employee_id','FirstName', 'MiddleName', 'LastName','Gender')->find($salaryAdjustment->employee_id);
            $array_Gender[$num] = $employee['Gender'];
            $array_FirstName[$num] = $employee['FirstName'];
            $array_MiddleName[$num] = $employee['MiddleName'];
            $array_LastName[$num] = $employee['LastName'];
            $array_office_name[$num] = $salaryAdjustment->office->office_name;
            $array_office_address[$num] = $salaryAdjustment->office->office_address;
            $array_salary_new[$num] = number_format($salaryAdjustment->salary_new, 2, ".", ",");
            $array_step_no[$num] = $salaryAdjustment->step_no;
            $array_salary_previous[$num] = number_format($salaryAdjustment->salary_previous, 2, ".", ",");
            $array_sg_no[$num] = $salaryAdjustment->sg_no;
            $array_salary_diff[$num] = number_format($salaryAdjustment->salary_diff, 2, ".", ",");
            $array_Description[$num] = $salaryAdjustment->plantillaPosition->position->Description;
            $array_item_no[$num] = $salaryAdjustment->item_no;
            $num++;
        }
        // dd($array_Gender);
        // $employee = Employee::select('Employee_id','firstname', 'middlename', 'lastname')->find('1672');
        $pdf->loadView('reports.SalaryAdjustment.Print.PrintIndividual', compact('array_date_adjustment','array_Gender','array_FirstName','array_MiddleName','array_LastName','array_office_name','array_office_address','array_salary_new','array_step_no','array_salary_previous','array_sg_no','array_salary_diff','array_Description','array_item_no','count','office_name','salaryAdjustments','office','year', 'setting','space'))->setPaper('letter')->setOrientation('portrait');

        // return $pdf->download('NOTICE OF SALARY ADJUSTMENT '.date('m-d-Y').'.pdf');
        return $pdf->inline();
    }

    public function downloadindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $salaryadjustment_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = SalaryAdjustment::where('id', $salaryadjustment_id)->whereYear('date_adjustment', $year)->with('Employee')
            ->where('ismagnacarta','0')->get();
            $office_name = $salaryAdjustments[0]->employee->fullname;
        }else{
            if($office == '*'){
                // $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                //     $query->select('firstname', 'middlename', 'lastname');
                // }])->get();
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->get();
                $office_name = 'All Offices';
            }else{
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['plantillaPosition','Employee','office' => function ($query) use ($office) {
                    $query->where('office_code', $office);
                }])->where('office_code', $office)
                ->where('ismagnacarta','0')
                    ->get();
                // $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
                //     $query->whereYear('date_adjustment', $year);
                // }, 'office' => function ($query) use ($office) {
                //     $query->where('office_code', $office);
                // }])->where('office_code', $office)
                //     ->where('year', $year)
                //     ->get();
                $office_name = $salaryAdjustments[0]->office->office_name;
            }
        }
        $setting = Setting::find('SALARYADPRINT');
        $space = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $pdf = App::make('snappy.pdf.wrapper');
        $count = count($salaryAdjustments);
        $array_date_adjustment = [];
        $array_Gender = [];
        $array_FirstName = [];
        $array_MiddleName = [];
        $array_LastName = [];
        $array_office_name = [];
        $array_office_address = [];
        $array_salary_new = [];
        $array_step_no = [];
        $array_salary_previous = [];
        $array_sg_no = [];
        $array_salary_diff = [];
        $array_Description = [];
        $array_item_no = [];
        $num = 0;
        foreach($salaryAdjustments as $salaryAdjustment){
            $array_date_adjustment[$num] = Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y');
            $employee = Employee::select('Employee_id','FirstName', 'MiddleName', 'LastName','Gender')->find($salaryAdjustment->employee_id);
            $array_Gender[$num] = $employee['Gender'];
            $array_FirstName[$num] = $employee['FirstName'];
            $array_MiddleName[$num] = $employee['MiddleName'];
            $array_LastName[$num] = $employee['LastName'];
            $array_office_name[$num] = $salaryAdjustment->office->office_name;
            $array_office_address[$num] = $salaryAdjustment->office->office_address;
            $array_salary_new[$num] = number_format($salaryAdjustment->salary_new, 2, ".", ",");
            $array_step_no[$num] = $salaryAdjustment->step_no;
            $array_salary_previous[$num] = number_format($salaryAdjustment->salary_previous, 2, ".", ",");
            $array_sg_no[$num] = $salaryAdjustment->sg_no;
            $array_salary_diff[$num] = number_format($salaryAdjustment->salary_diff, 2, ".", ",");
            $array_Description[$num] = $salaryAdjustment->plantillaPosition->position->Description;
            $array_item_no[$num] = $salaryAdjustment->item_no;
            $num++;
        }

        $pdf->loadView('reports.SalaryAdjustment.Print.downloadIndividual', compact('array_date_adjustment','array_Gender','array_FirstName','array_MiddleName','array_LastName','array_office_name','array_office_address','array_salary_new','array_step_no','array_salary_previous','array_sg_no','array_salary_diff','array_Description','array_item_no','count','office_name','salaryAdjustments','office','year', 'setting','space'))->setPaper('letter')->setOrientation('portrait');

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
