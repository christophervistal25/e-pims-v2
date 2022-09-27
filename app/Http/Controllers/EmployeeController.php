<?php

namespace App\Http\Controllers;

use App\Services\OfficeService;
use App\Services\EmployeeService;
use App\Services\WorkStatusService;

class EmployeeController extends Controller
{
    protected readonly OfficeService $officeService;
    protected readonly EmployeeService $employeeService;
    protected readonly WorkStatusService $workStatusService;

    public function __construct()
    {
        $this->officeService     = app()->make(OfficeService::class);
        $this->employeeService   = app()->make(EmployeeService::class);
        $this->workStatusService = app()->make(WorkStatusService::class);
    }

    public function index()
    {
        return view('employee.index', [
            'offices'        => $this->officeService->officeAssignments(),
            'lastEmployeeID' => $this->employeeService->getLastId(),
            'workStatuses'   => $this->workStatusService->availableWorkStatusForFilter(),
            'username'       => auth()->user()->username,
        ]);
    }

    public function profile()
    {
        return view('PersonalData.employee-profile');
    }

}
