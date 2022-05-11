<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Office;
use App\Employee;
use Carbon\Carbon;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use App\Services\LeaveService;
use Yajra\Datatables\Datatables;
use App\EmployeeLeaveApplication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Repositories\LeaveTypeRepository;
use App\Http\Repositories\LeaveRecordRepository;
use App\Services\EmployeeService;

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
        $data = DB::connection('E_PIMS_CONNECTION')->table('employee_leave_applications')
                                            ->join('DTRPayroll.dbo.Employees', 'DTRPayroll.dbo.Employees.Employee_id', '=', 'employee_leave_applications.employee_id')
                                            ->join('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
                                            ->select('Employees.Employee_id', 'Employees.FirstName', 'Employees.MiddleName', 'Employees.LastName', 'Employees.Suffix', 'Employees.OfficeCode', 'employee_leave_applications.*', 'leave_types.id as leave_type_id' ,'leave_types.name as leave_type_name')
                                            ->get();

        if($data->count() === 0) {
            $data = $data->where('deleted_at', null);
        }

        return Datatables::of($data)
                    ->addColumn('applied', function ($row) {
                        return $row->date_applied;
                    })
                    ->addColumn('from', function ($row) {
                        return $row->date_from;
                    })
                    ->addColumn('to', function ($row) {
                        return $row->date_to;
                    })
                    ->addColumn('action', function($row)
                    {
                        $btnUpdate = null;
                        $btnDelete = null;
                        // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
                        if($row->approved_status !== 'approved') {
                            $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil' title='Update Leave Request'></i></a>";
                            $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';
                        }
                        return $btnUpdate . "&nbsp" . $btnDelete;
                    })
                    ->make(true);
    }
 

    // Leave List
    public function index()
    {
        $statuses =  $this->leaveService->countAllStatus();
        
        $offices = Office::select('OfficeCode', 'Description')->get();
        
        $employeeIds = $this->leaveService->getEmployeeApplied();

        $employees = Employee::without(['position', 'office_charging', 'office_assignemnt', 'office_charging.desc'])
                                ->whereIn('Employee_id', $employeeIds)
                                ->get();

        return view('leave.leave-list', compact('statuses', 'offices', 'employees'));
    }


    // EDIT METHOD //
    public function edit($id)
    {
        $data = EmployeeLeaveApplication::find($id);

        ['vacation_leave_earned' => $vacationLeave, 'vacation_leave_used' => $vacationLeaveUsed] = 
                    $this->leaveRecordRepository->getVacationLeave($data->employee_id);

        $asOfDate = $this->leaveRecordRepository->getAsOfDate($data->employee_id);

        ['sick_leave_earned' => $sickLeaveEarned, 'sick_leave_used' => $sickLeaveUsed] = 
                                    $this->leaveRecordRepository->getSickLeave($data->employee_id);

        $gender = $this->leaveTypeRepository->getLeaveTypesApplicableToGender($data->id);

        $types = $data->employee;
            
        return view('leave.add-ons.edit', compact('data', 'types', 'asOfDate', 'gender', 'vacationLeave', 'vacationLeaveUsed', 'sickLeaveEarned', 'sickLeaveUsed'));
        
    }

    
    /**
     * Update Method
     * @id accept EmployeeLeaveApplication ID
     */
    public function update(Request $request, $id)
    {
        $leaveList = EmployeeLeaveApplication::with('leave_records')->find($id);
        $leaveList->date_applied          = $request['dateApply'];
        $leaveList->leave_type_id         = $request['selectedLeave'];
        $leaveList->incase_of             = $request['inCaseOfLeave'];
        $leaveList->no_of_days            = $request['numberOfDays'];
        $leaveList->date_from             = $request['startDate'];
        $leaveList->date_to               = $request['endDate'];
        $leaveList->commutation           = $request['commutation'];
        $leaveList->recommending_approval = $request['recommendingApproval'];
        $leaveList->approved_by           = $request['approvedBy'];
        $leaveList->approved_status       = $request['status'];

        if($request->status === 'approved') {
            $leaveList->date_approved = Carbon::now()->format('Y-m-d');
            $leaveList->date_rejected = null;
            $leaveList->approved_for = $request['approvedFor'];
            $leaveList->disapproved_due_to = null;


            EmployeeLeaveRecord::updateOrCreate(
                [
                    'date_record' => $request['startDate'],
                    'employee_id' => $leaveList->employee_id,
                    'leave_application_id' => $id,
                ],
                [
                'employee_id'          => $leaveList->employee_id,
                'particular'           => ($leaveList->type->code) . '(' . $request->numberOfDays . '-0' . '-0' . ')',
                'leave_type_id'        => $request->selectedLeave,
                'earned'               => 0.000,
                'used'                 => $request->numberOfDays,
                'leave_application_id' => $id,
                'date_record'          => $request['startDate'],
                'record_type'          => 'D',
            ]);
            
        } elseif($request->status === 'declined'){
            $leaveList->date_rejected = Carbon::now()->format('Y-m-d');
            $leaveList->approved_for = null;
            $leaveList->date_approved = null;
            $leaveList->disapproved_due_to = $request['reason'];



            $leaveList->leave_records()->delete();
            // $leaveList->leave_records->delete();
        } else {
            $leaveList->date_rejected = Carbon::now()->format('Y-m-d');
            $leaveList->date_approved = null;
            $leaveList->disapproved_due_to = $request['reason'];
            $leaveList->approved_for = null;
            $leaveList->date_applied = null;

        }
        
        $leaveList->save();

        
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
    public function search($officeCode, $pendingStatus = 'all', $employee_id = 'all')
    {
        $query = DB::connection('E_PIMS_CONNECTION')->table('employee_leave_applications')
                        ->join('DTRPayroll.dbo.Employees', 'DTRPayroll.dbo.Employees.Employee_id', '=', 'employee_leave_applications.employee_id')
                        ->join('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
                        ->select('Employees.Employee_id', 'Employees.FirstName', 'Employees.MiddleName', 'Employees.LastName', 'Employees.Suffix', 'Employees.OfficeCode', 'employee_leave_applications.*', 'leave_types.id as leave_type_id' ,'leave_types.name as leave_type_name');
        
        if(strtoupper($officeCode) !== 'ALL') {
            $query->where('Employees.OfficeCode', $officeCode);
        }

        if(strtoupper($pendingStatus) !== 'ALL') {
            $query->where('employee_leave_applications.approved_status', $pendingStatus);
        }

        if(strtoupper($employee_id) !== 'ALL') {
            $query->where('Employees.Employee_id', $employee_id);
        }

        return Datatables::of($query->get())
            ->addColumn('applied', function ($row) {
                return $row->date_applied;
            })
            ->addColumn('from', function ($row) {
                return $row->date_from;
            })
            ->addColumn('to', function ($row) {
                return $row->date_to;
            })
            ->addColumn('action', function($row)
            {
                $btnUpdate = null;
                $btnDelete = null;
                // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
                if($row->approved_status !== 'approved') {
                    $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil' title='Update Leave Request'></i></a>";
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';
                }
                return $btnUpdate . "&nbsp" . $btnDelete;
            })->make(true);
    
    }
}
