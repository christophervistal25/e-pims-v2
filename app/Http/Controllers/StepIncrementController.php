<?php

namespace App\Http\Controllers;

use DB;
use App\Employee;
use App\Position;
use App\Plantilla;
use App\StepIncrement;
use App\service_record;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class StepIncrementController extends Controller
{


    //  SHOW DATA IN YAJRA TABLE //
    public function list()
    {

        $data = DB::table('Step_increments')
            ->leftJoin('Employees', 'Step_increments.employee_id', '=', 'Employees.Employee_id')
            ->leftJoin('Position', 'Step_increments.PosCode', '=', 'Position.PosCode')
            ->select(
                'id',
                'date_step_increment',
                'FirstName',
                'MiddleName',
                'LastName',
                'Description',
                'item_no',
                ('last_latest_appointment'),
                // DB::raw("CONCAT(FirstName, ' ' , MiddleName, ' ' , LastName, ' ' , Suffix) AS fullname")
                DB::raw("CONCAT(sg_no_from, '-' , step_no_from) AS sg_from_and_step_from"),
                'salary_amount_from',
                DB::raw("CONCAT(sg_no_to, '-' , step_no_to) AS sg_to_and_step_to"),
                'salary_amount_to',
                'salary_diff'
            )


            ->where('Step_increments.deleted_at', null)
            ->get();

        // dd($data);




        if ($data->count() === 0) {
            $data = $data->where('deleted_at', null);
        }


        return DataTables::of($data)
            ->addColumn('salary_amount_from', function ($row) {
                return '₱' . number_format($row->salary_amount_from, 2, '.', ',');
            })
            ->addColumn('salary_amount_to', function ($row) {
                return '₱' . number_format($row->salary_amount_to, 2, '.', ',');
            })
            ->addColumn('salary_diff', function ($row) {
                return '₱' . number_format($row->salary_diff, 2, '.', ',');
            })


            // EDIT FUNCTION IN YAJRA TABLE //
            ->addColumn('action', function ($row) {
                $btnEdit = "<a href='" . route('step-increment.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil' title='Edit'></i></a>";


                // DELETE FUNCTION IN YAJRA TABLE //
                $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="' . $row->id . '"><i style="pointer-events:none;" class="la la-trash"></i></button>';

                // PRINT FUNCTION IN YAJRA TABLE //
                $btnPrint = "<a href='" . route('print-increment', $row->id) . "' class='rounded-circle text-white btn btn-primary btn-sm' title='Print'><i style='pointer-events:none;' class='la la-print'></i></a>";


                return $btnEdit . "&nbsp" . $btnDelete . "&nbsp" . $btnPrint;

            })->make(true);
    }



    // SHOW //
    public function index()
    {

        // $thisYear = DB::table('plantillas')
        // ->whereYear('year', '=', date('Y'))
        // ->get();


        $employees = Employee::has('plantillaForStep')
                    ->with(['plantillaForStep', 'plantillaForStep.plantilla_positions', 'plantillaForStep.plantilla_positions.position'])
                    // ->whereYear('year', '=', date('Y'))
                    ->select('PlantillaForStep:year')
                    // ->without(['office_charging'])
                    ->doesntHave('step')
                    ->get();    



        return view('StepIncrement.create', compact('employees'));
    }





    //  POST METHOD //
    public function store(Request $request)
    {

        $this->validate($request, [
            'employeeName'      => 'required',
            'dateStepIncrement' => 'required',
            'stepNo2'           => 'required',
        ]);

        $increment = StepIncrement::create([
            'employee_id'               => $request->employeeID,
            'item_no'                   => $request->itemNoFrom,
            'office_code'               => $request->officeCode,
            'PosCode'                   => $request->positionID,
            'date_step_increment'       => $request->dateStepIncrement,
            'last_latest_appointment'   => $request->datePromotion,
            'sg_no_from'                => $request->sgNoFrom,
            'step_no_from'              => $request->stepNoFrom,
            'salary_amount_from'        => $request->amountFrom,
            'sg_no_to'                  => $request->sgNo2,
            'step_no_to'                => $request->stepNo2,
            'salary_amount_to'          => $request->amount2,
            'salary_diff'               => $request->monthlyDifference
        ]);
    

        $increment->plantilla->update([
            'step_no'          => $request['stepNo2'],
            'salary_amount'    => $request['amount2']
        ]);


        $employee = Employee::find($request->employeeID);
        $employee->last_step_increment = $increment->last_latest_appointment;
        $employee->save();



        return redirect('/step-increment')->with('success', true);
    }




    //  EDIT METHOD //
    public function edit($id)
    {
        $stepIncrement = StepIncrement::with(['employee:Employee_id,FirstName,MiddleName,LastName,Suffix', 'position'])->find($id);
        $employee = $stepIncrement->employee;
        $position = $stepIncrement->position;

        // dd($position);

        return view('stepIncrement.edit', compact('stepIncrement', 'employee', 'position'));
    }




    //  UPDATE METHOD //
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employeeName'      => 'required',
            'dateStepIncrement' => 'required',
            'stepNo2'           => 'required',
        ]);

        $request = request()->all();
        $stepId = $request['stepID'];

        $step_increments = StepIncrement::find($stepId);
        $step_increments->date_step_increment = $request['dateStepIncrement'];
        $step_increments->employee_id = $request['employeeID'];
        $step_increments->item_no = $request['itemNoFrom'];
        $step_increments->last_latest_appointment = $request['datePromotion'];
        $step_increments->sg_no_from = $request['sgNoFrom'];
        $step_increments->step_no_from = $request['stepNoFrom'];
        $step_increments->salary_amount_from = $request['amountFrom'];
        $step_increments->sg_no_to = $request['sgNo2'];
        $step_increments->step_no_to = $request['stepNo2'];
        $step_increments->salary_amount_to = $request['amount2'];
        $step_increments->salary_diff = $request['monthlyDifference'];
        $step_increments->update();

        $step_increments->plantilla->update([
            'step_no'               => $request['stepNo2'],
            'salary_amount'         => $request['amount2'],
            'date_last_promotion'   => $request['created']
        ]);


        Session::flash('success', true);

        return response()->json(['success' => true]);
    }



    //  DELETE METHOD //
    public function destroy($id)
    {
        $stepIncrement = StepIncrement::find($id);
        $stepIncrement->delete();

        return response()->json(['success' => true]);
    }
    
}
