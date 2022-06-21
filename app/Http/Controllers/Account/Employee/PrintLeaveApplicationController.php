<?php

namespace App\Http\Controllers\Account\Employee;

use App\Office;
use App\Setting;
use App\Employee;
use Illuminate\Http\Request;
use App\EmployeeLeaveApplication;
use App\EmployeeLeaveForwardedBalance;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class PrintLeaveApplicationController extends Controller
{
      public function __construct(public LeaveRecordRepository $leaveRecordRepository)
      {
            $this->middleware('auth');
      }

      public function print(int $applicationID)
      {
            $employeeID = Auth::user()->Employee_id;

            $application = EmployeeLeaveApplication::find($applicationID);
            
            if($employeeID != $application->Employee_id) {
                  abort(404);
            }

            $employee = Employee::exclude(['ImagePhoto'])->with(['offices'])->find($employeeID);

            $leaveCredits = $this->leaveRecordRepository->getCredits($employeeID);

            $dateForwarded = Carbon::parse($leaveCredits->first()->date_forwarded);

            $provincialGovernor = Setting::where('Keyname', 'SIG3_4')->first()->Keyvalue;

            $humanResourceCode = Setting::where('Keyname', 'HR_OFFICE_CODE')->first()->Keyvalue;

            $humanResourceOffice = Office::find($humanResourceCode);

            $inclusiveDates = CarbonPeriod::create($application->date_from, $application->date_to);
            
            $seqNo = EmployeeLeaveApplication::count();
            
            return view('accounts.employee.leave.leave-application-print', [
                  'employeeID' => $employeeID,
                  'application' => $application,
                  'employee' => $employee,
                  'provincialGovernor' => $provincialGovernor,
                  'hrmoOffice' => $humanResourceOffice,
                  'vacationCredit' => $leaveCredits->sum('vl_earned') - $leaveCredits->sum('vl_used'),
                  'sickCredit' => $leaveCredits->sum('sl_earned') - $leaveCredits->sum('sl_used'),
                  'dateForwarded' => $dateForwarded,
                  'inclusiveDates' => $inclusiveDates,
                  'dates' => '',
                  'seqNo' => $seqNo,
            ]);
      }
}
