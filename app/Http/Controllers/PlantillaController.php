<?php

namespace App\Http\Controllers;

use App\Office;
use App\Section;
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
use Illuminate\Support\Facades\Storage;
use App\service_record as ServiceRecord;

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
    public function index(Request $request)
    {
        $plantillaEmp = array_filter(Plantilla::get()->pluck('employee_id')->toArray());
        $employee = Employee::select('Employee_id', 'LastName', 'FirstName', 'MiddleName', 'Work_Status')
            ->where('Work_Status', 'not like', '%'.'JOB ORDER'.'%')
            ->where('Work_Status', 'not like', '%'.'CONTRACT OF SERVICE'.'%')
            ->where('Work_Status', '!=', '')
            ->whereNotIn('Employee_id', $plantillaEmp)
            ->orderBy('LastName', 'ASC')->get();
        $office = Office::select('office_code', 'office_name')->get();
        $year = Plantilla::select('year')->distinct('year')->where('year', '!=', '2022')->get();

        $position = Position::select('PosCode', 'Description')->get();

        $plantillaPositionID = Plantilla::get()->pluck('pp_id')->toArray();

        $plantillaPosition = PlantillaPosition::with('position:PosCode,Description')->whereDoesntHave('plantillas', function ($query) {
            $query->where('year', date('Y'));
        })->get();

        $salarygrade = SalaryGrade::get(['sg_no']);

        $status = ['Appointed','Casual', 'Coterminous', 'Permanent', 'Provisional', 'Temporary', 'Elected'];
        $class = 'mini-sidebar';

        return view('Plantilla.Plantilla', compact('employee', 'status', 'position', 'office', 'salarygrade', 'plantillaPosition', 'year', 'class'));
    }


    public function list(string $office, $year)
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.plantillas')
        ->join('EPims.dbo.offices', 'plantillas.office_code', '=', 'offices.office_code')
        ->join('EPims.dbo.plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('EPims.dbo.Positions', 'plantilla_positions.PosCode', '=', 'Positions.PosCode')
        ->leftJoin('DTRPayroll.dbo.Employees', 'Employees.Employee_id', '=', 'plantillas.employee_id')
        ->select(DB::raw("CONCAT(FirstName, ' ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"), 'plantillas.employee_id as employee_id','plantilla_id', 'plantillas.item_no as item_no', 'offices.office_name as office_name', 'plantillas.sg_no as sg_no', 'plantillas.step_no as step_no','plantillas.status as status', 'plantillas.year as year', 'Positions.Description');
        if (request()->ajax()) {
            $PlantillaData = ($office != '*') ? $data->where('plantillas.office_code', $office)->where('plantillas.year', $year)->get()
                : $data->where('plantillas.year', $year)->get();
            return DataTables::of($PlantillaData)
                ->addColumn('action', function ($row) {
                    $btn = "<a title='Edit Plantilla' href='".route('plantilla-of-personnel.edit', $row->plantilla_id)."' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                    return $btn;
                })
                ->addColumn('sg_step', function ($row) {
                    $btn = "$row->sg_no / $row->step_no";
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
            'itemNo' => 'required',
            'positionTitle' => 'required',
            'stepNo' => 'required|in:'.implode(',', range(1, 8)),
            'salaryAmount' => 'required|numeric',
            'currentSgyear' => 'required',
            'officeCode' => 'required|in:'.implode(',', range(1, 37)),
            'salaryAmountYearly' => 'required',
            'lastPromotion' => 'nullable|after:originalAppointment',
            'status' => 'required|in:Appointed,Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
        ]);
        DB::transaction(function () use ($request) {
            $plantilla = new Plantilla();
            $plantilla->plantilla_id = tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue;
            $plantilla->item_no = $request['itemNo'];
            $plantilla->old_item_no = $request['oldItemNo'];
            $plantilla->pp_id = $request['positionTitle'];
            $plantilla->employee_id = $request['employeeName'];
            $plantilla->sg_no = $request['salaryGrade'];
            $plantilla->step_no = $request['stepNo'];
            $plantilla->salary_amount_previous = $request['salaryAuthorized'];
            $plantilla->sg_no_previous = $request['salaryGradePrevious'];
            $plantilla->step_no_previous = $request['stepNoPrevious'];
            $plantilla->salary_amount = $request['salaryAmount'];
            $plantilla->salary_amount_yearly = $request['salaryAmountYearly'];
            $plantilla->salary_amount_previous_yearly = $request['salaryAmountPreviousYearly'];
            $plantilla->office_code = $request['officeCode'];
            $plantilla->date_original_appointment = $request['originalAppointment'];
            $plantilla->date_last_promotion = $request['lastPromotion'];
            $plantilla->date_last_increment = $request['lastStepIncrement'];
            $plantilla->status = $request['status'];
            $plantilla->year = $request['currentSgyear'];
            $plantilla->save();

            $plantillaPosition = PlantillaPosition::find($request->positionTitle);

            // /* Creating a new record in the ServiceRecord table. */
            if($request->employeeName != ""){
                ServiceRecord::create([
                    'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                    'employee_id' => $request->employeeName,
                    'service_from_date' => $request->originalAppointment,
                    'PosCode' => $plantillaPosition->PosCode,
                    'status' => $request->status,
                    'salary' => $request->salaryAmount,
                    'office_code' => $request->officeCode,
                ]);
            }

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
    public function edit($plantilla_id)
    {
        $employee = Employee::select('Employee_id', 'LastName', 'FirstName', 'MiddleName')->get();
        $office = Office::select('office_code', 'office_name')->get();
        $position = Position::select('PosCode', 'Description')->get();
        $plantillaPositionIDAll = Plantilla::where('plantilla_id', '!=', $plantilla_id)->get()->pluck('pp_id')->toArray();
        $plantillaPositionAll = PlantillaPosition::select('pp_id', 'PosCode', 'office_code')->with('position:PosCode,Description')->whereNotIn('pp_id', $plantillaPositionIDAll)->get();
        $salarygrade = SalaryGrade::get(['sg_no']);
        $status = ['Appointed','Casual', 'Coterminous', 'Permanent', 'Provisional', 'Temporary', 'Elected'];
        count($status) - 1;
        $plantilla = Plantilla::with('plantilla_positions.areaType', 'plantilla_positions.areaLevel', 'plantilla_positions.areaCode', 'plantilla_positions.division', 'plantilla_positions.section')->find($plantilla_id);

        $officeCode = $plantilla->office_code;
        $plantillaPositionID = Plantilla::where('plantilla_id', '!=', $plantilla_id)->get()->pluck('pp_id')->toArray();
        $plantillaPositionedit = PlantillaPosition::select('pp_id', 'PosCode', 'office_code')->with('position:PosCode,Description')->where('office_code', $officeCode)->whereNotIn('pp_id', $plantillaPositionID)->get();

        $plantillaPosition = PlantillaPosition::with('position:PosCode,Description')->whereDoesntHave('plantillas', function ($query) {
            $query->where('year', date('Y'));
        })->get();
        $class = 'mini-sidebar';
        return view('Plantilla.edit', compact('plantilla', 'employee', 'status', 'position',   'office',  'salarygrade', 'plantillaPosition', 'plantillaPositionedit', 'plantillaPositionAll', 'class'));
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
            'itemNo' => 'required',
            'positionTitle' => 'required',
            'stepNo' => 'required|in:'.implode(',', range(1, 8)),
            'salaryAmount' => 'required|numeric',
            'currentSgyear' => 'required',
            'officeCode' => 'required|in:'.implode(',', range(1, 37)),
            'salaryAmountYearly' => 'required',
            'lastPromotion' => 'nullable|after:originalAppointment',
            'status' => 'required|in:Appointed,Casual,Contractual,Coterminous,Coterminous-Temporary,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
        ]);
        DB::transaction(function () use ($request, $plantilla_id) {
            $plantilla = Plantilla::with('plantilla_positions')->find($plantilla_id);
            $plantilla->item_no = $request->itemNo;
            $plantilla->old_item_no = $request->oldItemNo;
            $plantilla->pp_id = $request->positionTitle;
            $plantilla->employee_id = $request->employeeId;
            $plantilla->sg_no = $request->salaryGrade;
            $plantilla->step_no = $request->stepNo;
            $plantilla->salary_amount_previous = $request->salaryAuthorized;
            $plantilla->sg_no_previous = $request->salaryGradePrevious;
            $plantilla->step_no_previous = $request->stepNoPrevious;
            $plantilla->salary_amount = $request->salaryAmount;
            $plantilla->salary_amount_yearly = $request->salaryAmountYearly;
            $plantilla->salary_amount_previous_yearly = $request->salaryAmountPreviousYearly;
            $plantilla->office_code = $request->officeCode;
            $plantilla->date_original_appointment = $request->originalAppointment;
            $plantilla->date_last_promotion = $request->lastPromotion;
            $plantilla->date_last_increment = $request->lastStepIncrement;
            $plantilla->status = $request->status;
            $plantilla->year = $request->currentSgyear;
            $plantilla->save();

            // $plantillaPosition = $plantilla->plantilla_positions;

            // // Get the present service record of employee.
            // $record = ServiceRecord::where([
            //     'employee_id' => $request->employeeId,
            //     'PosCode' => $plantillaPosition->PosCode,
            //     'office_code' => $plantillaPosition->office_code,
            // ])->whereNull('service_to_date')->first();

            // // // Delete the current service record
            // $record->delete();

            // $newPlantillaPosition = PlantillaPosition::find($request->positionTitle);

            // // Insert new service record.
            // ServiceRecord::create([
            //     'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            //     'employee_id' => $request->employeeId,
            //     'service_from_date' => $request->lastPromotion,
            //     'PosCode' => $newPlantillaPosition->PosCode,
            //     'status' => $request->status,
            //     'salary' => $request->salaryAmount,
            //     'office_code' => $request->officeCode,
            // ]);
        });

        return response()->json(['success' => true]);
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
