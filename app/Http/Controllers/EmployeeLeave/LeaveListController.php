<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Office;
use App\Office2;
use App\Setting;
use App\Employee;
use Carbon\Carbon;
use App\OfficeCharging;
use Carbon\CarbonPeriod;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use App\Services\LeaveService;
use Yajra\Datatables\Datatables;
use App\EmployeeLeaveApplication;
use App\EmployeeLeaveTransaction;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Repositories\LeaveTypeRepository;
use App\Http\Repositories\LeaveRecordRepository;

class LeaveListController extends Controller
{

    private $leaveRecordRepository;

    public function __construct(public LeaveService $leaveService, LeaveRecordRepository $leaveRecordRepository, LeaveTypeRepository $leaveTypeRepository)
    {
        $this->leaveRecordRepository = $leaveRecordRepository;
        $this->leaveTypeRepository = $leaveTypeRepository;
    }

    // FETCH DATA IN YAJRA TABLES //
    public function list()
    {
        $data = EmployeeLeaveApplication::get();

        if ($data->count() === 0) {
            $data = $data->where('deleted_at', null);
        }

        return Datatables::of($data)
            ->addColumn('applied', function ($row) {
                return Carbon::parse($row->date_applied)->format('Y-m-d');
            })
            ->addColumn('action', function ($row) {
                $btnApprove = null;
                $btnUpdate = null;
                $btnPrint = null;
                $btnDelete = null;
                $btnDecline = null;
                // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
                if ($row->status == 'approved') {  
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }elseif ($row->status == 'declined') {  
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }else{
                    $btnApprove = '<button type="button" class="rounded-circle text-white btnApprove btn btn-success btn-sm mr-1" title="Approved Request" 
                    data-employee-id="'. $row->Employee_id. '"
                    data-leave-type="' . $row->leave_type_id . '" 
                    data-id="' . $row->application_id . '"
                    ><i style="pointer-events:none;" class="fa fa-thumbs-up"></i></button>';
                    $btnDecline = '<button type="button" class="rounded-circle text-white btnDecline btn btn-danger btn-sm mr-1" title="Decline Request" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="fa fa-times"></i></button>';
                    $btnUpdate = '<button type="button" class="rounded-circle text-white edit btn btn-info btn-sm btnEditRecord mr-1" onclick="editLeaveApplication('.$row->application_id.')"><i class="la la-pencil" title="Update Leave Request"></i></button>';
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }
                return  $btnApprove . "" . $btnDecline . "" .  $btnPrint . "" . $btnUpdate . "" . $btnDelete;
            })
            ->make(true);
    }

