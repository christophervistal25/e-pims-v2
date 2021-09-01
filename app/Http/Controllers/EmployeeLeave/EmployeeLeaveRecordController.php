<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use App\LeaveType;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\LeaveRecordRepository;

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
        
        $this->validate($request, [
            'employeeName'          => 'required',
            'vlEarned'              => 'required',
            'vlEnjoyed'             => 'required',
            'slEarned'              => 'required',
            'slEnjoyed'             => 'required',
        ], [
            'employeeName.required' => 'Please select an employee.',
            'vlEarned.required'     => 'This field is required.',
            'slEarned.required'     => 'This field is required.',
            'vlEnjoyed.required'    => 'This field is required.',
            'slEnjoyed.required'    => 'This field is required.',
        ]);

        $leaveTypes = LeaveType::where('code_number', self::VACATION_LEAVE)
                                                ->orWhere('code_number', self::SICK_LEAVE)
                                                ->get(['code_number', 'id']);
        
        $leaveTypes->each(function ($leaveType) use ($request) {
            // Insert Record with As of.
            $employeeForwardedBalanceRecord = new EmployeeLeaveRecord;
            $employeeForwardedBalanceRecord->employee_id                                 = $request['employeeID'];
            $employeeForwardedBalanceRecord->leave_type_id                               = $leaveType->id;

            if($leaveType->code_number === self::SICK_LEAVE){
                $employeeForwardedBalanceRecord->earned                                  = $request['slEarned'];
                $employeeForwardedBalanceRecord->used                                    = $request['slEnjoyed'];
                $employeeForwardedBalanceRecord->particular                              = 'ENTRANCE';
            }

            if($leaveType->code_number === self::VACATION_LEAVE){
                $employeeForwardedBalanceRecord->earned                                  = $request['vlEarned'];
                $employeeForwardedBalanceRecord->used                                    = $request['vlEnjoyed'];
                $employeeForwardedBalanceRecord->particular                              = 'ENTRANCE';
            }
            
            $employeeForwardedBalanceRecord->fb_as_of                                    = $request['asOf'];
            $employeeForwardedBalanceRecord->record_type                                 = EmployeeLeaveRecord::TYPES['FORWARD'];
            $employeeForwardedBalanceRecord->date_record                                 = $request['asOf'];
            $employeeForwardedBalanceRecord->save();
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
        $this->validate($request, [
            'update_vlEarned'              => 'required',
            'update_vlEnjoyed'             => 'required',
            'update_slEarned'              => 'required',
            'update_slEnjoyed'             => 'required',
        ], [
            'update_vlEarned.required'     => 'This field is required.',
            'update_slEarned.required'     => 'This field is required.',
            'update_vlEnjoyed.required'     => 'This field is required.',
            'update_slEnjoyed.required'     => 'This field is required.',
        ]);

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
            $leaverec->date_record                                 = $request['update_asOf'];
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
