<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Office;
use App\Plantilla;
use App\Position;
use App\service_record as ServiceRecord;
use App\Setting;
use App\service_record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;

class ServiceRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::select('office_code', 'office_name')->get();

        $status = ['Casual', 'Contractual', 'Coterminous', 'Coterminous-Temporary', 'Permanent', 'Provisional', 'Regular Permanent', 'Substitute', 'Temporary', 'Elected'];

        count($status) - 1;

        $position = Position::select('PosCode', 'Description')->get();

        $employee = Employee::exclude(['ImagePhoto'])->select('Employee_id', 'LastName', 'FirstName', 'MiddleName', 'Suffix')->get();

        // $plantillas = Plantilla::with(['employee:Employee_id,FirstName,MiddleName,LastName,Suffix,OfficeCode,PosCode', 'employee_record:Employee_id,FirstName,MiddleName,LastName,Suffix,OfficeCode,PosCode'])->where('employee_id', '!=', null)->get(['employee_id', 'plantilla_id']);
        $plantillas = Plantilla::with(['employee:Employee_id,FirstName,MiddleName,LastName,Suffix,OfficeCode,PosCode'])->where('employee_id', '!=', null)->get(['employee_id', 'plantilla_id']);
        $plantillas = $plantillas->unique('employee_id');
        $class = 'mini-sidebar';
        return view('ServiceRecords.ServiceRecords', compact('employee', 'position', 'status', 'office', 'plantillas', 'class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function list($employeeId)
    {

        $data = DB::table('EPims.dbo.service_records')
        ->leftJoin('EPims.dbo.offices', 'service_records.office_code', '=', 'offices.office_code')
        ->leftJoin('EPims.dbo.Positions', 'service_records.PosCode', '=', 'Positions.PosCode')
        ->select('id', 'employee_id', DB::raw("FORMAT(service_from_date, 'MM-dd-yy') as service_from_date"), DB::raw("FORMAT(service_to_date, 'MM-dd-yy') as service_to_date"), 'Positions.Description as position_name', 'status', 'salary', 'offices.office_name', 'leave_without_pay', DB::raw("FORMAT(separation_date, 'MM-dd-yy') as separation_date"), 'separation_cause')
        ->where('employee_id', $employeeId)
        ->whereNull('service_records.deleted_at')
        ->get();
        return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = "<a title='Edit Service Record' href='".route('service-records.edit', $row->id)."' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                    $btn = $btn."<a title='Delete Service Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
            ";
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fromDate' => 'required',
            'positionTitle' => 'required',
            'salary' => 'required',
        ]);

        // Check if the toDate is null
        if ($request->toDate == null) {
            // Get the current service record of employee
            $currentServiceRecord = ServiceRecord::where('employee_id', $request->employeeId)->whereNull('service_to_date')->orderBy('service_from_date', 'desc')->first();

            // Update the service_to_date column by the current service_from_date
            if ($currentServiceRecord) {
                $currentServiceRecord->service_to_date = Carbon::parse($request->fromDate)->subDays(1)->format('Y-m-d');
                $currentServiceRecord->save();
            }
        }

        $service_record = new ServiceRecord();
        $service_record->id = tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue;
        $service_record->employee_id = $request->employeeId;
        $service_record->service_from_date = $request->fromDate;
        $service_record->service_to_date = $request->toDate;
        $service_record->PosCode = $request->positionTitle;
        $service_record->status = $request->status;
        $service_record->salary = $request->salary;
        $service_record->office_code = $request->officeCode;
        $service_record->leave_without_pay = $request->leavePay;
        $service_record->separation_date = $request->date;
        $service_record->separation_cause = $request->cause;
        $service_record->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service_record = ServiceRecord::with(['employee'])->find($id);

        $office = Office::select('office_code', 'office_name')->get();

        $status = ['Casual', 'Contractual', 'Coterminous', 'Coterminous-Temporary', 'Permanent', 'Provisional', 'Substitute', 'Temporary', 'Elected'];

        $positions = Position::select('PosCode', 'Description')->get();
        $class = 'mini-sidebar';
        return view('ServiceRecords.edit', compact('service_record', 'positions', 'status', 'office', 'class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fromDate' => 'required',
            'toDate' => ['nullable', 'after:fromDate'],
            'positionTitle' => 'required',
            'status' => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'salary' => 'required',
            'leavePay' => 'required',
            'officeCode' => 'required',
            'cause' => 'required',
            'date' => 'required',
        ]);

        $service_record = ServiceRecord::find($id);
        $service_record->employee_id = $request['employeeId'];
        $service_record->service_from_date = $request['fromDate'];
        $service_record->service_to_date = $request['toDate'];
        $service_record->PosCode = $request['positionTitle'];
        $service_record->status = $request['status'];
        $service_record->salary = $request['salary'];
        $service_record->office_code = $request['officeCode'];
        $service_record->leave_without_pay = $request['leavePay'];
        $service_record->separation_date = $request['date'];
        $service_record->separation_cause = $request['cause'];
        $service_record->save();
        Session::flash('alert-success', 'Update Service Records Successfully');

        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceRecord::find($id)->delete();

        return json_encode(['statusCode' => 200]);
    }

    public function delete($id)
    {
        ServiceRecord::find($id)->delete();
        // return back()->with('success', 'Successfully delete a salary adjustment record.');
        return json_encode(['statusCode' => 200]);
    }
}
