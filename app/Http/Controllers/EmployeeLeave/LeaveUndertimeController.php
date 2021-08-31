<?php

namespace App\Http\Controllers\EmployeeLeave;

use Carbon\Carbon;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use App\EmployeeLeaveUndertime;
use App\Http\Controllers\Controller;

class LeaveUndertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            $carbonDate=Carbon::parse($request->date_added)->format('Y-m-d');
            $this->validate($request, [
                'date_added'             => 'required',
                'equivalent'             => 'required|not_in:0',
            ], [
                'date_added.required'   => '<small>Please select a month.</small>',
                'equivalent.not_in'     => '<small>Equivalent leave should have a value. Please input atleast 1 input box of late or undertime.</small>',
            ]);
            
            $employeeUndertime = EmployeeLeaveUndertime::create([
                'employee_id'       => $request->employee_id,
                'hoursLate'         => $request->hoursLate,
                'minsLate'          => $request->minsLate,
                'hoursUndertime'    => $request->hoursUndertime,
                'minsUndertime'     => $request->minsUndertime,
                'equivalent'        => $request->equivalent,
                'month_year'        => $carbonDate,
            ]);

            if($employeeUndertime) {
                $employeeLeaveRecord = EmployeeLeaveRecord::create([
                    'employee_id'                                   => $request->employee_id,
                    'leave_type_id'                                 => 2,
                    'earned'                                        => 0,
                    'used'                                          => 0,
                    'particular'                                    => 'T(0-'.$request->hoursLate.'-'.$request->minsLate.') / U(0-'.$request->hoursUndertime.'-'.$request->minsUndertime.')',
                    'absences_under_time_with_pay_balance'          => $request->equivalent,
                    'absences_under_time_without_pay_balance'       => 0,
                    'record_type'                                   => EmployeeLeaveRecord::TYPES['DECREMENT'],
                    'undertime_id'                                  => $employeeUndertime->id,
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
        return EmployeeLeaveUndertime::findOrFail($id);
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
        if($request->ajax()) {
            $carbonDate=Carbon::parse($request->date_added)->format('Y-m-d');
            $this->validate($request, [
                'date_added'             => 'required',
                'equivalent'             => 'required|not_in:0',
            ], [
                'date_added.required'   => '<small>Please select a month.</small>',
                'equivalent.not_in'     => '<small>Equivalent leave should have a value. Please input atleast 1 input box of late or undertime.</small>',
            ]);
            //update
            $undertimeRecords = EmployeeLeaveUndertime::with('leave_records')->where('id', $id)->get();
            foreach($undertimeRecords as $undertimeRecord){
                // Insert Record with As of.
                $undertimeRecord->hoursLate         = $request->hoursLate;
                $undertimeRecord->minsLate          = $request->minsLate;
                $undertimeRecord->hoursUndertime    = $request->hoursUndertime;
                $undertimeRecord->minsUndertime     = $request->minsUndertime;
                $undertimeRecord->month_year        = $carbonDate;
                $undertimeRecord->equivalent        = $request->equivalent;
                $undertimeRecord->save();

                $undertimeRecord->leave_records->particular = 'T(0-'.$request->hoursLate.'-'.$request->minsLate.') / U(0-'.$request->hoursUndertime.'-'.$request->minsUndertime.')';
                $undertimeRecord->leave_records->absences_under_time_with_pay_balance = $request->equivalent;
                $undertimeRecord->leave_records->save();
            }
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $undertime = EmployeeLeaveUndertime::with('leave_records')->find($id);
        $undertime->delete();

        $undertime->leave_records()->delete();
        return response()->json(['success' => true]);
    }
}
