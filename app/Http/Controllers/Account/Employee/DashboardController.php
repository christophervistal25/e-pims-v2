<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use App\EmployeeLeaveApplication;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\HolidayRepository;
use App\Http\Repositories\LeaveRecordRepository;
use App\Http\Repositories\LeaveApplicationRepository;


class DashboardController extends Controller
{
      public function __construct(public HolidayRepository $holidayRepository, public LeaveRecordRepository $leaveRecordRepository, public LeaveApplicationRepository $leaveApplicationRepository)
      {
      }

      public function index()
      {
            $employeeID = Auth::user()->Employee_id;

            $user = Employee::without(['office_charging', 'office_assignment', 'position'])
                  ->find($employeeID);

            $holidays = $this->holidayRepository->thisMonth();

            $leaveApplications = EmployeeLeaveApplication::where('Employee_id', $employeeID)->get();


            $onGoingLeaves = $this->leaveApplicationRepository->onGoingToday();

            $balances = $this->leaveRecordRepository->getCredits($employeeID);

            return view('accounts.employee.dashboard', [
                  'user' => $user,
                  'holidays' => $holidays,
                  'balances' => $balances,
                  'leaveApplications' => $leaveApplications,
                  'onGoingLeaves' => $onGoingLeaves,
                  'class' => 'mini-sidebar'
            ]);
      }
}
