<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Office;
use App\Employee;
use App\service_record;
use App\Setting;

class PrintServiceRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('serviceRecords.print.printServiceRecords');
    }
    public function print($id)
    {
        $serviceRecord = service_record::Where('employee_id',$id)->get();
        $office = Office::select('office_code', 'office_name','office_short_name','office_short_address')->Where('office_code',$serviceRecord[0]['office_code'])->get();
        $position = Position::select('position_id', 'position_name')->Where('position_id',$serviceRecord[0]['position_id'])->get();
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename','date_birth','place_birth')->Where('employee_id',$serviceRecord[0]['employee_id'])->get();
        $setting = Setting::find(1);
        return view('serviceRecords.print.previewed', compact('serviceRecord', 'employee', 'office', 'position', 'id', 'setting'));
    }

    public function printList($id)
    {
        $serviceRecord = service_record::Where('employee_id',$id)->get();
        $office = Office::select('office_code', 'office_name','office_short_name','office_short_address')->Where('office_code',$serviceRecord[0]['office_code'])->get();
        $position = Position::select('position_id', 'position_name')->Where('position_id',$serviceRecord[0]['position_id'])->get();
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename','date_birth','place_birth')->Where('employee_id',$serviceRecord[0]['employee_id'])->get();
        $setting = Setting::find(1);
        return view('serviceRecords.print.printServiceRecords', compact('serviceRecord', 'employee', 'office', 'position', 'id', 'setting'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
