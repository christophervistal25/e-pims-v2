<?php

namespace App\Http\Controllers\Account\Employee;

use Carbon\Carbon;
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
        $vacationLeave = $this->leaveRecordRepository->getVacationLeave($employee->Employee_id);
        $sickLeave     = $this->leaveRecordRepository->getSickLeave($employee->Employee_id);

        $leaveApplications = $this->leaveApplicationRepository->applicationFiles($user);
                                    // ->where('approved_status', '!=', 'approved');


        $onGoingToday         = $this->leaveApplicationRepository->onGoingToday();
        $onGoingTomorrow      = $this->leaveApplicationRepository->onGoingForTomorrow();
        $onGoingNextSevenDays = $this->leaveApplicationRepository->onGoingForNextSevenDays();

        return view('accounts.employee.dashboard', compact('user', 'holidays', 'vacationLeave', 'sickLeave', 'leaveApplications', 'onGoingToday', 'onGoingTomorrow', 'onGoingNextSevenDays', 'employee'));
    }
}
