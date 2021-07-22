<?php

namespace App\Http\Controllers\Account\Employee;

use App\Office;
use App\LeaveType;
use Illuminate\Http\Request;
use App\EmployeeLeaveApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\LeaveTypeRepository;
use App\Http\Repositories\LeaveRecordRepository;

class LeaveApplicationController extends Controller
{
    public function __construct(LeaveTypeRepository $leaveTypeRepository, LeaveRecordRepository $leaveRecordRepository)
    {
        $this->leaveTypeRepository = $leaveTypeRepository;
        $this->leaveRecordRepository = $leaveRecordRepository;
    }

    public function index()
    {
        
    }

    public function create()
    {
        $employee = Auth::user()->employee;

        $approvedBy = $employee->information->office->office_head;
        
        $hrOfficeHead = Office::where('office_code', 10050)->first()['office_head'];

        ['vacation_leave_earned' => $vacationLeaveEarned, 'vacation_leave_used' => $vacationLeaveUsed] = $this->leaveRecordRepository->getVacationLeave($employee->employee_id);

        ['sick_leave_earned' => $sickLeaveEarned, 'sick_leave_used' => $sickLeaveUsed] = $this->leaveRecordRepository->getSickLeave($employee->employee_id);
        
        $forwardBalanceAsOfDate = $this->leaveRecordRepository->getAsOfDate($employee->employee_id);
        
        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender($employee->sex);
        
        return view('accounts.employee.leave.application-filling', compact('types', 'vacationLeaveEarned', 'vacationLeaveUsed', 'sickLeaveEarned', 'sickLeaveUsed', 'forwardBalanceAsOfDate', 'approvedBy', 'hrOfficeHead'));
    }

    public function store(Request $request)
    {
        
        if($request->ajax()) {
            // Validation with employee balance look-up
            $employee = Auth::user()->employee;

            EmployeeLeaveApplication::create([
                'employee_id'           => $employee->employee_id,
                'approved_by'           => $request->approvedBy,
                'recommending_approval' => $request->recommendingApproval,
                'commutation'           => $request->commutation,
                'date_applied'          => $request->dateApply,
                'date_from'             => $request->startDate,
                'date_to'               => $request->endDate,
                'incase_of'             => $request->inCaseOf,
                'no_of_days'            => $request->noOfDays,
                'leave_type_id'         => $request->typeOfLeave,
            ]);

            return response()->json(['success' => true, 'fullname' => $employee->lastname . ', ' .  $employee->firstname . ' ' . $employee->middlename . '.'], 201);
        }
        return response()->json(['success' => false], 404);
    }
}
