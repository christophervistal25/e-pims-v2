<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use App\EmployeeLeaveApplication;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use App\Http\Repositories\LeaveTypeRepository;
use App\Notification;
use App\Services\LeaveService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveApplicationController extends Controller
{
    public function __construct(public LeaveTypeRepository $leaveTypeRepository, public LeaveRecordRepository $leaveRecordRepository, public LeaveService $leaveService)
    {
    }

    public function index()
    {
    }

    public function create()
    {
        $employeeID = Auth::user()->Employee_id;
        $employee = Employee::find($employeeID);

        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender();

        $employeeLeaveRecords = $this->leaveRecordRepository->getEmployeeLeaveRecords($employeeID);

        $leaveCredits = $this->leaveRecordRepository->getEmployeeLeaveCredits($employee);

        $signatory = DB::table('Settings')->where('Keyname', 'SIG4_0')->first();

        $signatory_for_approval = $signatory->Keyvalue;

        return view('accounts.employee.leave.application-filling', compact('types', 'employee', 'signatory_for_approval', 'leaveCredits'));
    }

    /* Submit Leave Application in Employee's account */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $employee = Employee::where('Employee_id', $request->employeeName)->first();

            $leave_dates = [];
            foreach ($request->leave_date as $date) {
                foreach ($date as $leave_date => $x) {
                    $leave_dates[$leave_date] = $x;
                }
            }

            // Check if employee already request a leave.
            $hasPendingLeave = $employee->leave_files->where('status', 'pending')->count();

            if ($hasPendingLeave) {
                return response()->json(['success' => false, 'message' => 'You already have a pending request please wait for the approval before filing new application.'], 423);
            }

            $employeeID = $request->employeeName;

            $lastID = DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->first();

            $convertedID = (int) $lastID->Keyvalue;

            EmployeeLeaveApplication::create([
                'application_id' => $convertedID,
                'Employee_id' => $employeeID,
                'commutation' => $request->commutation,
                'status' => 'pending',
                'incase_of' => $request->inCaseOf,
                'specify' => $request->specify,
                'date_applied' => $request->date_applied,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'no_of_days' => $request->no_of_days,
                'leave_type_id' => $request->leave_type_id,
                'leave_date' => json_encode($leave_dates),
            ]);

            $nextID = $convertedID + 1;
            DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->update(['Keyvalue' => (string) $nextID]);

            return response()->json(['success' => true], 201);
        }
    }

    public function storeByAdmin(Request $request)
    {
        if ($request->ajax()) {
            $employee = Employee::where('Employee_id', $request->employeeName)->first();

            $startDate = Carbon::parse($request->date_from);

            if ($request->leave_type_id == '') {
                $rules = ['leave_type_id' => ['required']];
            } elseif ($request->leave_type_id == 'SL') {
                $rules = [
                    'date_from' => ['required', 'before:'.Carbon::now()->format('Y-m-d')],
                    'date_to' => ['required', 'before:'.Carbon::now()->format('Y-m-d')],
                ];
            } else {
                // Validation with employee balance look-up
                $rules = [
                    'commutation' => ['required'],
                    'date_applied' => ['required'],
                    'date_from' => ['required', 'after:'.Carbon::now()->addDays(4)->format('F d, Y')],
                    'date_to' => ['required', 'after_or_equal:'.$startDate->format('Y-m-d')],
                    'no_of_days' => ['required'],
                ];
            }

            $this->validate($request, $rules, [], [
                'date_from' => 'Start Date',
                'date_to' => 'End Date',
                'inCaseOf' => 'In case of',
                'leave_type_id' => 'Leave type',
                'no_of_days' => 'No. of days',
            ]);

            $leave_dates = [];
            foreach ($request->leave_date as $date) {
                foreach ($date as $leave_date => $x) {
                    $leave_dates[$leave_date] = $x;
                }
            }

            // $response = $this->leaveRecordRepository
            //                 ->fileApplication($employee->only(['employee_id', 'sex', 'first_day_of_service']), $leaveType, $request->noOfDays);

            // if(!$response['status']) {
            //     return response()->json(['success' => false, 'message' => $response['message']], 424);
            // }

            // Check if employee already request a leave.
            $hasPendingLeave = $employee->leave_files->where('status', 'pending')->count();

            if ($hasPendingLeave) {
                return response()->json(['success' => false, 'message' => 'You already have a pending request please wait for the approval before filing new application.'], 423);
            }

            $employeeID = $request->employeeName;

            $lastID = DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->first();

            $convertedID = (int) $lastID->Keyvalue;

            EmployeeLeaveApplication::create([
                'application_id' => $convertedID,
                'Employee_id' => $employeeID,
                'commutation' => $request->commutation,
                'status' => 'pending',
                'incase_of' => $request->inCaseOf,
                'specify' => $request->specify,
                'date_applied' => $request->date_applied,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'no_of_days' => $request->no_of_days,
                'leave_type_id' => $request->leave_type_id,
                'leave_date' => json_encode($leave_dates),
            ]);

            $nextID = $convertedID + 1;
            DB::table('Settings')->where('Keyname', 'AUTONUMBER2')->update(['Keyvalue' => (string) $nextID]);

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
}
