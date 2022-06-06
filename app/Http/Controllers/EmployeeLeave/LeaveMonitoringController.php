<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use Carbon\Carbon;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;

class LeaveMonitoringController extends Controller
{
    public function __construct(LeaveRecordRepository $leaveRecordRepository)
    {
        $this->leaveRecordRepository = $leaveRecordRepository;
    }

    public function index(Request $request)
    {
        $employees = Employee::permanent()->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2', 'PosCode']);
        return view('leave.leave-monitoring', compact('employees'));
    }

    public function list(Request $request, $id)
    {
        if ($request->ajax()) {

            $employee = Employee::permanent()->find($id, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2', 'PosCode']);

            // Forwarded Balance
            $forwardedBalance       = $this->leaveRecordRepository->getForwardedRecord($id);
            $totalOfForwardedBalance = ($forwardedBalance?->sum('vl_earned') + $forwardedBalance?->sum('sl_earned') ?? 0) - ($forwardedBalance?->sum('sl_earned') + $forwardedBalance?->sum('vl_earned'));
            $recordsWithoutForwarded = [];

            return view('leave.add-ons.leave-card', [
                'employee'                   => $employee,
                'forwardedBalance'           => $forwardedBalance,
                'recordsWithoutForwarded'    => $recordsWithoutForwarded,
                'totalOfForwardedBalance'    => $totalOfForwardedBalance,
                // 'forwardedSickLeave'         => $forwardedSickLeave,
                // 'forwardedVacationLeave'     => $forwardedVacationLeave,
                'forwardedBalance' => $forwardedBalance,
                'TYPES'                      => EmployeeLeaveRecord::TYPES,
                'SICK_LEAVE_CODE_NUMBER'     => 10001,
                'VACATION_LEAVE_CODE_NUMBER' => 10002,
                'overAllTotal'               => 0,
                'startDate'                  => null,
                'endDate'                    => null
            ]);
        }
    }
}
