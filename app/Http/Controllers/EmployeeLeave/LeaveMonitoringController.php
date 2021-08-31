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
        $employees = Employee::has('information')->with(['information','information.office', 'information.position'])->get();

        return view('leave.leave-monitoring', compact('employees'));
        
    }

    public function list(Request $request, $id)
    {
        if ($request->ajax()) {

            $employee = Employee::with(['information', 'information.office', 'information.position'])->find($id);
            // Forwarded Balance
            $forwardedBalance       = $this->leaveRecordRepository->getForwardedRecord($id);
            $forwardedVacationLeave = $this->leaveRecordRepository->getVacationLeaveInForwarded($forwardedBalance);
            $forwardedSickLeave     = $this->leaveRecordRepository->getSickLeaveInForwarded($forwardedBalance);
            
            $totalOfForwardedBalance = $forwardedBalance->sum('earned') - $forwardedBalance->sum('used');

            $recordsWithoutForwarded = $this->leaveRecordRepository->getRecordsWithoutForwarded($id)->groupBy('record_type');
        
            return view('leave.add-ons.leave-card', [
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
    }
}
?>