<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use App\EmployeeLeaveForwardedBalance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

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
            $button = null;

            $rPerEmployee = EmployeeLeaveForwardedBalance::with('employee')->get();

            return Datatables::of($rPerEmployee)
                ->addColumn('employee_id', function ($rPerEmployee) {
                    return $rPerEmployee->Employee_id;
                })
                ->addColumn('fullname', function ($rPerEmployee) {
                    return $rPerEmployee->employee->fullname;
                })
                ->addColumn('date_forwarded', function ($rPerEmployee) {
                    return date('Y-m-d', strtotime($rPerEmployee->date_forwarded));
                })
                ->addColumn('vl_balance', function ($rPerEmployee) {
                    return $rPerEmployee->vl_balance;
                })
                ->addColumn('sl_balance', function ($rPerEmployee) {
                    return $rPerEmployee->sl_balance;
                })
                ->addcolumn('action', function ($rPerEmployee) use ($button) {
                    $button .= '<button type="button" class="btn btn-success btn-sm rounded-circle shadow edit__leave__type ml-1"
                                        data-id="'.$rPerEmployee->forwarded_id.'">
                                        <i class="text-white fa fa-pencil"></i>
                                    </button>';
                    $button .=
                        '<button type="button" class="btn btn-danger btn-sm rounded-circle shadow delete__leave__type ml-1"
                            data-id="'.$rPerEmployee->forwarded_id.'">
                            <i class="text-white fa fa-trash"></i>
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Employee_id' => 'required|unique:employee_leave_forwarded_balance',
            'vl_balance' => 'required',
            'sl_balance' => 'required',
        ], [
            'Employee_id.required' => 'Please select an employee.',
            'Employee_id.unique' => 'Duplicated entry.',
            'vl_balance.required' => 'This field is required.',
            'sl_balance.required' => 'This field is required.',
        ]);

        $lastID = DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->first();
        $convertedID = (int) $lastID->Keyvalue;
        // Insert Record with As of.
        $employeeLeaveForwardedBalance = EmployeeLeaveForwardedBalance::create([
            'forwarded_id' => $convertedID,
            'Employee_id' => $request['Employee_id'],
            'date_forwarded' => $request['date_forwarded'],
            'vl_balance' => $request['vl_balance'],
            'sl_balance' => $request['sl_balance'],
            'vawc_balance' => $request['vawc_balance'],
            'adopt_balance' => $request['adopt_balance'],
            'mandatory_balance' => $request['mandatory_balance'],
            'maternity_balance' => $request['maternity_balance'],
            'paternity_balance' => $request['paternity_balance'],
            'soloparent_balance' => $request['soloparent_balance'],
            'emergency_balance' => $request['emergency_balance'],
            'slb_balance' => $request['slb_balance'],
            'study_balance' => $request['study_balance'],
            'spl_balance' => $request['spl_balance'],
            'rehab_balance' => $request['rehab_balance'],
        ]);

        $nextID = $convertedID + 1;

        DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->update(['Keyvalue' => (string) $nextID]);

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
        $leaveRecord = EmployeeLeaveForwardedBalance::with('employee')->find($id);

        $employeeFullname = $leaveRecord->employee->fullname;
        $office = $leaveRecord->employee->office_charging->Description;
        $position = $leaveRecord->employee->position->Description;

        return response()
            ->json([
                'leaveRecord' => $leaveRecord,
                'employeeFullname' => $employeeFullname,
                'office' => $office,
                'position' => $position,
            ]);
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
            'vl_balance' => 'required',
            'sl_balance' => 'required',
        ], [
            'vl_balance.required' => 'This field is required.',
            'sl_balance.required' => 'This field is required.',
        ]);

        $updateRecord = EmployeeLeaveForwardedBalance::findOrFail($id);

        $updateRecord->vl_balance = $request->vl_balance;
        $updateRecord->sl_balance = $request->sl_balance;
        $updateRecord->vawc_balance = $request->vawc_balance;
        $updateRecord->adopt_balance = $request->adopt_balance;
        $updateRecord->mandatory_balance = $request->mandatory_balance;
        $updateRecord->maternity_balance = $request->maternity_balance;
        $updateRecord->paternity_balance = $request->paternity_balance;
        $updateRecord->soloparent_balance = $request->soloparent_balance;
        $updateRecord->emergency_balance = $request->emergency_balance;
        $updateRecord->slb_balance = $request->slb_balance;
        $updateRecord->study_balance = $request->study_balance;
        $updateRecord->spl_balance = $request->spl_balance;
        $updateRecord->rehab_balance = $request->rehab_balance;
        $updateRecord->date_forwarded = $request->date_forwarded;
        $updateRecord->save();

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
        $leaveRecord = EmployeeLeaveForwardedBalance::find($id);
        $leaveRecord->delete();

        return response()->json(['success' => true]);
    }
}
