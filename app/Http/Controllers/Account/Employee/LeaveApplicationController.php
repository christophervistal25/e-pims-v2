<?php

namespace App\Http\Controllers\Account\Employee;

use App\Office;
use App\Holiday;
use App\LeaveType;
use Carbon\Carbon;
use App\Notification;
use App\Services\MSAccess;
use Illuminate\Http\Request;
use App\EmployeeLeaveApplication;
use Illuminate\Support\Facades\DB;
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

        $approvedBy = $employee?->office_charging?->desc;
        
        $office = Office::with('desc')->where('OfficeCode', Office::HR_OFFICE_CODE)
                                    ->first();
        
        $hrOffice = $office->desc;

        [
            'vacation_leave_earned' => $vacationLeaveEarned,
            'vacation_leave_used'   => $vacationLeaveUsed
        ] = $this->leaveRecordRepository->getVacationLeave($employee->Employee_id);
        [
            'sick_leave_earned' => $sickLeaveEarned,
            'sick_leave_used'   => $sickLeaveUsed
        ] = $this->leaveRecordRepository->getSickLeave($employee->Employee_id);
        
        $forwardBalanceAsOfDate = $this->leaveRecordRepository->getAsOfDate($employee->Employee_id);
        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender();

        return view('accounts.employee.leave.application-filling', compact('types', 'vacationLeaveEarned', 'vacationLeaveUsed', 'sickLeaveEarned', 'sickLeaveUsed', 'forwardBalanceAsOfDate', 'approvedBy', 'hrOffice'));
    }

    public function storeByAdmin(Request $request)
    {   
        if($request->ajax()) {
            $startDate = Carbon::parse($request->date_from);

            if($request->leave_type_id == 'SL') {
                $rules['date_from'][] = 'before_or_equal:' . Carbon::parse($request->date_to)->format('Y-m-d');
            }else{
                 // Validation with employee balance look-up
                $rules = [
                    'commutation'          => ['required'],
                    'date_applied'         => ['required'],
                    'date_from'            => ['required', 'after:' . Carbon::now()->addDays(4)->format('F d, Y')],
                    'date_to'              => ['required', 'after_or_equal:' . $startDate->format('Y-m-d')],
                    'inCaseOf'             => ['required'],
                    'no_of_days'           => ['required'],
                    'leave_type_id'        => ['required'],
                ];
            }

            $this->validate($request, $rules , [], [
                    'date_from'     => 'Start Date',
                    'date_to'       => 'End Date',
                    'inCaseOf'      => 'In case of',
                    'leave_type_id' => 'Leave type',
                    'no_of_days'      => 'No. of days',
            ]);

            // $response = $this->leaveRecordRepository
            //                 ->fileApplication($employee->only(['employee_id', 'sex', 'first_day_of_service']), $leaveType, $request->noOfDays);

            // if(!$response['status']) {
            //     return response()->json(['success' => false, 'message' => $response['message']], 424);
            // }

            // $holidays = Holiday::get()->pluck('date')->toArray();

            // $noOfWorkingDays = Carbon::parse($request->startDate)->diffInDaysFiltered(function (Carbon $date) use ($holidays) {
            //     return strtolower($date->format('l')) !== 'saturday' && strtolower($date->format('l')) !== 'sunday' || in_array($date->format('Y-m-d'), $holidays);
            // }, Carbon::parse($request->endDate)->addDay(1));
            $employeeID = $request->employeeName;

            $lastID = DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->first();

            $convertedID = (int)$lastID->Keyvalue;
            
            EmployeeLeaveApplication::create([
                'application_id'        => $convertedID,
                'Employee_id'           => $employeeID,
                'commutation'           => $request->commutation,
                'status'                => 'pending',
                'incase_of'             => $request->inCaseOf,
                'specify'               => $request->specify,
                'date_applied'          => $request->date_applied,
                'date_from'             => $request->date_from,
                'date_to'               => $request->date_to,
                'no_of_days'            => $request->no_of_days,
                'leave_type_id'         => $request->leave_type_id,
            ]);

            $nextID = $convertedID + 1;
            DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->update([ 'Keyvalue' => (string)$nextID ]);

            // Notification::create([
            //     'title'            => 'Leave Application Filling',
            //     'description'      => 'Your leave application is now under review please wait',
            //     'employee_id'      => $employee->employee_id,
            //     'from_employee_id' => '',
            //     'link'             => '/notifications/{id}/show',
            // ]);

            return response()->json(['success' => true], 201);
        }
        
        return response()->json(['success' => false], 404);
    }

    public function store(Request $request)
    {
        
        if($request->ajax()) {
            
            // $employee = Auth::user()->Employee_id;

            $employeeID = $request->employeeName;

            // Check if employee already request a leave.
            // $hasPendingLeave = $employee->leave_files->where('approved_status', 'pending')->count();

            // if($hasPendingLeave) {
            //     return response()->json(['success' => false, 'message' => 'You already have a pending request please wait for the approval before filing new application.'], 423);
            // }
            
            $startDate = Carbon::parse($request->startDate);

            if($request->leave_type_id != 'SL') {
                $rules['startDate'][] = 'before_or_equal:' . Carbon::parse($request->endDate)->format('Y-m-d');
            }

            // Validation with employee balance look-up
            $rules = [
                'approvedBy'           => ['required'],
                'recommendingApproval' => ['required'],
                'commutation'          => ['required'],
                'date_applied'         => ['required'],
                'startDate'            => ['required', 'after:' . Carbon::now()->addDays(4)->format('F d, Y')],
                'endDate'              => ['required', 'after_or_equal:' . $startDate->format('Y-m-d')],
                'inCaseOf'             => ['required'],
                'noOfDays'             => ['required'],
                'leave_type_id'        => ['required'],
            ];
            

            $this->validate($request, $rules , [], [
                    'startDate'     => 'Start Date',
                    'endDate'       => 'End Date',
                    'inCaseOf'      => 'In case of',
                    'leave_type_id' => 'Leave type',
                    'noOfDays'      => 'No. of days',
            ]);

            $leaveType = LeaveType::where('code_number', $request->leave_type_id)->first();

            // $response = $this->leaveRecordRepository
            //                 ->fileApplication($employee->only(['employee_id', 'sex', 'first_day_of_service']), $leaveType, $request->noOfDays);

            // if(!$response['status']) {
            //     return response()->json(['success' => false, 'message' => $response['message']], 424);
            // }

            $holidays = Holiday::get()->pluck('date')->toArray();

            $noOfWorkingDays = Carbon::parse($request->startDate)->diffInDaysFiltered(function (Carbon $date) use ($holidays) {
                return strtolower($date->format('l')) !== 'saturday' && strtolower($date->format('l')) !== 'sunday' || in_array($date->format('Y-m-d'), $holidays);
            }, Carbon::parse($request->endDate)->addDay(1));

            EmployeeLeaveApplication::create([
                'employee_id'           => $employee,
                'approved_by'           => $request->approvedBy,
                'recommending_approval' => $request->recommendingApproval,
                'commutation'           => $request->commutation,
                'date_applied'          => $request->date_applied,
                'date_from'             => $request->startDate,
                'date_to'               => $request->endDate,
                'incase_of'             => $request->inCaseOf,
                'no_of_days'            => $request->noOfDays,
                'leave_type_id'         => $leaveType->id,
                'no_of_working_days'    => $noOfWorkingDays,
            ]);

            // Notification::create([
            //     'title'            => 'Leave Application Filling',
            //     'description'      => 'Your leave application is now under review please wait',
            //     'employee_id'      => $employee->employee_id,
            //     'from_employee_id' => '',
            //     'link'             => '/notifications/{id}/show',
            // ]);

            return response()->json(['success' => true], 201);
        }
        return response()->json(['success' => false], 404);
    }

    public function print(int $applicationID)
    {
        $application = EmployeeLeaveApplication::find($applicationID);
        $employee = Auth::user()->employee;

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
        $underTime         = 0;

        
        $vacationEarn     = $vacationLeave['vacation_leave_earned'];
        $vacationLess     = $vacationLeave['vacation_leave_used'];
        $sickEarn         = $sickLeave['sick_leave_earned'];
        $sickLess         = $sickLeave['sick_leave_used'];
        $earnTotal        = $vacationLeave['vacation_leave_earned'] + $sickLeave['sick_leave_earned'];
        $lessTotal        = $vacationLeave['vacation_leave_used'] + $sickLeave['sick_leave_used'];
        $vacationTotal    = $vacationEarn - $vacationLess;
        $sickTotal        = $sickEarn - $sickLess;
        $recommendation   = $application->recommending_approval;
        $approvedFor      = $application->approved_for;
        $disApprovedDueTo = $application->disapproved_due_to;
        $status           = $application->approved_status;

        $data = [
            'office'          => $office ?? ' ',
            'fullname'        => $fullName ?? ' ',
            'date_of_fill' => $dateOfFill ?? ' ',
            'position'        => $position ?? ' ',
            'salary'          => $salary ?? ' ',
            'type_of_leave'   => $application->type->name ?? ' ',
            'inclusive_dates' => ' ',
            'commutation' => $commutation ?? ' ',
            'tardiness' => $tardiness ?? 0,
            'under_time' => $underTime ?? 0,
            'vacation_earn' => $vacationEarn ?? 0,
            'vacation_less' => $vacationLess ?? 0,
            'sick_earn' => $sickEarn ?? 0,
            'sick_less' => $sickLess ?? 0,
            'earn_total' => $earnTotal ?? 0,
            'less_total' => $lessTotal ?? 0,
            'sick_total' => $sickTotal ?? 0,
            'vacation_total' => $vacationTotal ?? ' ',
            'over_all_total' => $sickEarn + $vacationEarn,
            'reccomendation' => $recommendation ?? ' ',
            'approved_for' => $approvedFor ?? ' ',
            'disapproved_due_to' => $disApprovedDueTo ?? ' ',
            'status' => $status,
        ];
        


        if($application->type->code_number === 10001) {
            $data['in_case_of_sick_leave'] = $incaseOf;
            $data['in_case_of_vacation_leave'] = ''; 
        } else {
            $data['in_case_of_sick_leave'] = '';
            $data['in_case_of_vacation_leave'] = $incaseOf; 
        }


        
        $columns =   implode(",", array_keys($data));

        $values =  "('" . implode("','", array_values($data)) . "')";


        $database->execute("DELETE * FROM application_filling_form");
        $database->execute("INSERT INTO application_filling_form(${columns}) VALUES ${values}");

        return response()->json(['success' => true]);
    }
}
