<?php

namespace App\Http\Controllers;

use App\Employee;
use App\StepIncrement;
use App\PlantillaSchedule;
use App\Services\EmployeeService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use App\Services\EmployeeBirthdayService;
use App\Http\Repositories\BirthdayRepository;

class DashboardController extends Controller
{
    public function __construct(public EmployeeBirthdayService $employeeBirthdayService, public EmployeeService $employeeService)
    {
    }

    public function index()
    {
        $noOfJobOrder         = $this->employeeService->getJobOrdersCount();
        $noOfRegular          = $this->employeeService->getRegularsCount();
        $noOfInActiveEmployee = $this->employeeService->getInActiveEmployees();
        $overAllEmployees = $noOfJobOrder + $noOfRegular + $noOfInActiveEmployee;

        $today                  = $this->employeeBirthdayService->today();
        $tomorrow               = $this->employeeBirthdayService->tomorrow();
        $oneWeekBeforeBirthdays = $this->employeeBirthdayService->weekBefore();

        $noOfPromotedPreviousYear = $this->employeeService->getNoOfPromotedEmployees(date('Y') - 1);
        $noOfPromotedThisYear     = $this->employeeService->getNoOfPromotedEmployees(date('Y'));

        $employeesWithEligibility   = $this->employeeService->getNoOfEmployeesWithEligibility();
        $employeesWithNewPlantillas = $this->employeeService->getNoOfEmployeesWithNewPlantilla();

        $on_going_leave = 0;

        $promotionInSixMonths = Employee::where('Employee_id', '2227')
            ->permanent()
            ->get(['Employee_id', 'first_day_of_service', 'last_step_increment'])->each(function ($employee) {
                $lastStepIncrementPlusThreeYears = $employee->last_step_increment->addYears(3);
                $sixMonthRange = $lastStepIncrementPlusThreeYears->copy();
                $employee->in_range_of_six_months = $employee->last_step_increment->between($sixMonthRange->subMonths(6), $lastStepIncrementPlusThreeYears) ? true : false;
            });


        // $on_going_leave = Employee::whereHas('leave_files', function ($query) {
        //     $query->where('approved_status', 'on-going');
        // })->count();



        return view('blank-page', [
            'today'                  => $today,
            'tomorrow'               => $tomorrow,
            'oneWeekBeforeBirthdays' => $oneWeekBeforeBirthdays,
            'no_of_regular'          => $noOfRegular,
            'no_of_jobOrder'         => $noOfJobOrder,
            'allEmployees'           => $overAllEmployees,
            'no_of_promoted'         => $noOfPromotedThisYear,
            'no_of_promoted_prev'    => $noOfPromotedPreviousYear,
            'no_of_active'           => $overAllEmployees,
            'no_of_inactive'         => $noOfInActiveEmployee,
            'on_going_leave'         => $on_going_leave,
            'plantillas'             => $employeesWithNewPlantillas,
            'eligible'               => $employeesWithEligibility,
        ]);
    }


    public function notif()
    {
        $data = StepIncrement::get();


        dd($data);
    }
}
