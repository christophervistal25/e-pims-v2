<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use App\Plantilla;
use App\PlantillaOfSchedule;
use App\Division;
use App\Employee;
use App\Position;
use App\PlantillaPosition;
use App\SalaryGrade;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
class PlantillaOfScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillaYear = Plantilla::select('year')->distinct()->get();
        $PlantillaOfScheduleYear = PlantillaOfSchedule::select('year')->distinct()->get();
        $office = Office::select('office_code', 'office_name')->get();
        return view('PlantillaOfSchedule.PlantillaOfSchedule', compact('office', 'plantillaYear', 'PlantillaOfScheduleYear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $year = Carbon::now()->format('Y') - 1;
            $data = Plantilla::select('plantilla_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('year' ,'=',  $year)->orderBy('plantilla_id', 'DESC');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('plantillaPosition', function ($row) {
                        return $row->plantillaPosition->position->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_short_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm id__holder' data-id='".$row['plantilla_id']."'><i class='la la-pencil'></i></a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('PlantillaOfSchedule.PlantillaOfSchedule');
    }


    public function adjustedlist(Request $request)
    {
        if ($request->ajax()) {
            $data = PlantillaOfSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->orderBy('plantilla_id', 'DESC');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('plantillaPosition', function ($row) {
                        return $row->plantillaPosition->position->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_short_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-schedule.edit', $row->ps_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('PlantillaOfSchedule.PlantillaOfSchedule');
    }



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
    public function edit($ps_id)
    {
        $plantillaSchedule = PlantillaOfSchedule::find($ps_id);
        $salarygrade = SalaryGrade::get(['sg_no']);
        $status = ['Please Select', 'Casual', 'Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        count($status) - 1;
        $areacode = ['Please Select', 'Region 1', 'Region 2','Region 3','Region 4','Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12','NCR', 'CAR', 'CARAGA', 'ARMM'];
        count($areacode) - 1;
        $areatype = ['Please Select','Region','Province','District','Municipality','Foreign Post'];
        count($areatype) - 1;
        $arealevel = ['Please Select','K','T','S','A'];
        count($arealevel) - 1;
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename')->get();
        $office = Office::select('office_code', 'office_name')->get();
        $division = Division::select('division_id', 'division_name', 'office_code')->get();
        $position = Position::select('position_id', 'position_name')->get();
        $plantillaSchedulePositionIDAll = PlantillaOfSchedule::where('ps_id','!=',$ps_id)->get()->pluck('pp_id')->toArray();
        $plantillaSchedulePositionAll = PlantillaPosition::select('pp_id', 'position_id', 'office_code')->with('position:position_id,position_name')->whereNotIn('pp_id', $plantillaSchedulePositionIDAll )->get();
        return view('PlantillaOfSchedule.edit', compact('employee', 'plantillaSchedule', 'salarygrade', 'status','areacode','areatype','arealevel','office','division','position','plantillaSchedulePositionAll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ps_id)
    {
        $this->validate($request, [
            'itemNo'                        => 'required',
            'positionTitle'                 => 'required',
            'employeeId'                  => 'required',
            'salaryGrade'                   => 'required|in:' . implode(',',range(1, 33)),
            'stepNo'                        => 'required|in:' . implode(',',range(1, 8)),
            'currentSgyear'                  => 'required',
            'salaryAmount'                  => 'required|numeric',
            'officeCode'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'divisionId'                    => 'required',
            'originalAppointment'           => 'required',
            'lastPromotion'                 => 'required|after:originalAppointment',
            'status'                        => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'areaCode'                      => 'required|in:' . implode(',', Plantilla::REGIONS),
            'areaType'                      => 'required|in:Region,Province,District,Municipality,Foreign Post',
            'areaLevel'                     => 'required|in:K,T,S,A',
        ]);
        $plantilla                         = PlantillaOfSchedule::find($ps_id);
        $plantilla->item_no                = $request['itemNo'];
        $plantilla->old_item_no            = $request['oldItemNo'];
        $plantilla->pp_id                  = $request['positionTitle'];
        $plantilla->employee_id            = $request['employeeId'];
        $plantilla->sg_no                  = $request['salaryGrade'];
        $plantilla->step_no                = $request['stepNo'];
        $plantilla->salary_amount          = $request['salaryAmount'];
        $plantilla->office_code            = $request['officeCode'];
        $plantilla->division_id            = $request['divisionId'];
        $plantilla->date_original_appointment = $request['originalAppointment'];
        $plantilla->date_last_promotion    = $request['lastPromotion'];
        $plantilla->status                 = $request['status'];
        $plantilla->area_code              = $request['areaCode'];
        $plantilla->area_type              = $request['areaType'];
        $plantilla->area_level             = $request['areaLevel'];
        $plantilla->year             = $request['currentSgyear'];
        $plantilla->save();
        Session::flash('alert-success', 'Plantilla Schedule Updated Successfully');
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
        //
    }
}
