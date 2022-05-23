<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Office;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveTypeRepository;
use App\Http\Repositories\LeaveRecordRepository;

class LeaveController extends Controller
{
    public function __construct(LeaveTypeRepository $leaveTypeRepository, LeaveRecordRepository $leaveRecordRepository)
    {
        $this->leaveTypeRepository = $leaveTypeRepository;
        $this->leaveRecordRepository = $leaveRecordRepository;
    }
    
    public function show()
    {
        $employees = Employee::orderBy('LastName')
                        ->permanent()
                        ->active()
                        ->get();
        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender();

        return view('leave.leave-application', compact('types','employees'));
    }

}