<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Office;
use App\Plantilla;
use App\service_record;
class ServiceRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::select('office_code', 'office_name')->get();
        $status = ['Please Select', 'Casual', 'Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        count($status) - 1;
        $position = Position::select('position_id', 'position_name')->get();
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename')->get();
        $plantilla = Plantilla::select('plantilla_id','employee_id')->with('employee:employee_id,firstname,middlename,lastname,extension')->get();
        // $plantilla = plantilla::with(['employee', 'employee'])->get();
        return view('ServiceRecords.ServiceRecords', compact('employee', 'position', 'status', 'office', 'plantilla'));
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
        // $this->validate($request, [
        //     'employeeName'                        => 'required',
        //     'itemNo'                              => 'required',
        //     'positionId'                          => 'required',
        //     'dateAdjustment'                      => 'required',
        //     'salaryGrade'                         => 'required',
        //     'stepNo'                              => 'required',
        //     'salaryPrevious'                      => 'required|numeric',
        //     'salaryNew'                           => 'required|numeric',
        //     'salaryDifference'                    => 'required|numeric',
        // ]);
        $service_record = new service_record;
        // dd($service_record);
        $service_record->employee_id                = $request['employeeId'];
        $service_record->service_from_date                    = $request['fromDate'];
        $service_record->service_to_date                = $request['toDate'];  
        $service_record->position_id            = $request['positionTitle'];
        $service_record->status                      = $request['status'];
        $service_record->salary                    = $request['salary'];
        $service_record->office_name            = $request['officeCode'];
        $service_record->office_address            = $request['officeAddress'];
        $service_record->leave_without_pay                 = $request['leavePay'];
        $service_record->separation_date                = $request['date'];
        $service_record->separation_cause                = $request['cause'];
        $service_record->save();
        // return response()->json(['success'=>true]);
        return view ('ServiceRecords.ServiceRecords');
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
