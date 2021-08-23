<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use Illuminate\Support\Facades\Auth;

class LeaveCardController extends Controller
{
    public function __construct(LeaveRecordRepository $leaveRecordRepository)
    {
        $this->leaveRecordRepository = $leaveRecordRepository;
    }

    public function index()
    {
        $employeeID = Auth::user()->employee_id;
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find($employeeID);
        

        // Forwarded Balance
        $forwardedBalance       = $this->leaveRecordRepository->getForwardedRecord($employeeID);
        $forwardedVacationLeave = $this->leaveRecordRepository->getVacationLeaveInForwarded($forwardedBalance);
        $forwardedSickLeave     = $this->leaveRecordRepository->getSickLeaveInForwarded($forwardedBalance);

        $totalOfForwardedBalance = $forwardedBalance->sum('earned');

        $recordsWithoutForwarded = $this->leaveRecordRepository->getRecordsWithoutForwarded($employeeID)->groupBy('record_type');


        return view('accounts.employee.leave.leave-card', [
            'employee'                   => $employee,
            'forwardedBalance'           => $forwardedBalance,
            'recordsWithoutForwarded'    => $recordsWithoutForwarded,
            'totalOfForwardedBalance'    => $totalOfForwardedBalance,
            'forwardedSickLeave'         => $forwardedSickLeave,
            'forwardedVacationLeave'     => $forwardedVacationLeave,
            'TYPES'                      => EmployeeLeaveRecord::TYPES,
            'SICK_LEAVE_CODE_NUMBER'     => 10001,
            'VACATION_LEAVE_CODE_NUMBER' => 10002,
            'overAllTotal'               => 0,
            'startDate'                  => null,
            'endDate'                    => null
        ]);
    }
    
    public function withRange(string $start = null, string $end = null)
    {

        $employeeID = Auth::user()->employee_id;
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find($employeeID);
        

        // Forwarded Balance
        $forwardedBalance       = $this->leaveRecordRepository->getForwardedRecord($employeeID);
        $forwardedVacationLeave = $this->leaveRecordRepository->getVacationLeaveInForwarded($forwardedBalance);
        $forwardedSickLeave     = $this->leaveRecordRepository->getSickLeaveInForwarded($forwardedBalance);

        $totalOfForwardedBalance = $forwardedBalance->sum('earned');

        $recordsWithoutForwarded = $this->leaveRecordRepository->getRecordsWithoutForwarded($employeeID, $start, $end)->groupBy('record_type');
        
        return view('accounts.employee.leave.leave-card', [
            'employee'                   => $employee,
            'forwardedBalance'           => $forwardedBalance,
            'recordsWithoutForwarded'    => $recordsWithoutForwarded,
            'totalOfForwardedBalance'    => $totalOfForwardedBalance,
            'forwardedSickLeave'         => $forwardedSickLeave,
            'forwardedVacationLeave'     => $forwardedVacationLeave,
            'TYPES'                      => EmployeeLeaveRecord::TYPES,
            'SICK_LEAVE_CODE_NUMBER'     => 10001,
            'VACATION_LEAVE_CODE_NUMBER' => 10002,
            'overAllTotal'               => 0,
            'startDate'                  => $start,
            'endDate'                    => $end
        ]);
    }
}
