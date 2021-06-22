<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Plantilla;
use App\Employee;
use App\SalaryGrade;
use App\Office;
use App\Position;
use App\PlantillaPosition;
use Illuminate\Support\Facades\Session;
class PlantillaController extends Controller
{

    public function employee()
    {
        return Employee::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $plantillaEmp = Plantilla::get()->pluck('employee_id')->toArray();
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename')->whereNotIn('employee_id', $plantillaEmp )->get();
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('position_id', 'position_name')->get();
        $plantillaPosition = PlantillaPosition::select('pp_id', 'position_id', 'office_code')->get();
        $salarygrade = SalaryGrade::get(['sg_no']);
        $status = ['Please Select', 'Casual', 'Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        count($status) - 1;
        $areacode = ['Please Select', 'Region 1', 'Region 2','Region 3','Region 4','Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12','NCR', 'CAR', 'CARAGA', 'ARMM'];
        count($areacode) - 1;
        $areatype = ['Please Select','Region','Province','District','Municipality','Foreign Post'];
        count($areatype) - 1;
        $arealevel = ['Please Select','K','T','S','A'];
        count($arealevel) - 1;
        return view('Plantilla.Plantilla', compact('employee', 'status', 'position', 'areacode', 'areatype', 'office', 'arealevel', 'salarygrade', 'plantillaPosition'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Plantilla::select('plantilla_id', 'item_no', 'position_id', 'office_code', 'status', 'employee_id')->with('office:office_code,office_short_name','positions:position_id,position_name', 'employee:employee_id,firstname,middlename,lastname,extension')->orderBy('plantilla_id', 'DESC');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('positions', function ($row) {
                        return $row->positions->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_short_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-primary btn-sm'><i class='la la-edit'></i></a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('SalaryGrade.SalaryGrade');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'itemNo'                        => 'required',
            'positionTitle'                 => 'required',
            'employeeName'                  => 'required',
            'salaryGrade'                   => 'required|in:' . implode(',',range(1, 33)),
            'stepNo'                        => 'required|in:' . implode(',',range(1, 8)),
            'salaryAmount'                  => 'required|numeric',
            'officeCode'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'divisionId'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'originalAppointment'           => 'required',
            'lastPromotion'                 => 'required|after:originalAppointment',
            'status'                        => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'areaCode'                      => 'required|in:' . implode(',', Plantilla::REGIONS),
            'areaType'                      => 'required|in:Region,Province,District,Municipality,Foreign Post',
            'areaLevel'                     => 'required|in:K,T,S,A',

        ]);
        $plantilla = new Plantilla;
        $plantilla->item_no                = $request['itemNo'];
        $plantilla->old_item_no            = $request['oldItemNo'];
        $plantilla->position_id            = $request['positionTitle'];
        $plantilla->position_ext           = $request['positionTitleExt'];
        $plantilla->employee_id            = $request['employeeName'];
        $plantilla->sg_no                  = $request['salaryGrade'];
        $plantilla->step_no                = $request['stepNo'];
        $plantilla->salary_amount          = $request['salaryAmount'];
        $plantilla->office_code            = $request['officeCode'];
        $plantilla->division_id            = $request['divisionId'];
        $plantilla->date_original_appointment = $request['originalAppointment'];
        $plantilla->date_last_promotion    = $request['lastPromotion'];
        $plantilla->status                 = $request['status'];
        $plantilla->area_code              = $request['areaCode'];
        $plantilla->area_type              = $request['areaType'];
        $plantilla->area_level             = $request['areaLevel'];
        $plantilla->save();
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
    public function edit($plantilla_id)
    {
        $employee = Employee::select('employee_id', 'lastname', 'firstname', 'middlename')->get();
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('position_id', 'position_name')->get();
        $salarygrade = SalaryGrade::get(['sg_no']);
        $status = ['Please Select', 'Casual', 'Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        count($status) - 1;
        $areacode = ['Please Select', 'Region 1', 'Region 2','Region 3','Region 4','Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12','NCR', 'CAR', 'CARAGA', 'ARMM'];
        count($areacode) - 1;
        $areatype = ['Please Select','Region','Province','District','Municipality','Foreign Post'];
        count($areatype) - 1;
        $arealevel = ['Please Select','K','T','S','A'];
        count($arealevel) - 1;
        $plantilla = Plantilla::find($plantilla_id);
        return view ('Plantilla.edit', compact('plantilla','employee', 'status', 'position', 'areacode', 'areatype', 'office', 'arealevel', 'salarygrade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plantilla_id)
    {
        $this->validate($request, [
            'itemNo'                        => 'required',
            'positionTitle'                 => 'required',
            'employeeId'                  => 'required',
            'salaryGrade'                   => 'required|in:' . implode(',',range(1, 33)),
            'stepNo'                        => 'required|in:' . implode(',',range(1, 8)),
            'salaryAmount'                  => 'required|numeric',
            'officeCode'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'divisionId'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'originalAppointment'           => 'required',
            'lastPromotion'                 => 'required|after:originalAppointment',
            'status'                        => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'areaCode'                      => 'required|in:' . implode(',', Plantilla::REGIONS),
            'areaType'                      => 'required|in:Region,Province,District,Municipality,Foreign Post',
            'areaLevel'                     => 'required|in:K,T,S,A',
        ]);
        $plantilla                         = Plantilla::find($plantilla_id);
        $plantilla->item_no                = $request['itemNo'];
        $plantilla->old_item_no            = $request['oldItemNo'];
        $plantilla->position_id            = $request['positionTitle'];
        $plantilla->position_ext           = $request['positionTitleExt'];
        $plantilla->employee_id            = $request['employeeId'];
        $plantilla->sg_no                  = $request['salaryGrade'];
        $plantilla->step_no                = $request['stepNo'];
        $plantilla->salary_amount          = $request['salaryAmount'];
        $plantilla->office_code            = $request['officeCode'];
        $plantilla->division_id            = $request['divisionId'];
        $plantilla->date_original_appointment = $request['originalAppointment'];
        $plantilla->date_last_promotion    = $request['lastPromotion'];
        $plantilla->status                 = $request['status'];
        $plantilla->area_code              = $request['areaCode'];
        $plantilla->area_type              = $request['areaType'];
        $plantilla->area_level             = $request['areaLevel'];
        $plantilla->save();
        Session::flash('alert-success', 'Plantilla of Personnel Record Updated Successfully');
        return back()->with('success','Updated Successfully');
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
