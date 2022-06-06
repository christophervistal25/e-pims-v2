<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Setting;
use App\Employee;
use Carbon\Carbon;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\EmployeeLeaveTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\EmployeeLeaveForwardedBalance;

class LeaveForwardedBalanceController extends Controller
{

    // public function getApplicationID(string $keyName, bool $isCreated){

    //     $lastID = DB::table('Settings')->where('Keyname', $keyName)->first();

    //     $convertedID = (int)$lastID->Keyvalue;

    //     if ($isCreated == true){
    //         $nextID = $convertedID + 1;
    //         DB::table('Settings')->where('Keyname', $keyName)->update([ 'Keyvalue' => (string)$nextID ]);
    //         return $convertedID;
    //     }else{

    //     }
    // }

    public function index()
    {
        $employees = Employee::exclude(['ImagePhoto'])
                        ->orderBy('LastName', 'asc')
                        ->orderBy('FirstName', 'asc')
                        ->permanent()
                        ->active()
                        ->get();
        return view('leave.leave-forwarded-balance', compact('employees'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $rPerEmployee = EmployeeLeaveForwardedBalance::with('employee')->get();
            
            
            return Datatables::of($rPerEmployee)
                ->addColumn('employee_id', function ($rPerEmployee) {
                    return $rPerEmployee->Employee_id;
                })
                ->addColumn('fullname', function ($rPerEmployee) {
                    return $rPerEmployee->employee->fullname;
                })
                ->addColumn('date_forwarded', function ($rPerEmployee) {
                    return date("Y-m-d", strtotime($rPerEmployee->date_forwarded));
                })
                ->addColumn('vl_earned', function ($rPerEmployee) {
                    return $rPerEmployee->vl_earned;
                })
                ->addColumn('vl_used', function ($rPerEmployee) {
                    return $rPerEmployee->vl_used;
                })
                ->addColumn('vl_balance', function ($rPerEmployee) {
                    return (float)$rPerEmployee->vl_earned - $rPerEmployee->vl_used;
                })
                ->addColumn('sl_earned', function ($rPerEmployee) {
                    return $rPerEmployee->sl_earned;
                })
                ->addColumn('sl_used', function ($rPerEmployee) {
                    return $rPerEmployee->sl_used;
                })
                ->addColumn('sl_balance', function ($rPerEmployee) {
                    return (float)$rPerEmployee->sl_earned - $rPerEmployee->sl_used;
                })
                ->addColumn('leave_balance', function ($rPerEmployee) {
                    return (float)$rPerEmployee->vl_earned - $rPerEmployee->vl_used
                        + ($rPerEmployee->sl_earned - $rPerEmployee->sl_used);
                })
                ->addcolumn('action', function ($rPerEmployee) {
                    $button = '<button type="button" class="btn btn-success btn-sm rounded-circle shadow edit__leave__type"
                                        data-id="' . $rPerEmployee->forwarded_id . '">
                                        <i class="fa fa-pencil"></i>
                                    </button>';
                    $button .=
                        '<button type="button" class="btn btn-danger btn-sm rounded-circle shadow delete__leave__type ml-1"
                            data-id="' . $rPerEmployee->forwarded_id . '">
                            <i class="fa fa-trash"></i>
                        </button>';

                    return $button;
                })
                ->make(true);
        }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Employee_id' => 'required|unique:employee_leave_forwarded_balance',
            'vl_earned' => 'required',
            'vl_used' => 'required',
            'sl_earned' => 'required',
            'sl_used' => 'required',
        ], [
            'Employee_id.required' => 'Please select an employee.',
            'Employee_id.unique' => 'Duplicated entry.',
            'vl_earned.required' => 'This field is required.',
            'vl_used.required' => 'This field is required.',
            'sl_earned.required' => 'This field is required.',
            'sl_used.required' => 'This field is required.',
        ]); 

        $lastID = DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->first();
        $convertedID = (int) $lastID->Keyvalue;
        // Insert Record with As of.
        $employeeLeaveForwardedBalance = EmployeeLeaveForwardedBalance::create([
            'forwarded_id'   => $convertedID,
            'Employee_id'    => $request['Employee_id'],
            'vl_earned'      => $request['vl_earned'],
            'vl_used'        => $request['vl_used'],
            'sl_earned'      => $request['sl_earned'],
            'sl_used'        => $request['sl_used'],
            'date_forwarded' => $request['date_forwarded'],
        ]);
        
        EmployeeLeaveTransaction::create([
            'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'transaction_id' => $convertedID,
            'transaction_type' => EmployeeLeaveForwardedBalance::class,
            'record_type' => 'ENTRANCE',
            'trans_date' => Carbon::now(),
             'vl_amount' => $employeeLeaveForwardedBalance->vl_earned - $employeeLeaveForwardedBalance->vl_used,
             'sl_amount' => $employeeLeaveForwardedBalance->sl_earned - $employeeLeaveForwardedBalance->sl_used,
        ]);
        
        $nextID = $convertedID + 1;
        
        DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->update([ 'Keyvalue' => (string)$nextID ]);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $ids
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaveRecord = EmployeeLeaveForwardedBalance::with('employee')->find($id);

        $employeeFullname = $leaveRecord->employee->fullname;
        $office = $leaveRecord->employee->office_charging->Description;
        $position = $leaveRecord->employee->position->Description;

        return response()
                ->json(['leaveRecord' => $leaveRecord, 
                        'employeeFullname' => $employeeFullname,
                        'office' => $office,
                        'position' => $position]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'update_vl_earned' => 'required',
            'update_vl_used' => 'required',
            'update_sl_earned' => 'required',
            'update_sl_used' => 'required',
        ], [
            'update_vl_earned.required' => 'This field is required.',
            'update_vl_used.required' => 'This field is required.',
            'update_sl_earned.required' => 'This field is required.',
            'update_sl_used.required' => 'This field is required.',
        ]);

        $updateRecord = EmployeeLeaveForwardedBalance::findOrFail($id);

        $updateRecord->Employee_id      = $request->update_Employee_id;
        $updateRecord->vl_earned        = $request->update_vl_earned;
        $updateRecord->vl_used          = $request->update_vl_used;
        $updateRecord->sl_earned        = $request->update_sl_earned;
        $updateRecord->sl_used          = $request->update_sl_used;
        $updateRecord->date_forwarded   = $request->update_date_forwarded;

        $updateRecord->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $leaveRecord = EmployeeLeaveForwardedBalance::find($id);
        $leaveRecord->delete();

        return response()->json(['success' => true]);

    }
}



?>