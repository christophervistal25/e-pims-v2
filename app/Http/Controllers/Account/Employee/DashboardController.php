<?php

namespace App\Http\Controllers\Account\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\HolidayRepository;
use App\Http\Repositories\LeaveRecordRepository;
use App\Http\Repositories\LeaveApplicationRepository;


class DashboardController extends Controller
{
    public function __construct(HolidayRepository $holidayRepository, LeaveRecordRepository $leaveRecordRepository, LeaveApplicationRepository $leaveApplicationRepository)
    {
        $this->holidayRepository = $holidayRepository;
        $this->leaveRecordRepository = $leaveRecordRepository;
        $this->leaveApplicationRepository = $leaveApplicationRepository;
    }

    public function __invoke()
    {
        $user = Auth::user();

        $holidays = $this->holidayRepository->upcoming();

        $employee = $user->employee;

        $vacationLeave = $this->leaveRecordRepository->getVacationLeave($employee->employee_id);
        $sickLeave     = $this->leaveRecordRepository->getSickLeave($employee->employee_id);

        $leaveApplications = $this->leaveApplicationRepository->applicationFiles($user);

        $onGoingToday         = $this->leaveApplicationRepository->onGoingToday();
        $onGoingTomorrow      = $this->leaveApplicationRepository->onGoingForTomorrow();
        $onGoingNextSevenDays = $this->leaveApplicationRepository->onGoingForNextSevenDays();

        return view('accounts.employee.dashboard', compact('user', 'holidays', 'vacationLeave', 'sickLeave', 'leaveApplications', 'onGoingToday', 'onGoingTomorrow', 'onGoingNextSevenDays', 'employee'));
    }
}
