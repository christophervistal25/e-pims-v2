<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
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
        $employeeID = Auth::user()->employee_id;
        
        $user = Employee::without(['office_charging', 'office_assignment', 'office_charging.desc', 'position'])
                        ->find($employeeID);

        $holidays = $this->holidayRepository->upcoming();
        $vacationLeave = $this->leaveRecordRepository->getVacationLeave($user->Employee_id);
        $sickLeave     = $this->leaveRecordRepository->getSickLeave($user->Employee_id);

        $leaveApplications = $this->leaveApplicationRepository->applicationFiles(Auth::user());
                                    // ->where('approved_status', '!=', 'approved');


        $onGoingToday         = $this->leaveApplicationRepository->onGoingToday();
        $onGoingTomorrow      = $this->leaveApplicationRepository->onGoingForTomorrow();
        $onGoingNextSevenDays = $this->leaveApplicationRepository->onGoingForNextSevenDays();

        return view('accounts.employee.dashboard', [
            'user' => $user,
            'holidays' => $holidays,
            'vacationLeave' => $vacationLeave,
            'sickLeave' => $sickLeave,
            'leaveApplications' => $leaveApplications,
            'onGoingToday' => $onGoingToday,
            'onGoingTomorrow' => $onGoingTomorrow,
            'onGoingNextSevenDays' => $onGoingNextSevenDays,
            'class' => 'mini-sidebar'
        ]);
    }
}