    public function print($applicationID)
    {
        $application = EmployeeLeaveApplication::find($applicationID);

        $employee = Employee::exclude(['ImagePhoto'])->with(['offices'])->find($application->Employee_id);

        $leaveCredits = $this->leaveRecordRepository->getCredits($application->Employee_id);

        // dd($leaveCredits);

        $dateForwarded = Carbon::parse($leaveCredits->first()->date_forwarded);

        $provincialGovernor = Setting::where('Keyname', 'SIG3_4')->first()->Keyvalue;

        $humanResourceCode = Setting::where('Keyname', 'HR_OFFICE_CODE')->first()->Keyvalue;

        $humanResourceOffice = Office::find($humanResourceCode);

        $inclusiveDates = CarbonPeriod::create($application->date_from, $application->date_to);
        
        $seqNo = EmployeeLeaveApplication::count();
        
        return view('leave.leave-application-print', [
                'employeeID' => $application->Employee_id,
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

    // Leave List
    public function index()
    {
        $statuses =  $this->leaveService->countAllStatus();

        $offices = OfficeCharging::select('OfficeCode', 'Description')->get();

        $employeeIds = $this->leaveService->getEmployeeApplied();

        $employees = Employee::without(['position', 'office_assignment', 'office_charging.desc'])
            ->where('Employee_id', '0051')
            ->get();

        return view('leave.leave-list', compact('statuses', 'offices', 'employees'));
    }


    // EDIT METHOD //
    public function edit($id)
    {
        $data = EmployeeLeaveApplication::find($id);

        // ['vacation_leave_earned' => $vacationLeave, 'vacation_leave_used' => $vacationLeaveUsed] =
        //     $this->leaveRecordRepository->getVacationLeave($data->employee_id);

        // $asOfDate = $this->leaveRecordRepository->getAsOfDate($data->employee_id);

        // ['sick_leave_earned' => $sickLeaveEarned, 'sick_leave_used' => $sickLeaveUsed] =
        //     $this->leaveRecordRepository->getSickLeave($data->employee_id);

        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender($data->application_id);

        $employee = $data->employee;

        return view('leave.leave-application-edit', compact('data', 'types', 'employee'));
    }


    /**
     * Update Method
     * @id accept EmployeeLeaveApplication ID
     */
    public function update(Request $request, $id)
    {
        $application = EmployeeLeaveApplication::where('application_id', $id)->first();

        if ($request->status === 'approved') {

            DB::transaction(function () use($application) {
                // Update the leave application
                $application->date_approved = date('Y-m-d');
                $application->date_rejected = null;
                $application->status = 'approved';
                $application->save();

                
                // Insert Records in Employees Leave
                $from = Carbon::parse($application->date_from);
                $to = Carbon::parse($application->date_to);

                $UUID = Setting::where('Keyname', 'AUTONUMBER')->first();
                
            }); 

            EmployeeLeaveTransaction::create([
                'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                'transaction_id' => $application->application_id,
                'transaction_type' => EmployeeLeaveForwardedBalance::class,
                'record_type' => 'ENTRANCE',
                'trans_date' => Carbon::now(),
                'leave_amount' => $application->no_of_days,
            ]);
            
            return response()->json(['success' => true]);

        } elseif ($request->status === 'declined') {
            DB::transaction(function () use($application) {
                // Update the leave application
                $application->date_rejected = date('Y-m-d');
                $application->date_approved = null;
                $application->status = 'declined';
                $application->save();
                
            }); 
        } else {
            $application->date_rejected = Carbon::now()->format('Y-m-d');
            $application->date_approved = null;
            $application->date_applied = null;
        }


        Session::flash('success', true);
        return response()->json(['success' => true]);
    }

    /**
     * Delete Method
     */
    public function destroy($id)
    {
        $leaveList = EmployeeLeaveApplication::find($id);
        $leaveList->delete();

        return response()->json(['success' => true]);
    }




    /**
     * Seach in leave list records.
     */
    public function search($officeCode, $status = 'ALL', $employee_id = 'ALL')
    {
        $query = EmployeeLeaveApplication::query();

        if (strtoupper($officeCode) !== 'ALL') {
            $query->whereHas('employee', function ($query) use ($officeCode) {
                $query->where('OfficeCode', $officeCode);
            });
        }

        if (strtoupper($status) !== 'ALL') {
            $query->where('employee_leave_applications.status', $status);
        }

        if (strtoupper($employee_id) !== 'ALL') {
            $query->where('Employees.Employee_id', $employee_id);
        }

        if ($query->count() === 0) {
            $query = $query->where('deleted_at', null);
        }

        return Datatables::of($query->get())
            ->addColumn('applied', function ($row) {
                return $row->date_applied;
            })
            ->addColumn('action', function ($row) {
                $btnApprove = null;
                $btnUpdate = null;
                $btnPrint = null;
                $btnDelete = null;
                $btnDecline = null;
                // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
                if ($row->status == 'approved') {  
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }elseif ($row->status == 'declined') {  
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }else{
                    $btnApprove = '<button type="button" class="rounded-circle text-white btnApprove btn btn-success btn-sm mr-1" title="Approved Request" 
                    data-employee-id="'. $row->Employee_id. '"
                    data-leave-type="' . $row->leave_type_id . '" 
                    data-id="' . $row->application_id . '"
                    ><i style="pointer-events:none;" class="fa fa-thumbs-up"></i></button>';
                    $btnDecline = '<button type="button" class="rounded-circle text-white btnDecline btn btn-danger btn-sm mr-1" title="Decline Request" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="fa fa-times"></i></button>';
                    $btnUpdate = '<button type="button" class="rounded-circle text-white edit btn btn-info btn-sm btnEditRecord mr-1" onclick="editLeaveApplication('.$row->application_id.')"><i class="la la-pencil" title="Update Leave Request"></i></button>';
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="' . $row->application_id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }
                return  $btnApprove . "" . $btnDecline . "" .  $btnPrint . "" . $btnUpdate . "" . $btnDelete;
            })->make(true);
    }
}
