<?php

namespace App\Http\Controllers\Account\Employee;

use App\Office;
use App\LeaveType;
use Carbon\Carbon;
use App\Services\MSAccess;
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
        
        $hrOfficeHead = Office::where('office_code', Office::HR_OFFICE_CODE)
                                    ->first()['office_head'];

        [
            'vacation_leave_earned' => $vacationLeaveEarned,
            'vacation_leave_used'   => $vacationLeaveUsed
        ] = $this->leaveRecordRepository->getVacationLeave($employee->employee_id);
        [
            'sick_leave_earned' => $sickLeaveEarned,
            'sick_leave_used'   => $sickLeaveUsed
        ] = $this->leaveRecordRepository->getSickLeave($employee->employee_id);
        
        $forwardBalanceAsOfDate = $this->leaveRecordRepository->getAsOfDate($employee->employee_id);
        
        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender($employee->sex);

        return view('accounts.employee.leave.application-filling', compact('types', 'vacationLeaveEarned', 'vacationLeaveUsed', 'sickLeaveEarned', 'sickLeaveUsed', 'forwardBalanceAsOfDate', 'approvedBy', 'hrOfficeHead'));
    }

    public function store(Request $request)
    {
        
        if($request->ajax()) {
            $employee = Auth::user()->employee;

            // Check if employee already request a leave.
            $hasPendingLeave = $employee->leave_files->where('approved_status', 'pending')->count();

            if($hasPendingLeave) {
                return response()->json(['success' => false, 'message' => 'You already have a pending request please wait for the approval before filing new application.'], 423);
            }

            $startDate = Carbon::now()->addDays(5);

            // Validation with employee balance look-up
            $this->validate($request, [
                'approvedBy'           => ['required'],
                'recommendingApproval' => ['required'],
                'commutation'          => ['required'],
                'dateApply'            => ['required'],
                'startDate'            => ['required', 'after:' . $startDate->format('Y-m-d'), 'before:' . Carbon::parse($request->endDate)->format('Y-m-d')],
                'endDate'              => ['required', 'after:' . $startDate->format('Y-m-d')],
                'inCaseOf'             => ['required'],
                'noOfDays'             => ['required'],
                'typeOfLeave'          => ['required'],
            ], [], [
                    'startDate'   => 'Start Date',
                    'endDate'     => 'End Date',
                    'inCaseOf'    => 'In case of',
                    'typeOfLeave' => 'Leave type',
                    'noOfDays'    => 'No. of days',
                    'typeOfLeave' => 'Leave type',
                ]);

            $leaveType = LeaveType::where('code_number', $request->typeOfLeave)->first();


            $response = $this->leaveRecordRepository
                            ->fileApplication($employee->first(['first_day_of_service', 'sex', 'employee_id']), $leaveType, $request->noOfDays);

            if(!$response['status']) {
                return response()->json(['success' => false, 'message' => $response['message']], 424);
            }

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
                'leave_type_id'         => $leaveType->id,
            ]);

            
            
            return response()->json(['success' => true, 'fullname' => $employee->fullname ], 201);
        }
        return response()->json(['success' => false], 404);
    }

    public function print(int $applicationID)
    {
        $application = EmployeeLeaveApplication::find($applicationID);
        $employee = Auth::user()->employee;
        $database = new MSAccess();

        $vacationLeave = $this->leaveRecordRepository->getVacationLeave($employee->employee_id);
        $sickLeave     = $this->leaveRecordRepository->getSickLeave($employee->employee_id);
        
        $fullName           = $employee->fullname;
        $office             = $employee->information->office->office_name;
        $officeHead         = $employee->information->office->office_head;

        $position           = $employee->information->position->position_name;
        $positionSGNo       = $employee->information->position->sg_no;
        $dateOfFill         = $application->date_applied;
        $salary             = $employee->plantilla ? number_format($employee->plantilla->salary_amount, 2, '.', ',') : 0;
        $leaveType          = $application->type->name;
        $incaseOf           = $application->incase_of;
        $inclusiveDates     = "";
        $commutation        = $application->commutation;

        $tardiness          = 0;
        $under_time         = 0;

        
        $vacationEarn       = $vacationLeave['vacation_leave_earned'];
        $vacationLess       = $vacationLeave['vacation_leave_used'];
        $sickEarn           = $sickLeave['sick_leave_earned'];
        $sickLess           = $sickLeave['sick_leave_used'];
        $earnTotal          = $vacationLeave['vacation_leave_earned'] + $sickLeave['sick_leave_earned'];
        $lessTotal          = $vacationLeave['vacation_leave_used'] + $sickLeave['sick_leave_used'];
        $vacationTotal      = $vacationEarn - $vacationLess;
        $sickTotal          = $sickEarn - $sickLess;
        $recommendation     = $application->recommending_approval;
        $approvedFor        = $application->approved_for;
        $disapproved_due_to = $application->disapproved_due_to;

        $columns = [
            'office'          => $office,
            'fullname'        => $fullName,
            'date_of_filling' => $dateOfFill,
            'position'        => $position,
            'salary'          => $salary,
            'type_of_leave'   => $application->type->name,
        ];
        if($application->type->code_number === 10001) {
            // sick leave
        } else {
            // vacation leave
        }
        // 'in_case_of_sick_leave' => $incaseOf,

        $database->execute("DELETE * FROM application_filling_form");
        $database->execute("INSERT INTO leave_certification ${columns} VALUES ${values}");

        return response()->json(['success' => true]);
    }
}
