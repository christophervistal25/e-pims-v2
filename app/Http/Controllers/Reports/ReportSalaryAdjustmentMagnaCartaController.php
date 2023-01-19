<?php

namespace App\Http\Controllers\Reports;

use App\Employee;
use App\Plantilla;
use App\PlantillaPosition;
use App\Setting;
use Carbon\Carbon;
use App\SalaryAdjustment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ReportSalaryAdjustmentMagnaCartaController extends Controller
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
            ->where('ismagnacarta','1')
            ->get();

        $dates = SalaryAdjustment::select('date_adjustment')->whereYear('date_adjustment', '!=', date('Y'))
        ->where('ismagnacarta','1')
            ->get()
            ->pluck('date_adjustment')
            ->map(fn ($adjustment) => $adjustment->format('Y'))
            ->unique();
        $class = 'mini-sidebar';
        return view('reports.SalaryAdjustment.SalaryAdjustmentPerOfficeMagnaCarta', compact('plantillaOffices', 'dates', 'class'));
    }

    public function withoffice(string $office, string $year = null)
    {
        if($office == '*'){
            $data = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
            }])
            ->where('ismagnacarta','1')->get();
        }else{
            $data = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee','office' => function ($query) use ($office) {
                $query->where('office_code', $office);
            }])->where('office_code', $office)
            ->where('ismagnacarta','1')
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
    

    public function printlist(string $office, string $year)
    {
        if($office == '*'){
            $salary_adjustment = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
            }])
            ->where('ismagnacarta','1')->get();
            $office_name = 'All Offices';
        }else{
            $salary_adjustment = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee','office' => function ($query) use ($office) {
                $query->where('office_code', $office);
            }])->where('office_code', $office)
            ->where('ismagnacarta','1')
                ->get();
            $office_name = $salary_adjustment[0]->office->office_name;
        }
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('reports.SalaryAdjustment.PrintMagnaCarta.PreviewedList', compact('salary_adjustment','year','office_name'))->setPaper('legal')->setOrientation('portrait');

        return $pdf->inline();
    }

    public function previewedindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $salaryadjustment_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = SalaryAdjustment::where('id', $salaryadjustment_id)->whereYear('date_adjustment', $year)->with('Employee')
            ->where('ismagnacarta','1')->get();
            $office = $salaryadjustment_id.'_'.$year;
            $year = 'individual';
        }else{
            if($office == '*'){
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
                    $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
                }])->limit(1)
                ->where('ismagnacarta','1')->get();
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
                ->where('ismagnacarta','1')
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
        // $key = 0;
        $setting = ['Keyvalue1' => file_get_contents(public_path('/storage/Firstparagraph.txt')),'Keyvalue2' => file_get_contents(public_path('/storage/Secondparagraph.txt')),'Keyvalue3' => file_get_contents(public_path('/storage/Thirdparagraph.txt')),'Keyvalue4' => file_get_contents(public_path('/storage/Fourthparagraph.txt'))];
        // dd($setting);
        // $setting = Setting::find('SALARYMAGNACARTAPRINT');
        // return view('reports.SalaryAdjustment.Print.PreviewedIndividual', compact('key','salaryAdjustment','office','year', 'setting'));
        
        return view('reports.SalaryAdjustment.PrintMagnaCarta.PreviewedIndividual', compact('salaryAdjustments','office','year', 'setting'));
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
            ->where('ismagnacarta','1')->get();
            $office_name = 'one';
        }else{
            if($office == '*'){
                // dd(SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) {
                //     $query->select('Employee_id','firstname', 'middlename', 'lastname');
                // }])->get()[0]);
                
                
                
                

                // dd(SalaryAdjustment::with('Employee:FirstName,MiddleName,LastName,Suffix')->whereYear('date_adjustment', $year)->get()[0]);
                
                // ->select('FirstName', 'MiddleName', 'LastName', 'Suffix')
                
                // dd($salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with('Employee:Employee_id,FirstName,MiddleName,LastName,Suffix')->get()[0]);
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)
                ->where('ismagnacarta','1')->get();
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
                ->where('ismagnacarta','1')
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
                $office_name = 'one';
            }
        }
        $setting = ['Keyvalue1' => file_get_contents(public_path('/storage/Firstparagraph.txt')),'Keyvalue2' => file_get_contents(public_path('/storage/Secondparagraph.txt')),'Keyvalue3' => file_get_contents(public_path('/storage/Thirdparagraph.txt')),'Keyvalue4' => file_get_contents(public_path('/storage/Fourthparagraph.txt'))];
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
        $array_old_step_no = [];
        $array_salary_previous = [];
        $array_sg_no = [];
        $array_old_sg_no = [];
        $array_salary_diff = [];
        $array_Description = [];
        $array_item_no = [];
        $array_retirement_date = [];
        $array_spanminus3months_default = [];
        $array_spanminus3months_formated = [];
        $array_spanminus1day_default = [];
        $array_spanminus1day_formated = [];
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
            $array_old_step_no[$num] = $salaryAdjustment->old_step_no;
            $array_salary_previous[$num] = number_format($salaryAdjustment->salary_previous, 2, ".", ",");
            $array_sg_no[$num] = $salaryAdjustment->sg_no;
            $array_old_sg_no[$num] = $salaryAdjustment->old_sg_no;
            $array_salary_diff[$num] = number_format($salaryAdjustment->salary_diff, 2, ".", ",");
            $array_Description[$num] = $salaryAdjustment->plantillaPosition->position->Description;
            $array_item_no[$num] = $salaryAdjustment->item_no;
            $array_retirement_date[$num] = $salaryAdjustment->retirement_date;
            $array_spanminus3months_default[$num] = date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'));
            $array_spanminus3months_formated[$num] = date('F d, Y', strtotime($salaryAdjustment->retirement_date. ' - 3 months'));
            $array_spanminus1day_default[$num] = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) ));
            $array_spanminus1day_formated[$num] = date('F d, Y',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) ));
            $num++;
        }
        // dd($salaryAdjustments);
        $pdf->loadView('reports.SalaryAdjustment.PrintMagnaCarta.PrintIndividual', compact('array_date_adjustment','array_Gender','array_FirstName','array_MiddleName','array_LastName','array_office_name','array_office_address','array_salary_new','array_step_no','array_salary_previous','array_sg_no','array_salary_diff','array_Description','array_item_no','count','office_name','salaryAdjustments','office','year', 'setting','space','array_old_step_no','array_old_sg_no','array_spanminus3months_default','array_spanminus3months_formated','array_spanminus1day_default','array_spanminus1day_formated','array_retirement_date'))->setPaper('letter')->setOrientation('portrait');

        // return $pdf->download('NOTICE OF SALARY ADJUSTMENT '.date('m-d-Y').'.pdf');
        return $pdf->inline();
    }

    public function downloadindividual(string $office, string $year)
    {
        if($year == 'individual'){
            $data = explode("_",$office);
            $salaryadjustment_id = $data[0];
            $year = $data[1];
            $salaryAdjustments = SalaryAdjustment::where('id', $salaryadjustment_id)->whereYear('date_adjustment', $year)->with(['Employee' => function ($query) {
                $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
            }])
            ->where('ismagnacarta','1')->get();
            $office_name = $salaryAdjustments[0]->employee->fullname;
        }else{
            if($office == '*'){
                // dd(SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) {
                //     $query->select('Employee_id','firstname', 'middlename', 'lastname');
                // }])->get()[0]);
                
                
                
                

                // dd(SalaryAdjustment::with('Employee:FirstName,MiddleName,LastName,Suffix')->whereYear('date_adjustment', $year)->get()[0]);
                
                // ->select('FirstName', 'MiddleName', 'LastName', 'Suffix')
                
                // dd($salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with('Employee:Employee_id,FirstName,MiddleName,LastName,Suffix')->get()[0]);
                $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)
                ->where('ismagnacarta','1')->get();
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
                ->where('ismagnacarta','1')
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
                $office_name = $salaryAdjustments[0]->office->office_name;
            }
        }
        $setting = ['Keyvalue1' => file_get_contents(public_path('/storage/Firstparagraph.txt')),'Keyvalue2' => file_get_contents(public_path('/storage/Secondparagraph.txt')),'Keyvalue3' => file_get_contents(public_path('/storage/Thirdparagraph.txt')),'Keyvalue4' => file_get_contents(public_path('/storage/Fourthparagraph.txt'))];
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
        $array_old_step_no = [];
        $array_salary_previous = [];
        $array_sg_no = [];
        $array_old_sg_no = [];
        $array_salary_diff = [];
        $array_Description = [];
        $array_item_no = [];
        $array_retirement_date = [];
        $array_spanminus3months_default = [];
        $array_spanminus3months_formated = [];
        $array_spanminus1day_default = [];
        $array_spanminus1day_formated = [];
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
            $array_old_step_no[$num] = $salaryAdjustment->old_step_no;
            $array_salary_previous[$num] = number_format($salaryAdjustment->salary_previous, 2, ".", ",");
            $array_sg_no[$num] = $salaryAdjustment->sg_no;
            $array_old_sg_no[$num] = $salaryAdjustment->old_sg_no;
            $array_salary_diff[$num] = number_format($salaryAdjustment->salary_diff, 2, ".", ",");
            $array_Description[$num] = $salaryAdjustment->plantillaPosition->position->Description;
            $array_item_no[$num] = $salaryAdjustment->item_no;
            $array_retirement_date[$num] = $salaryAdjustment->retirement_date;
            $array_spanminus3months_default[$num] = date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'));
            $array_spanminus3months_formated[$num] = date('F d, Y', strtotime($salaryAdjustment->retirement_date. ' - 3 months'));
            $array_spanminus1day_default[$num] = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) ));
            $array_spanminus1day_formated[$num] = date('F d, Y',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) ));
            $num++;
        }
        // dd($salaryAdjustments);
        $pdf->loadView('reports.SalaryAdjustment.PrintMagnaCarta.downloadIndividual', compact('array_date_adjustment','array_Gender','array_FirstName','array_MiddleName','array_LastName','array_office_name','array_office_address','array_salary_new','array_step_no','array_salary_previous','array_sg_no','array_salary_diff','array_Description','array_item_no','count','office_name','salaryAdjustments','office','year', 'setting','space','array_old_step_no','array_old_sg_no','array_spanminus3months_default','array_spanminus3months_formated','array_spanminus1day_default','array_spanminus1day_formated','array_retirement_date'))->setPaper('letter')->setOrientation('portrait');

        return $pdf->download('NOTICE OF SALARY ADJUSTMENT MAGNA CARTA '.$office_name.date('m-d-Y').'.pdf');
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
     public function editFirstparagraph(Request $request)
     {
        // dd();
        Storage::disk('local')->put('public/Firstparagraph.txt', $request['key_value']);
        //  $Setting = Setting::where('Keyname','SALARYMAGNACARTAPRINT')->first();
        //  $Setting->Keyvalue = $request['key_value'];
        //  $Setting->save();
            
         return response()->json(['success' => 'true']);
     }
     public function editSecondparagraph(Request $request)
     {
        // dd();
        Storage::disk('local')->put('public/Secondparagraph.txt', $request['key_value']);
        //  $Setting = Setting::where('Keyname','SALARYMAGNACARTAPRINT')->first();
        //  $Setting->Keyvalue = $request['key_value'];
        //  $Setting->save();
            
         return response()->json(['success' => 'true']);
     }
     public function editThirdparagraph(Request $request)
     {
        // dd();
        Storage::disk('local')->put('public/Thirdparagraph.txt', $request['key_value']);
        //  $Setting = Setting::where('Keyname','SALARYMAGNACARTAPRINT')->first();
        //  $Setting->Keyvalue = $request['key_value'];
        //  $Setting->save();
            
         return response()->json(['success' => 'true']);
     }
     public function editFourthparagraph(Request $request)
     {
        // dd();
        // Storage::disk('local')->put('public/Fourthparagraph.txt', $request['key_value']);
         $SalaryAdjustment = SalaryAdjustment::find($request['key_id']);
         $SalaryAdjustment->retirement_date = $request['key_value'];
         $SalaryAdjustment->save();
            
         return response()->json(['success' => 'true']);
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
