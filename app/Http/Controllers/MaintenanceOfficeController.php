<?php

namespace App\Http\Controllers;

use App\Office;
use App\Office2;
use App\Setting;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MaintenanceOfficeController extends Controller
{
    public const DISPLAY = 1;
    public const HIDE = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officeCode = Office2::latest('OfficeCode2')->first()->OfficeCode2 + 1 ?? 1;
        return view('MaintenanceOffice.office', compact('officeCode'));
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
            $data = Office::with('desc')
                ->select('OfficeCode', 'Description', 'OfficeCode2', 'DepartmentCode')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('OfficeHead', function ($row) {
                    return $row->desc->OfficeHead ?? '-';
                })
                ->addColumn('OfficeShortName', function ($row) {
                    return $row->desc->OfficeShort ?? '-';
                })
                ->addColumn('OfficeHeadPosition', function ($row) {
                    return $row->desc->PositionName ?? '-';
                })
                ->addColumn('action', function ($row) {
                    $btn = "<a title='Edit Office' href='" . route('maintenance-office.edit', $row->OfficeCode) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                    $btn = $btn . "<a title='Delete Office' id='delete' value='$row->OfficeCode' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
            'officeName'      => 'required',
            'officeShortName' => 'required',
            'officeHead'      => 'required',
            'positionName'    => 'required',
            'departmentCode'  => 'nullable|min:5|unique:DTR_PAYROLL_CONNECTION.Office,DepartmentCode',
        ]);


        DB::transaction(function () use ($request) {
            $office = new Office;
            $officeDescripton = new Office2;

            $officeIncrement = tap(Setting::find('OFFICE'))->increment('Keyvalue');
            $officeIncrement2 = tap(Setting::find('OFFICE2'))->increment('Keyvalue');

            $office->OfficeCode                = $officeIncrement->Keyvalue;
            $office->Description                = $request['officeName'];
            $office->OfficeCode2                = $officeIncrement2->Keyvalue;
            $office->DepartmentCode             = $request['departmentCode'];
            $office->OfficeCode2 = $officeIncrement2->Keyvalue;

            $officeDescripton->OfficeCode2  = $officeIncrement2->Keyvalue;
            $officeDescripton->Description = $request['officeName'];
            $officeDescripton->OfficeShort  = $request['officeShortName'];
            $officeDescripton->OfficeHead   = $request['officeHead'];
            $officeDescripton->PositionName = $request['positionName'];
            $officeDescripton->Display = 1;

            $officeDescripton->save();
            $office->save();
        });

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
    public function edit($OfficeCode)
    {
        $office = Office::with('desc')->find($OfficeCode);
        return view('MaintenanceOffice.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $OfficeCode)
    {
        $this->validate($request, [
            'officeName'      => 'required',
            'officeAddress'   => 'nullable|min:5',
            'officeShortName' => 'required',
            'officeHead'      => 'required',
            'positionName'    => 'required',
            'departmentCode'  => 'nullable|min:5',
        ]);

        DB::transaction(function () use ($request, $OfficeCode) {

            $office = Office::with('desc')->find($OfficeCode);
            $office->Description    = $request['officeName'];
            $office->DepartmentCode = $request['departmentCode'];

            $office->desc->OfficeShort  = $request['officeShortName'];
            $office->desc->OfficeHead   = $request['officeHead'];
            $office->desc->PositionName = $request['positionName'];
            $office->desc->Description = $request['officeName'];

            $office->save();
            $office->desc->save();
        });

        Session::flash('alert-success', 'Office Updated Successfully');
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
        Office::find($id)->delete();
        Office2::where('OfficeCode2', $id)->delete();
        return json_encode(array('statusCode' => 200));
    }

    public function delete($id)
    {
        Office::find($id)->delete();
        return json_encode(array('statusCode' => 200));
    }
}
