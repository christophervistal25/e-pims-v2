<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Office;
use App\Plantilla;
use App\service_record;
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
        $status = ['Please Select', 'Casual', 'Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        count($status) - 1;
        $position = Position::select('position_id', 'position_name')->get();
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename')->get();
        $plantilla = Plantilla::select('plantilla_id','employee_id')->with('employee:employee_id,firstname,middlename,lastname,extension')->get();
        return view('ServiceRecords.ServiceRecords', compact('employee', 'position', 'status', 'office', 'plantilla'));
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
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = service_record::select('employee_id', 'service_from_date', 'service_to_date', 'position_id', 'status', 'salary', 'office_code', 'leave_without_pay', 'separation_date', 'separation_cause')->with('office:office_code,office_name,office_address','position:position_id,position_name')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('position', function ($row) {
                            return $row->position->position_name;
                        })
                        ->addColumn('office', function ($row) {
                            return $row->office->office_name . '' . $row->office->office_address;
                        })
                    ->addColumn('action', function($row){
                        $btn = "<a href='' class='edit btn btn-primary btn-sm'>Edit</a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
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
            'fromDate'                    => 'required',
            'toDate'                      => 'required',
            'positionTitle'               => 'required',
            'status'                      => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'salary'                      => 'required',
            'officeCode'                  => 'required|in:' . implode(',',range(10001, 10056)),
            'leavePay'                    => 'required',
            'date'                        => 'required',
            'cause'                       => 'required',
        ]);
        $service_record = new service_record;
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
        return response()->json(['success'=>true]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
