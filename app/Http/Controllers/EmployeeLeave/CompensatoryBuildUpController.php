<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use Carbon\Carbon;
use App\CompensatoryLeave;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rules\CompensatoryDateEarned;

class CompensatoryBuildUpController extends Controller
{
    
    /**
     * Return list of all leave types in json format.
     *
     * @return void
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::has('information')->with(['information','information.office', 'information.position'])->get();
        $records = CompensatoryLeave::with('employee')->get()->groupBy('employee.fullname');
        
        $yearfilters = CompensatoryLeave::get('date_added')->groupBy(function ($data) {
            return $data->date_added->format('Y');
        })->keys();
        
        return view('leave.compensatory-build-up', compact('employees', 'records', 'yearfilters'));
    }

    public function list(Request $request)
    {
        // $rPerEmployee = CompensatoryLeave::with(['employee'])->get();
        // dd($rPerEmployee);
        if ($request->ajax()) {
            $rPerEmployee = CompensatoryLeave::with(['employee'])->get()->groupBy('employee_id');
                return Datatables::of($rPerEmployee)
                        ->addColumn('employee_id', function ($rPerEmployee) {
                            return $rPerEmployee->first()->employee_id;
                        })
                        ->addColumn('fullname', function ($rPerEmployee) {
                            return $rPerEmployee->first()->employee->fullname;
                        })
                        ->addColumn('date_added', function ($rPerEmployee) {
                            $dateadded = date("Y-m-d", strtotime($rPerEmployee->sortBy('date_added')->last()->date_added));
                            return $dateadded;
                        })
                        ->addColumn('earned', function ($rPerEmployee) {
                            return $rPerEmployee->sum('earned');
                        })
                        ->addColumn('availed', function ($rPerEmployee) {
                            return $rPerEmployee->sum('availed');
                        })
                        ->addColumn('balance', function ($rPerEmployee) {
                            $totalBal = floatval($rPerEmployee->sum('earned')) - floatval($rPerEmployee->sum('availed'));
                            return $totalBal;
                        })
                        ->addcolumn('action', function($rPerEmployee){
                        $button = '<button title="View Details" type="button" data-id="'.$rPerEmployee->first()->employee_id.'"  class="edit btn btn-info btn-sm rounded-circle shadow mr-1 btn__edit__view__compensatory">
                        <i class="la la-eye"></i></button>';
                        $button .= '<button title="Delete Compensatory" type="button" data-id="'.$rPerEmployee->first()->employee_id.'"  class="delete btn btn-danger btn-sm rounded-circle shadow delete__allcompensatory__type">
                        <i class="la la-trash"></i></button>';

                        return $button;
                    })
                    ->make(true);
        }
        
    }

    public function forfeited($id, $year)
    {
        $data = CompensatoryLeave::where('employee_id', $id)
        ->whereYear('date_added', $year)
        ->where('forfeited', 'yes')
        ->count(); 

        $forfeited['data'] = $data;

        echo json_encode($forfeited);
        exit;
    }

    public function listComLeaveByYear(Request $request, $id, $year)
    {
            $test = DB::table('compensatory_leaves')->where('employee_id', $id)
                                        ->whereYear('date_added', $year)
                                        ->orderBy('date_added', 'DESC')
                                        ->first(['date_added']);

            $data = DB::table('compensatory_leaves')
            ->join('employees', 'compensatory_leaves.employee_id', '=', 'employees.employee_id')
            ->select('id', 'employees.employee_id', 'overtime_type', 'hours_rendered', 'earned', 'availed', 'date_added', 'remarks', 'forfeited')
            ->where('compensatory_leaves.employee_id', $id)
            ->whereYear('compensatory_leaves.date_added', $year)
            ->orderBy('date_added', 'ASC')
            ->get();
            return DataTables::of($data)
            ->addColumn('action', function($row) use($test) {
                    if(strtotime($test->date_added) > strtotime($row->date_added)) {
                        return '';
                    }
                    if($row->earned > 0){
                        if ($row->forfeited =='yes'){
                            $btn = '';
                            return $btn;
                        }else{
                            $btn = '<button type="button" title="Edit Earned" data-id="'.$row->id.'"  class="edit btn btn-success btn-sm rounded-circle shadow mr-1 btnEdit__earned__compensatory">
                            <i class="la la-edit"></i></button>';
                            $btn .= '<button type="button" data-id="'.$row->id.'"  class="delete btn btn-danger btn-sm rounded-circle shadow delete__compensatory">
                            <i class="la la-trash"></i></button>';
                            return $btn;
                        }
                    }else{
                        if ($row->forfeited =='yes'){
                            $btn = '';
                            return $btn;
                        }else{
                            $btn = '<button type="button" title="Edit Availed" data-id="'.$row->id.'"  class="edit btn btn-success btn-sm rounded-circle shadow mr-1 btnEdit__availed__compensatory">
                            <i class="la la-edit"></i></button>';
                            $btn .= '<button type="button" data-id="'.$row->id.'"  class="delete btn btn-danger btn-sm rounded-circle shadow delete__compensatory">
                            <i class="la la-trash"></i></button>';
                            return $btn;
                        }
                    }
            })
            ->rawColumns(['action'])
            ->make(true);
        
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
        if($request->ajax()) {
            $carbonYear=Carbon::parse($request->date_added)->format('Y');
            $carbonMonth=Carbon::parse($request->date_added)->format('m');
            if($request->selected_date == 'null' ){
                if($request['action'] == 'earn'){
                    $this->validate($request, [
                        'overtime_type'             => 'required|in:weekdays,weekends/holidays',
                        'hours_rendered'            => 'required|numeric|min:0|not_in:0',
                        'date_added'                =>  [
                                                            'required',
                                                            'date',
                                                            'before_or_equal:today',
                                                            new CompensatoryDateEarned($carbonMonth, $carbonYear, $request->employee_id),
                                                        ],
                        'remarks'                   => 'required',
                    ], [
                        'overtime_type.required'    => '',
                        'hours_rendered.required'   => '<small>Please input a number.</small>',
                        'hours_rendered.not_in'     => '<small>This should not be 0.</small>',
                        'date_added.required'       => '<small>Please select a date.</small>',
                        'date_added.before_or_equal'=> '<small>Date should not be greater than today.</small>',
                        'remarks.required'          => '<small>You need to input remarks.</small>',
                    ]);
                }
                if($request['action'] == 'avail'){
                    $this->validate($request, [
                        'availed'                   => 'required|numeric|min:0|not_in:0',
                        'date_added'                =>  [
                                                            'required',
                                                            'date',
                                                            'before_or_equal:today',
                                                        ],
                        'remarks'                   => 'required',
                    ], [
                        'availed.required'          => '<small>Please input a number.</small>',
                        'availed.not_in'            => '<small>This should not be 0.</small>',
                        'date_added.required'       => '<small>Please select a date.</small>',
                        'date_added.before_or_equal'=> '<small>Date should not be greater than today.</small>',
                        'remarks.required'          => '<small>You need to input remarks.</small>',
                    ]);
                }
            }else{
                if($request['action'] == 'earn'){
                    $this->validate($request, [
                        'overtime_type'             => 'required|in:weekdays,weekends/holidays',
                        'hours_rendered'            => 'required|numeric|min:0|not_in:0',
                        'date_added'                =>  [
                                                            'required',
                                                            'date',
                                                            'before_or_equal:today',
                                                            'after:'.Carbon::parse($request->selected_date)->format('Y-m-d'),
                                                            new CompensatoryDateEarned($carbonMonth, $carbonYear, $request->employee_id),
                                                        ],
                        'remarks'                   => 'required',
                    ], [
                        'overtime_type.required'    => '',
                        'hours_rendered.required'   => '<small>Please input a number.</small>',
                        'hours_rendered.not_in'     => '<small>This should not be 0.</small>',
                        'date_added.required'       => '<small>Please select a date.</small>',
                        'date_added.before_or_equal'=> '<small>Date should not be greater than today.</small>',
                        'date_added.after'          => '<small>Date should be greater than the last record.</small>',
                        'remarks.required'          => '<small>You need to input remarks.</small>',
                    ]);
                }
                if($request['action'] == 'avail'){
                    $this->validate($request, [
                        'availed'                   => 'required|numeric|min:0|not_in:0',
                        'date_added'                =>  [
                                                            'required',
                                                            'date',
                                                            'before_or_equal:today',
                                                            'after:'.Carbon::parse($request->selected_date)->format('Y-m-d'),
                                                        ],
                        'remarks'                   => 'required',
                    ], [
                        'availed.required'          => '<small>Please input a number.</small>',
                        'availed.not_in'            => '<small>This should not be 0.</small>',
                        'date_added.required'       => '<small>Please select a date.</small>',
                        'date_added.before_or_equal'=> '<small>Date should not be greater than today.</small>',
                        'date_added.after'          => '<small>Date should be greater than the last record.</small>',
                        'remarks.required'          => '<small>You need to input remarks.</small>',
                    ]);
                }
            }
            
            
            if($request->availed == 0){
                CompensatoryLeave::create([
                    'employee_id' => $request->employee_id,
                    'overtime_type' => $request->overtime_type,
                    'hours_rendered' => $request->hours_rendered,
                    'earned' => $request->earned,
                    'availed' => 0,
                    'date_added' => $request->date_added,
                    'remarks' => $request->remarks,
                    'forfeited' => 'no',
                ]);
            }else{
                CompensatoryLeave::create([
                    'employee_id' => $request->employee_id,
                    'overtime_type' => NULL,
                    'hours_rendered' => NULL,
                    'earned' => 0,
                    'availed' => $request->availed,
                    'date_added' => $request->date_added,
                    'remarks' => $request->remarks,
                    'forfeited' => 'no',
                ]);
            }
            return response()->json(['success' => true], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return CompensatoryLeave::findOrFail($id);
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
        //update
        $comRecords = CompensatoryLeave::where('id', $id)->get();
        foreach($comRecords as $comRecord){
            // Insert Record with As of.
            $comRecord->overtime_type = $request['edit_overtime_type'];
            $comRecord->date_added = $request['edit_date_added'];
            $comRecord->hours_rendered = $request['edit_hours_rendered'];
            $comRecord->earned = $request['edit_earned'];
            $comRecord->availed = $request['edit_availed'];
            $comRecord->remarks = $request['edit_remarks'];
            $comRecord->save();
        }
        return response()->json(['success' => true]);
    }

    public function updateForfeited(Request $request, $id, $year)
    {
        $isForfeited = $request['isChecked'];
        
        //update
        $comRecords = CompensatoryLeave::where('employee_id', $id)->whereYear('date_added', $year)->get();
        foreach($comRecords as $comRecord){
            // Insert Record with As of.
            if($isForfeited == 1){
                $comRecord->forfeited = 'yes';
            }else if($isForfeited == 0){
                $comRecord->forfeited = 'no';
            }
            $comRecord->save();
        }
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deleteAll = $request['delete_All'];
        if ($deleteAll == 1){
            $comRecords = CompensatoryLeave::where('employee_id', $id)->get();
            foreach($comRecords as $comRecord){
                $comRecord->delete();
            }
            return response()->json(['success' => true]);
        }else{
            $comRecords = CompensatoryLeave::find($id);
            $comRecords->delete();
        }
    }
}
