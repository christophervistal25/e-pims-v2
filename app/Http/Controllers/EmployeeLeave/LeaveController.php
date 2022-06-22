<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Office;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\EmployeeLeaveForwardedBalance;
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
        $employees = Employee::orderBy('LastName', 'ASC')
                        ->active()
                        ->permanent()
                        ->with(['forwarded_leave_records', 'offices'])
                        ->without(['office_assignment', 'office_charging.desc'])
                        ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Work_Status', 'PosCode', 'OfficeCode']);
                        
        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender();
        $signatory = DB::table('Settings')->where('Keyname', 'SIG4_0')->first();
        $signatory_for_approval = $signatory->Keyvalue;
        
        return view('leave.leave-application', compact('types', 'employees', 'signatory_for_approval'));
    }
}