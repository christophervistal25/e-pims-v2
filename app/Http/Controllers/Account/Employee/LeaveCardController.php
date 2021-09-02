<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use Carbon\Carbon;
use App\Services\MSAccess;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\LeaveRecordRepository;

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

        // // Forwarded Balance
        $forwardedBalance  = $this->leaveRecordRepository->getForwardedRecord($employeeID);

        $forwardedVacationLeave = $this->leaveRecordRepository->getVacationLeaveInForwarded($forwardedBalance);
        $forwardedSickLeave     = $this->leaveRecordRepository->getSickLeaveInForwarded($forwardedBalance);

        $recordsWithoutForwarded = $this->leaveRecordRepository->getRecordsWithoutForwarded($employeeID);

        $recordsWithoutForwarded = $recordsWithoutForwarded->groupBy(function ($data) {
            return $data->date_record->format('F d, Y') . '-' . $data->record_type;
        });

        return view('accounts.employee.leave.leave-card', [
            'employee'                   => $employee,
            'forwardedBalance'           => $forwardedBalance,
            'forwardedVacationLeave'     => $forwardedVacationLeave,
            'forwardedSickLeave'         => $forwardedSickLeave,
            'recordsWithoutForwarded'    => $recordsWithoutForwarded,
            // 'employee'                => $employee,
            // 'forwardedBalance'        => $forwardedBalance,
            // 'forwardedSickLeave'      => $forwardedSickLeave,
            // 'forwardedVacationLeave'  => $forwardedVacationLeave,
            'TYPES'                      => EmployeeLeaveRecord::TYPES,
            'SICK_LEAVE_CODE_NUMBER'     => 10001,
            'VACATION_LEAVE_CODE_NUMBER' => 10002,
            // 'overAllTotal'            => 0,
            // 'startDate'               => null,
            // 'endDate'                 => null
        ]);
    }
    
    public function withRange(string $start = null, string $end = null)
    {
        $employeeID = Auth::user()->employee_id;
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find($employeeID);

        // // Forwarded Balance
        $forwardedBalance  = $this->leaveRecordRepository->getForwardedRecord($employeeID);

        $forwardedVacationLeave = $this->leaveRecordRepository->getVacationLeaveInForwarded($forwardedBalance);
        $forwardedSickLeave     = $this->leaveRecordRepository->getSickLeaveInForwarded($forwardedBalance);
        $recordsWithoutForwarded = $this->leaveRecordRepository->getRecordsWithoutForwardedByRange($employeeID, $start, $end);
        

        $recordsWithoutForwarded = $recordsWithoutForwarded->groupBy(function ($data) {
            return $data->date_record->format('F d, Y') . '-' . $data->record_type;
        });


        return view('accounts.employee.leave.leave-card', [
            'employee'                   => $employee,
            'forwardedBalance'           => $forwardedBalance,
            'forwardedVacationLeave'     => $forwardedVacationLeave,
            'forwardedSickLeave'         => $forwardedSickLeave,
            'recordsWithoutForwarded'    => $recordsWithoutForwarded,
            'TYPES'                      => EmployeeLeaveRecord::TYPES,
            'SICK_LEAVE_CODE_NUMBER'     => 10001,
            'VACATION_LEAVE_CODE_NUMBER' => 10002,
            'startDate'               => $start,
            'endDate'                 => $end
        ]);
    }

    public function print(Request $request)
    {

        $data = $request->leaveCardData;

        $this->database->execute("DELETE * FROM leave_card");
        $this->database->execute("DELETE * FROM leave_card_information");

        $columns = [
                    'period',
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
            $total ?? ' ';

            $values = [
                $period, $particular, $vacation_earned, $vacation_absences_under_time_with_pay, $vacation_balance, $vacation_absences_under_time_without_pay, $sick_earned, $sick_absences_under_time_with_pay, $sick_balance, $sick_absences_under_time_without_pay, $taken, $total
            ];


            $values = "('" .  implode("','", $values) . "')";

            $this->database->execute("INSERT INTO leave_card ${columns} VALUES ${values}");
        }

        $employee = Auth::user()->employee;
        $fullName = $employee->fullname;
        $position = $employee->information->position->position_name;
        $office = $employee->information->office->office_name;

        $this->database->execute("INSERT INTO leave_card_information (employee_name, office, position) VALUES('$fullName', '$office', '$office')");
        
        return response()->json(['success' => true]);
    }
}
