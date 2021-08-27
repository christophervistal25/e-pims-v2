<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Office;
use App\Employee;
use Carbon\Carbon;
use App\EmployeeLeaveRecord;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\EmployeeLeaveApplication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Repositories\LeaveTypeRepository;
use App\Http\Repositories\LeaveRecordRepository;


class LeaveListController extends Controller
{

    private $leaveRecordRepository;
    
    public function __construct(LeaveRecordRepository $leaveRecordRepository, LeaveTypeRepository $leaveTypeRepository)
    {
        $this->leaveRecordRepository = $leaveRecordRepository;
        $this->leaveTypeRepository = $leaveTypeRepository;
    }

    // FETCH DATA IN YAJRA TABLES //
    public function list()
    {
        $data = DB::table('employee_leave_applications')
        ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
        ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
        ->leftJoin('employee_informations', 'employee_informations.EmpIDNo', '=', 'employee_leave_applications.employee_id')
        ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')

        ->where('employee_leave_applications.deleted_at', null)
        ->get();

        if($data->count() === 0){
            $data = $data->where('deleted_at', null);
        }


        return Datatables::of($data)
        ->addColumn('action', function($row)
        {
            // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
            $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil' title='Update Leave Request'></i></a>";


            // DELETE FUNCTION IN YAJRA TABLE //
            $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';


            return $btnUpdate . "&nbsp" . $btnDelete;
        })->make(true);
    }
 

    // Leave List
    public function index()
    {
        $all = EmployeeLeaveApplication::recordByStatus('all');
        $pending = EmployeeLeaveApplication::recordByStatus('pending');
        $approved = EmployeeLeaveApplication::recordByStatus('approved');
        $reject = EmployeeLeaveApplication::recordByStatus('declined');
        $ongoing = EmployeeLeaveApplication::recordByStatus('on-going');
        $enjoy = EmployeeLeaveApplication::recordByStatus('enjoyed  ');
        $offices = Office::select('office_code', 'office_name')->get();
        $employees = Employee::has('leave_files')->select('employee_id', 'firstname', 'middlename', 'lastname')->get();


        // leave.leave-list is the name of the file
        return view('leave.leave-list', compact('all', 'pending', 'approved', 'reject', 'ongoing', 'enjoy', 'offices', 'employees'));
    }


    // EDIT METHOD //
    public function edit($id)
    {
        $data = EmployeeLeaveApplication::with(['employee:employee_id,lastname,middlename,firstname,extension', 'type'])->find($id);
        
        ['vacation_leave_earned' => $vacationLeave, 'vacation_leave_used' => $vacationLeaveUsed] = $this->leaveRecordRepository->getVacationLeave($data->employee_id);

        $asOfDate = $this->leaveRecordRepository->getAsOfDate($data->employee_id);

        ['sick_leave_earned' => $sickLeaveEarned, 'sick_leave_used' => $sickLeaveUsed] = $this->leaveRecordRepository->getSickLeave($data->employee_id);

        $gender = $this->leaveTypeRepository->getLeaveTypesApplicableToGender($data->id);

        $types = $data->employee;
            
        return view('leave.add-ons.edit', compact('data', 'types', 'asOfDate', 'gender', 'vacationLeave', 'vacationLeaveUsed', 'sickLeaveEarned', 'sickLeaveUsed'));
        
    }

    
    // UPDATE METHOD //
    /**
     * Update Method
     * @id accept EmployeeLeaveApplication ID
     */
    public function update(Request $request, $id)
    {
        $leaveList                        = EmployeeLeaveApplication::find($id);
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
        } else {
            $leaveList->date_rejected = Carbon::now()->format('Y-m-d');
            $leaveList->date_approved = null;
            $leaveList->disapproved_due_to = $request['reason'];
            $leaveList->approved_for = null;
        }
        
        $leaveList->save();


        EmployeeLeaveRecord::create([
            'employee_id'          => $leaveList->employee_id,
            'particular'           => ($leaveList->type->code) . '(' . $request->numberOfDays . '-0' . '-0' . ')',
            'leave_type_id'        => $request->selectedLeave,
            'earned'               => 0.000,
            'used'                 => $request->numberOfDays,
            'leave_application_id' => $id,
        ]);

        
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
        $data = [];
        $where = [];
    
        if(strtoupper($officeCode) != 'ALL') {
            $where['employee_informations.office_code']  = $officeCode;
        }
    
        if(strtoupper($pendingStatus) != 'ALL') {
            $where['employee_leave_applications.approved_status']  = $pendingStatus;
        }
    
        if(strtoupper($employee_id) != 'ALL') {
            $where['employees.employee_id'] = $employee_id;
        }

        // OFFICE CODE, STATUS, EMPLOYEE ID


    
        $data = DB::table('employee_leave_applications')
            ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
            ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
            ->leftJoin('employee_informations', 'employee_informations.EmpIDNo', '=', 'employee_leave_applications.employee_id')
            ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')
            ->where($where)
            ->get();
    
    
        return Datatables::of($data)
            ->addColumn('action', function($row)
            {
                // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
                $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-edit' title='Edit'></i></a>";
    
    
                // DELETE FUNCTION IN YAJRA TABLE //
                $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';
    
    
                return $btnUpdate . "&nbsp" . $btnDelete;
            })->make(true);
    
    }
}
