<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use App\Services\MSAccess;
use Illuminate\Support\Facades\Auth;

class LeaveCardController extends Controller
{
    public function __construct(LeaveRecordRepository $leaveRecordRepository, MSAccess $database)
    {
        $this->leaveRecordRepository = $leaveRecordRepository;
        $this->database = $database;
    }

    public function index()
    {
        $employeeID = Auth::user()->employee_id;
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find($employeeID);
        

        // Forwarded Balance
        $forwardedBalance       = $this->leaveRecordRepository->getForwardedRecord($employeeID);
        $forwardedVacationLeave = $this->leaveRecordRepository->getVacationLeaveInForwarded($forwardedBalance);
        $forwardedSickLeave     = $this->leaveRecordRepository->getSickLeaveInForwarded($forwardedBalance);
        

        $totalOfForwardedBalance = $forwardedBalance->sum('earned') - $forwardedBalance->sum('used');
        
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

        $totalOfForwardedBalance = $forwardedBalance->sum('earned') - $forwardedBalance->sum('used');

        
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

    public function print(Request $request)
    {
        $data = $request->data;
        $this->database->execute("DELETE * FROM leave_card");

        $columns = ['period',
                    'particular',
                    'vl_earned',
                    'vl_absences_under_time_with_pay',
                    'vl_balance',
                    'vl_absences_under_time_without_pay',
                    'sl_earned',
                    'sl_absences_under_time_with_pay',
                    'sl_balance',
                    'sl_absences_under_time_without_pay',
                    'taken',
                    'date_action_for_leave_application'
        ];

        $columns = "(" .  implode(",", $columns) . ")";

        foreach($data as $record) {
            extract($record);

            $period ?? ' ';
            $particular ?? ' ';
            $vacation_earned ?? ' ';
            $vacation_absences_under_time_with_pay ?? ' ';
            $vacation_balance ?? ' ';
            $vacation_absences_under_time_without_pay ?? ' ';
            $sick_earned ?? ' ';
            $sick_absences_under_time_with_pay ?? ' ';
            $sick_balance ?? ' ';
            $sick_absences_under_time_without_pay ?? ' ';
            $taken ?? ' ';
            $over_all_total ?? ' ';

            $values = [
                $period, $particular, $vacation_earned, $vacation_absences_under_time_with_pay, $vacation_balance, $vacation_absences_under_time_without_pay, $sick_earned, $sick_absences_under_time_with_pay, $sick_balance, $sick_absences_under_time_without_pay, $taken, $over_all_total
            ];


            $values = "('" .  implode("','", $values) . "')";

            $this->database->execute("INSERT INTO leave_card ${columns} VALUES ${values}");
        }
        
        return response()->json(['success' => true]);
    }
}
