<?php

namespace App\Http\Controllers;

use App\Office;
use App\Setting;
use App\Division;
use App\Employee;
use App\Position;
use App\Plantilla;
use App\SalaryGrade;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
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
        $division = Division::select('division_id', 'division_name', 'office_code')->get();
        $plantillaEmp = Plantilla::get()->pluck('employee_id')->toArray();
        $employee = Employee::select('Employee_id', 'LastName', 'FirstName', 'MiddleName')->whereNotIn('Employee_id', $plantillaEmp)->orderBy('LastName', 'ASC')->get();
        $office = Office::select('office_code', 'office_name')->get();

        $position = Position::select('PosCode', 'Description')->get();

        $plantillaPositionID = Plantilla::get()->pluck('pp_id')->toArray();

        $plantillaPosition = PlantillaPosition::select('pp_id', 'PosCode', 'office_code')->with('position:PosCode,Description')->whereNotIn('pp_id', $plantillaPositionID )->get();
        $salarygrade = SalaryGrade::get(['sg_no']);

        $status = ['Casual','Coterminous','Permanent','Provisional','Temporary','Elected'];

        count($status) - 1;
        $areacode = ['Region 1', 'Region 2','Region 3','Region 4','Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12','NCR', 'CAR', 'CARAGA', 'ARMM'];

        count($areacode) - 1;
        $areatype = ['Region','Province','District','Municipality','Foreign Post'];

        count($areatype) - 1;
        $arealevel = ['K','T','S','A'];

        count($arealevel) - 1;
        return view('Plantilla.Plantilla', compact('employee', 'status', 'position', 'areacode', 'areatype', 'office', 'arealevel', 'salarygrade', 'plantillaPosition', 'division'));
    }



    public function list(string $office = '*')
    {
        $data = DB::table('plantillas')->join('offices', 'plantillas.office_code', '=', 'offices.office_code')
        ->join('employees', 'plantillas.employee_id', '=', 'employees.Employee_id')
        ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('Position', 'plantilla_positions.PosCode', '=', 'Position.PosCode')
        ->select('plantilla_id', 'plantillas.item_no as item_no', 'plantillas.employee_id as employee_id', 'offices.office_name as office_name', 'plantillas.status as status', 'plantillas.year as year', 'Position.Description' ,DB::raw("CONCAT(FirstName, ' ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"))
        ->orderBy('plantilla_id', 'desc');
        if (request()->ajax()) {
            $PlantillaData = ($office != '*') ? $data->where('plantillas.office_code', $office)->get()
                : $data->get();
            return DataTables::of($PlantillaData)
            ->addColumn('action', function($row){
                $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                    return $btn;
            })
        ->rawColumns(['action'])
        ->make(true);
    }
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
            // 'salaryGrade'                   => 'required|in:' . implode(',',range(1, 33)),
            'stepNo'                        => 'required|in:' . implode(',',range(1, 8)),
            'salaryAmount'                  => 'required|numeric',
            'currentSgyear'                 => 'required',
            'officeCode'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'divisionId'                    => 'required',
            'originalAppointment'           => 'required',
            'lastPromotion'                 => 'required|after:originalAppointment',
            'status'                        => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'areaCode'                      => 'required|in:' . implode(',', Plantilla::REGIONS),
            'areaType'                      => 'required|in:Region,Province,District,Municipality,Foreign Post',
            'areaLevel'                     => 'required|in:K,T,S,A',
        ]);
        $data = DB::table('settings')->where('Keyname', 'AUTONUMBER2')->first();
        $id = (int)$data->Keyvalue;
        $plantilla = new Plantilla;
        $plantilla->plantilla_id           = $id;
        $plantilla->item_no                = $request['itemNo'];
        $plantilla->old_item_no            = $request['oldItemNo'];
        $plantilla->pp_id                  = $request['positionTitle'];
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
        $plantilla->year                   = $request['currentSgyear'];
        $plantilla->save();
        Setting::find('AUTONUMBER2')->increment('Keyvalue');
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
        $division = Division::select('division_id', 'division_name', 'office_code')->get();
        $employee = Employee::select('Employee_id', 'LastName', 'FirstName', 'MiddleName')->get();
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('PosCode', 'Description')->get();
        $plantillaPositionIDAll = Plantilla::where('plantilla_id','!=',$plantilla_id)->get()->pluck('pp_id')->toArray();
        $plantillaPositionAll = PlantillaPosition::select('pp_id', 'position_id', 'office_code')->with('position:position_id,position_name')->whereNotIn('pp_id', $plantillaPositionIDAll )->get();
        $salarygrade = SalaryGrade::get(['sg_no']);
        $status = ['Casual','Coterminous','Permanent','Provisional','Temporary','Elected'];
        count($status) - 1;
        $areacode = ['Region 1', 'Region 2','Region 3','Region 4','Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12','NCR', 'CAR', 'CARAGA', 'ARMM'];
        count($areacode) - 1;
        $areatype = ['Region','Province','District','Municipality','Foreign Post'];
        count($areatype) - 1;
        $arealevel = ['K','T','S','A'];
        count($arealevel) - 1;
        $plantilla = Plantilla::find($plantilla_id);
        $officeCode = $plantilla->office_code;
        $plantillaPositionID = Plantilla::where('plantilla_id','!=',$plantilla_id)->get()->pluck('pp_id')->toArray();
        $plantillaPosition = PlantillaPosition::select('pp_id', 'position_id', 'office_code')->with('position:position_id,position_name')->where('office_code',$officeCode)->whereNotIn('pp_id', $plantillaPositionID )->get();
        return view ('Plantilla.edit', compact('division', 'plantilla','employee', 'status', 'position', 'areacode', 'areatype', 'office', 'arealevel', 'salarygrade', 'plantillaPosition', 'plantillaPositionAll'));
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
            'currentSgyear'                  => 'required',
            'salaryAmount'                  => 'required|numeric',
            'officeCode'                    => 'required|in:' . implode(',',range(10001, 10056)),
            'divisionId'                    => 'required',
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
        $plantilla->pp_id                  = $request['positionTitle'];
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
        $plantilla->year             = $request['currentSgyear'];
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
