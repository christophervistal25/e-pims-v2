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

        $leave_files = [];

        $employeesWithLeaveFiles = Employee::has('leave_files')->with(['leave_files' => function ($query) {
            $query->where('status', 'approved');
        }])->get(['Employee_id'])->each(function ($employee) use(&$leave_files) {
            $leave_files[$employee->Employee_id] = [
                'slBalance'         => $employee->leave_files->where('leave_type_id', 'SL')->sum('no_of_days'),
                'vlBalance'         => $employee->leave_files->where('leave_type_id', 'VL')->sum('no_of_days'),
                'vawcBalance'       => $employee->leave_files->where('leave_type_id', 'VAWC')->sum('no_of_days'),
                'adoptBalance'      => $employee->leave_files->where('leave_type_id', 'AL')->sum('no_of_days'),
                'mandatoryBalance'  => $employee->leave_files->where('leave_type_id', 'FL')->sum('no_of_days'),
                'maternityBalance'  => $employee->leave_files->where('leave_type_id', 'ML')->sum('no_of_days'),
                'paternityBalance'  => $employee->leave_files->where('leave_type_id', 'PL')->sum('no_of_days'),
                'soloparentBalance' => $employee->leave_files->where('leave_type_id', 'SOLOPARENT')->sum('no_of_days'),
                'emergencyBalance'  => $employee->leave_files->where('leave_type_id', 'SEL')->sum('no_of_days'),
                'slbBalance'        => $employee->leave_files->where('leave_type_id', 'SLB')->sum('no_of_days'),
                'studyBalance'      => $employee->leave_files->where('leave_type_id', 'STL')->sum('no_of_days'),
                'splBalance'        => $employee->leave_files->where('leave_type_id', 'SPL')->sum('no_of_days'),
                'rehabBalance'      => $employee->leave_files->where('leave_type_id', 'RL')->sum('no_of_days'),
            ];
        });


        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender();

        $signatory = DB::table('Settings')->where('Keyname', 'SIG4_0')->first();
        $signatory_for_approval = $signatory->Keyvalue;
        
        return view('leave.leave-application', compact('types', 'employees', 'signatory_for_approval', 'leave_files'));
    }
}