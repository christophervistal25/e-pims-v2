<?php

namespace App\Http\Controllers;

use App\Office;
use App\Setting;
use App\Employee;
use App\Position;
use App\Plantilla;
use App\service_record as ServiceRecord;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        $plantillas = Plantilla::with(['employee:Employee_id,FirstName,MiddleName,LastName,Suffix,OfficeCode,PosCode', 'employee_record:Employee_id,FirstName,MiddleName,LastName,Suffix,OfficeCode,PosCode'])->get(['employee_id', 'plantilla_id']);
        $plantillas = $plantillas->unique('employee_id');

        return view('ServiceRecords.ServiceRecords', compact('employee', 'position', 'status', 'office', 'plantillas'));
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
    public function list()
    {
        $data = DB::table('service_records')
            ->join('offices', 'service_records.office_code', '=', 'offices.office_code')
            ->join('Position', 'service_records.position_id', '=', 'Position.PosCode')
            ->select('id', 'employee_id', DB::raw("FORMAT(service_from_date, 'MM-dd-yy') as service_from_date"), DB::raw("FORMAT(service_to_date, 'MM-dd-yy') as service_to_date"), 'Position.Description', 'service_records.status', 'salary', 'offices.office_name', 'leave_without_pay', DB::raw("FORMAT(separation_date, 'MM-dd-yy') as separation_date"), 'separation_cause')
            ->whereNull('service_records.deleted_at')
            ->get();

        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $btn = "<a href='' class='edit btn btn-primary btn-sm'>Edit</a>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        //old query
        // if ($request->ajax()) {
        //     $data = service_record::select('employee_id', 'service_from_date', 'service_to_date', 'position_id', 'status', 'salary', 'office_code', 'leave_without_pay', 'separation_date', 'separation_cause')->with('office:office_code,office_name,office_address','position:position_id,position_name');
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('position', function ($row) {
        //                     return $row->position->position_name;
        //                 })
        //                 ->addColumn('office', function ($row) {
        //                     return $row->office->office_name . '' . $row->office->office_address;
        //                 })
        //             ->addColumn('action', function($row){
        //                 $btn = "<a href='' class='edit btn btn-primary btn-sm'>Edit</a>";
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        return view('ServiceRecords.ServiceRecords');
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
            'fromDate'      => 'required',
            'toDate'        => 'required|after:fromDate',
            'positionTitle' => 'required',
            'status'        => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'salary'        => 'required',
            'officeCode'    => 'required',
            'leavePay'      => 'required',
            'date'          => 'required',
            'cause'         => 'required',
        ]);

        $service_record = new ServiceRecord;
        $service_record->id                = tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue;
        $service_record->employee_id       = $request['employeeId'];
        $service_record->service_from_date = $request['fromDate'];
        $service_record->service_to_date   = $request['toDate'];
        $service_record->position_id       = $request['positionTitle'];
        $service_record->status            = $request['status'];
        $service_record->salary            = $request['salary'];
        $service_record->office_code       = $request['officeCode'];
        $service_record->leave_without_pay = $request['leavePay'];
        $service_record->separation_date   = $request['date'];
        $service_record->separation_cause  = $request['cause'];
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
        $service_record = ServiceRecord::find($id);
        $office = Office::select('office_code', 'office_name')->get();
        $status = ['Casual', 'Contractual', 'Coterminous', 'Coterminous-Temporary', 'Permanent', 'Provisional', 'Regular Permanent', 'Substitute', 'Temporary', 'Elected'];
        count($status) - 1;
        $position = Position::select('PosCode', 'Description')->get();
        $employee = Employee::select('employee_id', 'LastName', 'FirstName', 'MiddleName', 'Suffix')->get();
        $plantilla = Plantilla::select('plantilla_id', 'employee_id')->with('employee:Employee_id,FirstName,MiddleName,LastName,Suffix')->get();
        return view('ServiceRecords.edit', compact('service_record', 'employee', 'position', 'status', 'office', 'plantilla'));
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
            'fromDate'                    => 'required',
            'toDate'                      => 'required',
            'positionTitle'               => 'required',
            'status'                      => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'salary'                      => 'required',
            'leavePay'                    => 'required',
            'officeCode'                  => 'required',
            'cause'                       => 'required',
            'date'                        => 'required',
        ]);
        $service_record                         =  ServiceRecord::find($id);
        $service_record->employee_id            = $request['employeeId'];
        $service_record->service_from_date      = $request['fromDate'];
        $service_record->service_to_date        = $request['toDate'];
        $service_record->position_id            = $request['positionTitle'];
        $service_record->status                 = $request['status'];
        $service_record->salary                 = $request['salary'];
        $service_record->office_code            = $request['officeCode'];
        $service_record->leave_without_pay      = $request['leavePay'];
        $service_record->separation_date        = $request['date'];
        $service_record->separation_cause       = $request['cause'];
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
        return json_encode(array('statusCode' => 200));
    }
    public function delete($id)
    {
        ServiceRecord::find($id)->delete();
        // return back()->with('success', 'Successfully delete a salary adjustment record.');
        return json_encode(array('statusCode' => 200));
    }
}
