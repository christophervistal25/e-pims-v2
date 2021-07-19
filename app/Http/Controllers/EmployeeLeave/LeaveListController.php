<?php

namespace App\Http\Controllers\EmployeeLeave;

use App\Employee;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\EmployeeLeaveApplication;
use App\Http\Controllers\Controller;
use DB;


class LeaveListController extends Controller
{

    // FETCH DATA IN YAJRA TABLES //
    public function list()
    {
        $data = DB::table('employee_leave_applications')
        ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
        ->select('id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_applied', 'date_from', 'date_to', 'no_of_days');

        return Datatables::of($data)
        ->addColumn('action', function($row)
        {
            $btnUpdate = "<a href='". route('step-increment.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-edit' title='Edit'></i></a>";


            // DELETE FUNCTION IN YAJRA TABLE //
            $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';


            return $btnUpdate . "&nbsp" . $btnDelete;
        })->make(true);
    }


    // Leave List
    public function index()
    {
        $pending = EmployeeLeaveApplication::recordByStatus('pending');
        $approved = EmployeeLeaveApplication::recordByStatus('approved');
        $reject = EmployeeLeaveApplication::recordByStatus('reject');

        return view('leave.leave-list', compact('pending', 'approved', 'reject'));
    }
}
