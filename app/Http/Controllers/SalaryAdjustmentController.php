<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use App\service_record;
use App\SalaryAdjustment;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
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
        $dates = SalaryAdjustment::select('date_adjustment')
                                    ->whereYear('date_adjustment', '!=', Carbon::now()->format('Y'))
                                    ->get()
                                    ->pluck('date_adjustment')
                                    ->map(function ($date) {
                                            return $date->format('Y');
                                    })->toArray();


        $dates = array_values(array_unique($dates));

        $year = SalaryGrade::select('sg_year')->distinct()->get();

        $position = Position::select('position_id', 'position_name')->get();

        $currentYear = date('Y');

        $employee = Plantilla::select('item_no', 'pp_id', 'sg_no', 'step_no', 'salary_amount', 'employee_id', 'year', 'status', 'office_code')
                        ->with(['employee:Employee_id,FirstName,MiddleName,LastName,Suffix', 'plantillaPosition', 'plantillaPosition.position',
                                'plantillaPosition:pp_id,position_id,office_code,item_no,sg_no', 'salary_adjustment'])
                            ->where('plantillas.year', $currentYear)
                            ->get()
                            ->filter(function ($record) use($currentYear) {
                                    $haystack = $record->salary_adjustment
                                                        ->pluck('date_adjustment_year')
                                                        ->toArray();

                                    return !in_array($currentYear, $haystack);
                            });

        return view('SalaryAdjustment.SalaryAdjustment', compact('employee', 'position', 'dates', 'year'));
    }

    public function list($currentSgyear)
    {
        $data = DB::connection('E_PIMS_CONNECTION')
                        ->table('salary_adjustments')
                        ->join('DTRPayroll.dbo.Employees', 'salary_adjustments.employee_id', 'Employees.Employee_id')
                        ->select(
                            'id', 'Employees.Employee_id', DB::raw("CONCAT(FirstName, ' ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"), 
                            DB::raw("FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'salary_adjustments.sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff'
                        )
                        ->whereYear('date_adjustment', $currentSgyear)
                        ->orderBy('date_adjustment', 'DESC')
                        ->whereNull('deleted_at')
                        ->orderBy('id', 'DESC')
                        ->get();

        return DataTables::of($data)
        ->addColumn('action', function($row){
            $btn = "<a title='Edit Salary Adjustment' href='". route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
            $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
            ";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        // if ($request->ajax()) {
        //     $data = SalaryAdjustment::select('id','employee_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff')->with('employee:employee_id,firstname,middlename,lastname,extension')->orderBy('date_adjustment', 'DESC')->orderBy('id', 'DESC');
        //     return (new Datatables)->eloquent($data)
        //             ->addIndexColumn()
        //             ->addColumn('employee', function ($row) {
        //                 return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
        //             })
        //             ->addColumn('action', function($row){
        //                 $btn = "<a title='Edit Salary Adjustment' href='". route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
        //                 $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        //                 ";
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
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
            'employeeName'  => [
                'required',
                //     Rule::unique('salary_adjustments', 'employee_id')->where(function ($query) use ($request) {
                //     return $query
                //                 ->where('employee_id', $request->employeeId)
                //                 ->where('item_no', $request->itemNo)
                //                 ->where('pp_id', $request->positionId)
                //                 ->where('date_adjustment', $request->dateAdjustment)
                //                 ->where('sg_no', $request->salaryGrade)
                //                 ->where('step_no', $request->stepNo)
                //                 ->where('salary_previous', $request->salaryPrevious)
                //                 ->where('salary_new', $request->salaryNew)
                //                 ->where('salary_diff', $request->salaryDifference)
                //                 ->where('deleted_at', '=', null)
                //                 ->get();
                // }),
            ],
            'itemNo'                              => 'required',
            'positionId'                          => 'required',
            'dateAdjustment'                      => 'required',
            'salaryGrade'                         => 'required',
            'stepNo'                              => 'required',
            'salaryPrevious'                      => 'required|numeric',
            'salaryNew'                           => 'required|numeric',
            'salaryDifference'                    => 'required|numeric',
        ]);
        DB::connection('E_PIMS_CONNECTION')
            ->table('salary_adjustments')->updateOrInsert(
            [
                'employee_id' => $request['employeeId'],
                'salary_new' => $request['salaryNew'],
        ],
        [
            'employee_id'     => $request['employeeId'],
            'item_no'         => $request['itemNo'],
            'pp_id'           => $request['positionId'],
            'date_adjustment' => $request['dateAdjustment'],
            'sg_no'           => $request['salaryGrade'],
            'step_no'         => $request['stepNo'],
            'salary_previous' => $request['salaryPrevious'],
            'salary_new'      => $request['salaryNew'],
            'salary_diff'     => $request['salaryDifference'],
            'remarks'     => $request['remarks'],
            'deleted_at'      => null,
        ]);
        // DB::table('plantilla')->update([
        //     'salary_amount' => $request['salaryNew'],
        // ]);


        $dateCheck = $request['remarks'];
        if($dateCheck == ''){
            $remarks =  'Salary Adjust';
        } else{
            $remarks =  $request['remarks'];
        }

        DB::connection('E_PIMS_CONNECTION')->table('service_records')->updateOrInsert(
            [
                'employee_id' => $request['employeeId'],
                'position_id' =>  $request['positionId'],
        ],
        [
            'employee_id'               => $request['employeeId'],
            'service_from_date'         => $request['dateAdjustment'],
            'position_id'               =>  $request['positionId'],
            'status'                    => $request['status'],
            'salary'                    => $request['salaryNew'],
            'office_code'               => $request['officeCode'],
            'separation_cause'          => $remarks
        ]);

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
        $plantillaPosition = PlantillaPosition::select('pp_id','position_id','item_no','sg_no','office_code', 'old_position_name')->with('position:position_id,position_name')->get();
        $salaryAdjustment = SalaryAdjustment::find($id);
        return view('SalaryAdjustment.edit', compact('salaryAdjustment','employee', 'plantillaPosition'));
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
        $salaryAdjustment                  = SalaryAdjustment::find($id);
        $salaryAdjustment->employee_id     = $request['employeeName'];
        $salaryAdjustment->item_no         = $request['itemNo'];
        $salaryAdjustment->pp_id           = $request['position'];
        $salaryAdjustment->date_adjustment = $request['dateAdjustment'];
        $salaryAdjustment->sg_no           = $request['salaryGrade'];
        $salaryAdjustment->step_no         = $request['stepNo'];
        $salaryAdjustment->salary_previous = $request['salaryPrevious'];
        $salaryAdjustment->salary_new      = $request['salaryNew'];
        $salaryAdjustment->salary_diff     = $request['salaryDifference'];
        $salaryAdjustment->remarks     = $request['remarks'];
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
        SalaryAdjustment::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
