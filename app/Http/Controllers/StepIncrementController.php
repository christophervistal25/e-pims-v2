<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Employee;
use Carbon\Carbon;
use App\StepIncrement;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Services\ServiceRecordService;
use Illuminate\Support\Facades\Session;

class StepIncrementController extends Controller
{
    public function __construct(public ServiceRecordService $serviceRecordService)
    {
    }

    //  SHOW DATA IN YAJRA TABLE //
    public function list()
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('EPims.dbo.Step_increments')
            ->leftJoin('DTRPayroll.dbo.Employees', 'Step_increments.employee_id', '=', 'Employees.Employee_id')
            ->leftJoin('EPims.dbo.Positions', 'Step_increments.PosCode', '=', 'Positions.PosCode')
            ->select(
                'id',
                'date_step_increment',
                'FirstName',
                'MiddleName',
                'LastName',
                'Description',
                'item_no',
                ('last_latest_appointment'),
                DB::raw("CONCAT(sg_no_from, '-' , step_no_from) AS sg_from_and_step_from"),
                'salary_amount_from',
                DB::raw("CONCAT(sg_no_to, '-' , step_no_to) AS sg_to_and_step_to"),
                'salary_amount_to',
                'salary_diff'
            )
            ->where('Step_increments.deleted_at', null)
            ->get();

        if ($data->count() === 0) {
            $data = $data->where('deleted_at', null);
        }

        return DataTables::of($data)
            // ->addColumn('salary_amount_from', function ($row) {
            //     return '₱'.number_format($row->salary_amount_from, 2, '.', ',');
            // })
            // ->addColumn('salary_amount_to', function ($row) {
            //     return '₱'.number_format($row->salary_amount_to, 2, '.', ',');
            // })
            // ->addColumn('salary_diff', function ($row) {
            //     return '₱'.number_format($row->salary_diff, 2, '.', ',');
            // })

            // EDIT FUNCTION IN YAJRA TABLE //
            ->addColumn('action', function ($row) {
                // $btnEdit = "<a href='".route('step-increment.edit', $row->id)."' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil' title='Edit'></i></a>";
                // // DELETE FUNCTION IN YAJRA TABLE //
                // $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';
                // // PRINT FUNCTION IN YAJRA TABLE //
                // $btnPrint = "<a href='".route('print-increment', $row->id)."' target='_blank' class='rounded-circle text-white btn btn-primary btn-sm' title='Print'><i style='pointer-events:none;' class='la la-print'></i></a>";

                // return $btnEdit.'&nbsp'.$btnDelete.'&nbsp'.$btnPrint;
            })->make(true);
    }

    /**
     * It gets all employees that have a plantillaForStep, and that don't have a step.
     */
    public function index()
    {
        $employees = Employee::has('plantillaForStep')
        ->with(['plantillaForStep', 'plantillaForStep.plantilla_positions', 'plantillaForStep.plantilla_positions.position'])
        ->select('Employee_id', 'LastName', 'FirstName', 'MiddleName')
        ->get();
        return view('StepIncrement.create', compact('employees'));
    }

    /**
     * It creates a new record in the step_increments table and updates the plantilla table.
     * </code>
     *
     * @param Request request the request object
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employeeName' => 'required',
            'dateStepIncrement' => 'required',
            'stepNo2' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $stepIncrement = new StepIncrement();
            $stepIncrement->id = tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue;
            $stepIncrement->employee_id = $request->employeeID;
            $stepIncrement->item_no = $request->itemNoFrom;
            $stepIncrement->office_code = $request->officeCode;
            $stepIncrement->PosCode = $request->positionID;
            $stepIncrement->date_step_increment = $request->dateStepIncrement;
            $stepIncrement->last_latest_appointment = $request->datePromotion;
            $stepIncrement->sg_no_from = $request->sgNoFrom;
            $stepIncrement->step_no_from = $request->stepNoFrom;
            $stepIncrement->salary_amount_from = $request->amountFrom;
            $stepIncrement->sg_no_to = $request->sgNo2;
            $stepIncrement->step_no_to = $request->stepNo2;
            $stepIncrement->salary_amount_to = $request->amount2;
            $stepIncrement->salary_diff = $request->monthlyDifference;
            $stepIncrement->save();

            DB::table('EPims.dbo.plantillas')->where('employee_id', $request->employeeID)->where('year', Carbon::parse($request->dateStepIncrement)->year)
            ->update([
                'step_no' => $request->stepNo2,
                'salary_amount' => $request->amount2,
                'salary_amount_yearly' => $request->amount2 * 12,
                'date_last_increment' => $request->dateStepIncrement,
            ]);

            $employee = Employee::find($request->employeeID, ['Employee_id', 'last_step_increment']);
            $employee->last_step_increment = $request->datePromotion;
            $employee->save();

            /* Updating the service record of the employee. */
        //     $currentServiceRecord = $this->serviceRecordService->getCurrentServiceRecord($request->employeeID);
        //     $currentServiceRecord->service_to_date = Carbon::parse($request->datePromotion)->format('Y-m-d');
        //     $currentServiceRecord->save();

        //     /* Adding a new record to the service record table. */
        //     $this->serviceRecordService->addNewRecord([
        //         'employee_id' => $request->employeeID,
        //         'service_from_date' => $request->datePromotion,
        //         'PosCode' => $request->positionID,
        //         'status' => $increment->plantilla->status,
        //         'salary' => $increment->plantilla->salary_amount,
        //         'office_code' => $request->officeCode,
        //     ]);
        });

        return redirect('/step-increment')->with('success', true);
    }

    /**
     * It gets the step increment with the employee and position data, then it gets the employee and
     * position data from the step increment.
     *
     * @param id the id of the step increment
     */
    public function edit($id)
    {
        $stepIncrement = StepIncrement::with(['employee:Employee_id,FirstName,MiddleName,LastName,Suffix', 'position'])->find($id);
        $employee = $stepIncrement->employee;
        $position = $stepIncrement->position;

        return view('stepIncrement.edit', compact('stepIncrement', 'employee', 'position'));
    }

    /**
     * It updates the step increment table and the plantilla table.
     *
     * @param Request request
     * @param id the id of the step increment
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employeeName' => 'required',
            'dateStepIncrement' => 'required',
            'stepNo2' => 'required',
        ]);

        DB::transaction(function () use ($request) {
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
                'step_no' => $request['stepNo2'],
                'salary_amount' => $request['amount2'],
                'date_last_promotion' => $request['datePromotion'],
            ]);
        });

        Session::flash('success', true);

        return response()->json(['success' => true]);
    }

    /**
     * It deletes a step increment from the database
     *
     * @param id The id of the step increment to be deleted
     * @return A JSON object with a key of success and a value of true.
     */
    public function destroy($id)
    {
        $stepIncrement = StepIncrement::find($id);
        $stepIncrement->delete();

        return response()->json(['success' => true]);
    }
}
