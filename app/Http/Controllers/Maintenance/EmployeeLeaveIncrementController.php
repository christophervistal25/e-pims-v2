<?php

namespace App\Http\Controllers\Maintenance;

use App\Employee;
use App\EmployeeLeaveTransaction;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use App\LeaveIncrement;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveIncrementController extends Controller
{
    public function __construct(public LeaveRecordRepository $leaveRecordRepository)
    {
    }

    public function index()
    {
        $employees = Employee::without(['offices', 'office_charging', 'office_assignment', 'position'])
                                ->active()->permanent()->orderBy('LastName')->orderBy('FirstName')
                                ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix']);

        $types = [
            'Sick Leave' => 'slBalance',
            'Vacation Leave' => 'vlBalance',
            '10-Day VAWC Leave' => 'vawcBalance',
            'Adoption Leave' => 'adoptBalance',
            'Mandatory Leave' => 'mandatoryBalance',
            'Maternity Leave' => 'maternityBalance',
            'Paternity Leave' => 'paternityBalance',
            'Solo Parent Leave' => 'soloparentBalance',
            'Special Emergency Leave' => 'emergencyBalance',
            'Special Benefit for Women' => 'slbBalance',
            'Study Leave' => 'studyBalance',
            'Special Privilege Leave' => 'splBalance',
            'Rehabilitation Leave' => 'rehabBalance',
        ];

        return view('maintenance.leave.increments', [
            'employees' => $employees,
            'class' => 'mini-sidebar',
            'types' => $types,
        ]);
    }

    public function show(string $employeeID)
    {
        $employee = Employee::with(['forwarded_leave_records', 'leave_increments', 'leave_increments.transaction'])->find($employeeID, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2', 'PosCode']);
        $leaveCredits = $this->leaveRecordRepository->getEmployeeLeaveCredits($employee);

        return [
            'employee' => $employee,
            'leaveCredits' => $leaveCredits,
        ];
    }

    public function validateMonth(string $month)
    {
        $month = Carbon::parse($month);
        $selectedMonth = $month->format('F-Y');

        // check if selected month already exists in leave_increments table and Employee_leave_transactions table
        $leaveIncrement = LeaveIncrement::where('month', $selectedMonth)->first();
        if ($leaveIncrement?->exists()) {
            return response()->json(['success' => false, 'message' => 'You already post an leave increment for the month of '.$month->format('F Y')], 422);
        } else {
            return response()->json(['success' => true]);
        }
    }

    public function increment(Request $request, $month)
    {
        $month = Carbon::parse($month);

        DB::transaction(function () use ($month, $request) {
            foreach ($request->employeeIDs as $employeeID) {
                $sickLeave = LeaveIncrement::create(
                    [
                        'leave_type_id' => 'SL',
                        'Employee_id' => $employeeID,
                        'month' => $month->format('F-Y'),
                    ],
                    [
                        'leave_type_id' => 'SL',
                        'Employee_id' => $employeeID,
                        'month' => $month->format('F-Y'),
                    ]
                );

                $vacationLeave = LeaveIncrement::create([
                    'leave_type_id' => 'VL',
                    'Employee_id' => $employeeID,
                    'month' => $month->format('F-Y'),
                ], [
                    'leave_type_id' => 'VL',
                    'Employee_id' => $employeeID,
                    'month' => $month->format('F-Y'),
                ]);

                EmployeeLeaveTransaction::create([
                    'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue.$employeeID,
                    'transaction_id' => $sickLeave->id,
                    'transaction_type' => LeaveIncrement::class,
                    'record_type' => 'INCREMENT',
                    'trans_date' => $month->format('Y-m-01'),
                    'leave_amount' => config('leave.SICK_LEAVE'),
                ]);

                EmployeeLeaveTransaction::create([
                    'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue.$employeeID,
                    'transaction_id' => $vacationLeave->id,
                    'transaction_type' => LeaveIncrement::class,
                    'record_type' => 'INCREMENT',
                    'trans_date' => $month->format('Y-m-01'),
                    'leave_amount' => config('leave.VACATION_LEAVE'),
                ]);
            }
        });

        return response()->json(['success' => true]);
    }
}
