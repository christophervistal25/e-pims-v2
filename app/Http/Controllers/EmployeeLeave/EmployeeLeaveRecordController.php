<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeaveType;
use App\EmployeeLeaveRecord;
use Yajra\Datatables\Datatables;

class EmployeeLeaveRecordController extends Controller
{
    public const SICK_LEAVE = 10001;
    public const VACATION_LEAVE = 10002;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::has('information.office')
                                    ->with(['information.office', 'information.position'])
                                    ->whereDoesntHave('forwarded_leave_records')
                                    ->get();
        $records = EmployeeLeaveRecord::where('fb_as_of', '!=', NULL)->with(['employee', 'type'])->get()->groupBy('employee.fullname');
        return view('leave.leave-forwarded-balance', compact('records', 'employees'));
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
        // $leaveTypes = array_column(, 'id');

        $leaveTypes = LeaveType::where('code_number', self::VACATION_LEAVE)
                                                ->orWhere('code_number', self::SICK_LEAVE)
                                                ->get(['code_number', 'id']);
        
        $leaveTypes->each(function ($leaveType) use ($request) {
            // Insert Record with As of.
            $employeefbLeaveRecord = new EmployeeLeaveRecord;
            $employeefbLeaveRecord->employee_id                                 = $request['employeeID'];
            $employeefbLeaveRecord->leave_type_id                               = $leaveType->id;

            if($leaveType->code_number === self::SICK_LEAVE){
                $employeefbLeaveRecord->earned                                  = $request['slEarned'];
                $employeefbLeaveRecord->used                                    = $request['slEnjoyed'];
                $employeefbLeaveRecord->particular                              = 'Forwarded Leave credits balance for Sick Leave';
            }

            if($leaveType->code_number === self::VACATION_LEAVE){
                $employeefbLeaveRecord->earned                                  = $request['vlEarned'];
                $employeefbLeaveRecord->used                                    = $request['vlEnjoyed'];
                $employeefbLeaveRecord->particular                              = 'Forwarded Leave credits balance for Vacation Leave';
            }
            
            $employeefbLeaveRecord->fb_as_of                                    = $request['asOf'];
            $employeefbLeaveRecord->save();
        });
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $ids
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
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find($id);
        $leaveRecord = EmployeeLeaveRecord::where('employee_id', $id)->whereNotNull('fb_as_of')->get();
        return response()->json(['leaveRecord' => $leaveRecord, 'employee_information' => $employee]);
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
        $leaveRecord = EmployeeLeaveRecord::with('type')
                                            ->where('employee_id', $id)
                                            ->whereNotNull('fb_as_of')
                                            ->get();

        foreach($leaveRecord as $leaverec){
            // Insert Record with As of.
            if($leaverec->type->code_number === self::SICK_LEAVE){
                $leaverec->earned                                  = $request['update_slEarned'];
                $leaverec->used                                    = $request['update_slEnjoyed'];
                $leaverec->particular                              = 'Forwarded Leave credits balance for Sick Leave';
            }
            if($leaverec->type->code_number === self::VACATION_LEAVE){
                $leaverec->earned                                  = $request['update_vlEarned'];
                $leaverec->used                                    = $request['update_vlEnjoyed'];
                $leaverec->particular                              = 'Forwarded Leave credits balance for Vacation Leave';
            }
            
            $leaverec->fb_as_of                                    = $request['update_asOf'];
            $leaverec->save();
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
        $leaveRecord = EmployeeLeaveRecord::where('employee_id', $id)->whereDate('fb_as_of', $request['fb_as_of'])->get();
        foreach($leaveRecord as $leaverec){
            $leaverec->delete();
        }
        return response()->json(['success' => true]);
    }
}