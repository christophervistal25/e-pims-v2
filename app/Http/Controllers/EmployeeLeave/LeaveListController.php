<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use App\EmployeeLeaveApplication;
use App\EmployeeLeaveTransaction;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use App\Http\Repositories\LeaveTypeRepository;
use App\Office;
use App\OfficeCharging;
use App\Services\LeaveService;
use App\Setting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;

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
        $data = EmployeeLeaveApplication::with('employee')->get();

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
                    $btnDecline = '<button type="button" class="rounded-circle text-white btnDecline btn btn-danger btn-sm mr-1" title="Decline Request" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="fa fa-times"></i></button>';
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                } elseif ($row->status == 'declined') {
                    $btnApprove = '<button type="button" class="rounded-circle text-white btnApprove btn btn-success btn-sm mr-1" title="Approved Request" 
                    data-employee-id="'.$row->Employee_id.'"
                    data-leave-type="'.$row->leave_type_id.'" 
                    data-id="'.$row->application_id.'"
                    ><i style="pointer-events:none;" class="fa fa-thumbs-up"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                } else {
                    $btnApprove = '<button type="button" class="rounded-circle text-white btnApprove btn btn-success btn-sm mr-1" title="Approved Request" 
                    data-employee-id="'.$row->Employee_id.'"
                    data-leave-type="'.$row->leave_type_id.'" 
                    data-id="'.$row->application_id.'"
                    data-employee="'.$row->Employee->FirstName.' '.$row->Employee->LastName.'"
                    data-employee-contact="'.$row->Employee->ContactNumber.'"
                    ><i style="pointer-events:none;" class="fa fa-thumbs-up"></i></button>';
                    $btnDecline = '<button type="button" class="rounded-circle text-white btnDecline btn btn-danger btn-sm mr-1" title="Decline Request" data-id="'.$row->application_id.'" 
                    data-employee="'.$row->Employee->fullname.'"
                    data-employee-contact="'.$row->Employee->ContactNumber.'"
                    ><i style="pointer-events:none;" class="fa fa-times"></i></button>';
                    $btnUpdate = '<button type="button" class="rounded-circle text-white edit btn btn-info btn-sm btnEditRecord mr-1" onclick="editLeaveApplication('.$row->application_id.')"><i class="la la-pencil" title="Update Leave Request"></i></button>';
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }

                return  $btnApprove.''.$btnDecline.''.$btnPrint.''.$btnUpdate.''.$btnDelete;
            })
            ->make(true);
    }

    public function print($applicationID)
    {
        $application = EmployeeLeaveApplication::find($applicationID);

        $employee = Employee::exclude(['ImagePhoto'])->with(['offices'])->find($application->Employee_id);

        $leaveCredits = $this->leaveRecordRepository->getCredits($application->Employee_id);

        $dateForwarded = Carbon::parse($leaveCredits->first()->date_forwarded);

        $provincialGovernor = Setting::where('Keyname', 'SIG3_4')->first()->Keyvalue;

        $humanResourceCode = Setting::where('Keyname', 'HR_OFFICE_CODE')->first()->Keyvalue;

        $humanResourceOffice = Office::find($humanResourceCode);

        $inclusiveDates = CarbonPeriod::create($application->date_from, $application->date_to);

        $employeesWithLeaveFiles = Employee::has('leave_files')->with(['leave_files' => function ($query) use ($application) {
            $query->where('status', 'approved')->where('date_from', '<', $application->date_from);
        }])->find($application->Employee_id);

        $leaveFiles = $employeesWithLeaveFiles->leave_files->except($applicationID);

        $sickLeaveRecords = $leaveFiles->where('leave_type_id', 'SL')->sum('no_of_days');
        $vacationLeaveRecords = $leaveFiles->where('leave_type_id', 'VL')->sum('no_of_days');

        // dd($employeesWithLeaveFiles);
        $seqNo = EmployeeLeaveApplication::count();

        return view('leave.leave-application-print', [
            'employeeID' => $application->Employee_id,
            'application' => $application,
            'employee' => $employee,
            'provincialGovernor' => $provincialGovernor,
            'hrmoOffice' => $humanResourceOffice,
            'vacationCredit' => $leaveCredits->sum('vl_balance') - $vacationLeaveRecords,
            'sickCredit' => $leaveCredits->sum('sl_balance') - $sickLeaveRecords,
            'dateForwarded' => $dateForwarded,
            'inclusiveDates' => $inclusiveDates,
            'dates' => '',
            'seqNo' => $seqNo,
        ]);
    }

    // Leave List
    public function index()
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
        }])->get(['Employee_id'])->each(function ($employee) use (&$leave_files) {
            $leave_files[$employee->Employee_id] = [
                'slBalance' => $employee->leave_files->where('leave_type_id', 'SL')->sum('no_of_days'),
                'vlBalance' => $employee->leave_files->where('leave_type_id', 'VL')->sum('no_of_days'),
                'vawcBalance' => $employee->leave_files->where('leave_type_id', 'VAWC')->sum('no_of_days'),
                'adoptBalance' => $employee->leave_files->where('leave_type_id', 'AL')->sum('no_of_days'),
                'mandatoryBalance' => $employee->leave_files->where('leave_type_id', 'FL')->sum('no_of_days'),
                'maternityBalance' => $employee->leave_files->where('leave_type_id', 'ML')->sum('no_of_days'),
                'paternityBalance' => $employee->leave_files->where('leave_type_id', 'PL')->sum('no_of_days'),
                'soloparentBalance' => $employee->leave_files->where('leave_type_id', 'SOLOPARENT')->sum('no_of_days'),
                'emergencyBalance' => $employee->leave_files->where('leave_type_id', 'SEL')->sum('no_of_days'),
                'slbBalance' => $employee->leave_files->where('leave_type_id', 'SLB')->sum('no_of_days'),
                'studyBalance' => $employee->leave_files->where('leave_type_id', 'STL')->sum('no_of_days'),
                'splBalance' => $employee->leave_files->where('leave_type_id', 'SPL')->sum('no_of_days'),
                'rehabBalance' => $employee->leave_files->where('leave_type_id', 'RL')->sum('no_of_days'),
            ];
        });

        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender();

        $signatory = DB::table('Settings')->where('Keyname', 'SIG4_0')->first();
        $signatory_for_approval = $signatory->Keyvalue;

        $statuses = $this->leaveService->countAllStatus();

        $offices = OfficeCharging::get();

        return view('leave.leave-list', compact('statuses', 'offices', 'employees'));
    }

    // EDIT METHOD //
    public function edit($applicationID)
    {
        $data = EmployeeLeaveApplication::with(['employee.offices'])->find($applicationID);

        $employee = Employee::exclude(['ImagePhoto'])->with(['offices'])->find($data->Employee_id);

        $leaveCredits = $this->leaveRecordRepository->getCredits($data->Employee_id);

        $dateForwarded = Carbon::parse($leaveCredits->first()->date_forwarded);

        $provincialGovernor = Setting::where('Keyname', 'SIG3_4')->first()->Keyvalue;

        $humanResourceCode = Setting::where('Keyname', 'HR_OFFICE_CODE')->first()->Keyvalue;

        $humanResourceOffice = Office::find($humanResourceCode);

        $inclusiveDates = CarbonPeriod::create($data->date_from, $data->date_to);

        $employeesWithLeaveFiles = Employee::has('leave_files')->with(['leave_files' => function ($query) use ($data) {
            $query->where('status', 'approved')->where('date_from', '<', $data->date_from);
        }])->find($data->Employee_id);

        $leaveFiles = $employeesWithLeaveFiles->leave_files->except($applicationID);

        $sickLeaveRecords = $leaveFiles->where('leave_type_id', 'SL')->sum('no_of_days');
        $vacationLeaveRecords = $leaveFiles->where('leave_type_id', 'VL')->sum('no_of_days');

        $types = $this->leaveTypeRepository->getLeaveTypesApplicableToGender($data->application_id);

        $employee = $data->employee;
        // dd($employee);
        $signatory = DB::table('Settings')->where('Keyname', 'SIG4_0')->first();
        $signatory_for_approval = $signatory->Keyvalue;

        return view('leave.leave-application-edit', compact('data', 'types', 'employee', 'signatory_for_approval'));
    }

    /**
     * Update Method
     *
     * @id accept EmployeeLeaveApplication ID
     */
    public function update(Request $request, $id)
    {
        $application = EmployeeLeaveApplication::where('application_id', $id)->first();

        if ($request->status === 'approved') {
            DB::transaction(function () use ($application) {
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
                'transaction_type' => EmployeeLeaveApplication::class,
                'record_type' => 'DECREMENT',
                'trans_date' => Carbon::now(),
                'leave_amount' => $application->no_of_days,
            ]);

            return response()->json(['success' => true]);
        } elseif ($request->status === 'declined') {
            DB::transaction(function () use ($application) {
                // Update the leave application
                $application->date_rejected = date('Y-m-d');
                $application->date_approved = null;
                $application->status = 'declined';
                $application->save();
            });
        } elseif ($request->status == null) {
            $startDate = Carbon::parse($request->date_from);

            if ($request->leave_type_id == '') {
                $rules = ['leave_type_id' => ['required']];
            } elseif ($request->leave_type_id == 'SL') {
                $rules = [
                    'date_from' => ['required', 'before:'.Carbon::parse($request->date_applied)->format('Y-m-d')],
                    'date_to' => ['required', 'before:'.Carbon::parse($request->date_applied)->format('Y-m-d')],
                ];
            } else {
                // Validation with employee balance look-up
                $rules = [
                    'commutation' => ['required'],
                    'date_applied' => ['required'],
                    'date_from' => ['required', 'after:'.Carbon::parse($request->date_applied)->addDays(4)->format('F d, Y')],
                    'date_to' => ['required', 'after_or_equal:'.$startDate->format('Y-m-d')],
                    'no_of_days' => ['required'],
                ];
            }

            $this->validate($request, $rules, [], [
                'date_from' => 'Start Date',
                'date_to' => 'End Date',
                'inCaseOf' => 'In case of',
                'leave_type_id' => 'Leave type',
                'no_of_days' => 'No. of days',
            ]);

            $leave_dates = [];
            foreach ($request->leave_date as $date) {
                foreach ($date as $leave_date => $x) {
                    $leave_dates[$leave_date] = $x;
                }
            }
            // dd($request->all());

            DB::transaction(function () use ($application, $request, $leave_dates) {
                // Update the leave application
                $application->commutation = $request->commutation;
                $application->incase_of = $request->inCaseOf;
                $application->specify = $request->specify;
                $application->date_applied = $request->date_applied;
                $application->date_from = $request->date_from;
                $application->date_to = $request->date_to;
                $application->no_of_days = $request->no_of_days;
                $application->leave_type_id = $request->leave_type_id;
                $application->leave_date = json_encode($leave_dates);
                $application->save();
            });
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
        $leaveTransaction = EmployeeLeaveTransaction::where('transaction_id', $leaveList->application_id)->where('transaction_type', EmployeeLeaveApplication::class)->delete();
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
                    $btnDecline = '<button type="button" class="rounded-circle text-white btnDecline btn btn-danger btn-sm mr-1" title="Decline Request" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="fa fa-times"></i></button>';
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                } elseif ($row->status == 'declined') {
                    $btnApprove = '<button type="button" class="rounded-circle text-white btnApprove btn btn-success btn-sm mr-1" title="Approved Request" 
                    data-employee-id="'.$row->Employee_id.'"
                    data-leave-type="'.$row->leave_type_id.'" 
                    data-id="'.$row->application_id.'"
                    ><i style="pointer-events:none;" class="fa fa-thumbs-up"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                } else {
                    $btnApprove = '<button type="button" class="rounded-circle text-white btnApprove btn btn-success btn-sm mr-1" title="Approved Request" 
                    data-employee-id="'.$row->Employee_id.'"
                    data-leave-type="'.$row->leave_type_id.'" 
                    data-id="'.$row->application_id.'"
                    ><i style="pointer-events:none;" class="fa fa-thumbs-up"></i></button>';
                    $btnDecline = '<button type="button" class="rounded-circle text-white btnDecline btn btn-danger btn-sm mr-1" title="Decline Request" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="fa fa-times"></i></button>';
                    $btnUpdate = '<button type="button" class="rounded-circle text-white edit btn btn-info btn-sm btnEditRecord mr-1" onclick="editLeaveApplication('.$row->application_id.')"><i class="la la-pencil" title="Update Leave Request"></i></button>';
                    $btnPrint = '<button type="button" class="rounded-circle text-white edit btn btn-warning btn-sm btnPrintRecord mr-1" onclick="printLeaveApplication('.$row->application_id.')"><i class="la la-print" title="Update Leave Request"></i></button>';
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord mr-1" title="Delete" data-id="'.$row->application_id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }

                return  $btnApprove.''.$btnDecline.''.$btnPrint.''.$btnUpdate.''.$btnDelete;
            })->make(true);
    }
}
