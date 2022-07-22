<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use App\EmployeeLeaveRecord;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use Illuminate\Http\Request;

class LeaveMonitoringController extends Controller
{
    public function __construct(LeaveRecordRepository $leaveRecordRepository)
    {
        $this->leaveRecordRepository = $leaveRecordRepository;
    }

    public function index(Request $request)
    {
        $employees = Employee::orderBy('LastName', 'ASC')
        ->active()
        ->permanent()
        ->with(['forwarded_leave_records', 'offices'])
        ->without(['office_assignment', 'office_charging.desc'])
        ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2', 'PosCode']);

        return view('leave.leave-monitoring', compact('employees'));
    }

    public function list(Request $request, $id)
    {
        if ($request->ajax()) {
            $employee = Employee::find($id, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2', 'PosCode']);

            // Forwarded Balance
            $forwardedBalance = $this->leaveRecordRepository->getCredits($id);
            $totalOfForwardedBalance = ($forwardedBalance?->sum('vl_balance') + $forwardedBalance?->sum('vl_balance') ?? 0);
            $recordsWithoutForwarded = [];

            return view('leave.add-ons.leave-card', [
                'employee' => $employee,
                'forwardedBalance' => $forwardedBalance,
                'recordsWithoutForwarded' => $recordsWithoutForwarded,
                'totalOfForwardedBalance' => $totalOfForwardedBalance,
                // 'forwardedSickLeave'         => $forwardedSickLeave,
                // 'forwardedVacationLeave'     => $forwardedVacationLeave,
                'forwardedBalance' => $forwardedBalance,
                'TYPES' => EmployeeLeaveRecord::TYPES,
                'SICK_LEAVE_CODE_NUMBER' => 10001,
                'VACATION_LEAVE_CODE_NUMBER' => 10002,
                'overAllTotal' => 0,
                'startDate' => null,
                'endDate' => null,
            ]);
        }
    }
}
