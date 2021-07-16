<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeaveType;
use App\EmployeeLeaveRecord;

class EmployeeLeaveRecordController extends Controller
{
    public const VACATION_LEAVE = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        $records = EmployeeLeaveRecord::with(['employee', 'type'])->get()->groupBy('employee.fullname');
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
        $leaveTypes = array_column(LeaveType::where('code', 'VL')->orWhere('code', 'SL')->get(['id'])->toArray(), 'id');
        foreach($leaveTypes as $type) {
            // Insert Record with As of.
            $employeefbLeaveRecord = new EmployeeLeaveRecord;
            $employeefbLeaveRecord->employee_id                                 = $request['employeeID'];
            $employeefbLeaveRecord->leave_type_id                               = $type;

            if($type == self::VACATION_LEAVE){
                $employeefbLeaveRecord->earned                                  = $request['vlEarned'];
                $employeefbLeaveRecord->used                                    = $request['vlEnjoyed'];
                $employeefbLeaveRecord->particular                              = 'Forwarded Leave credits balance for Vacation Leave';
            } else {
                $employeefbLeaveRecord->earned                                  = $request['slEarned'];
                $employeefbLeaveRecord->used                                    = $request['slEnjoyed'];
                $employeefbLeaveRecord->particular                              = 'Forwarded Leave credits balance for Sick Leave';
            }
            
            $employeefbLeaveRecord->fb_as_of                                    = $request['asOf'];
            $employeefbLeaveRecord->save();
            return response()->json(['success' => true]);
        }
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
