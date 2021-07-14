<?php

namespace App\Http\Controllers;

use DB;
use App\Employee;
use App\Plantilla;
use App\StepIncrement;
use App\service_record;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class StepIncrementController extends Controller
{


    //  FETCH DATA IN YAJRA TABLE //

    public function list()
    {
        $data = DB::table('step_increments')
            ->leftJoin('employees', 'step_increments.employee_id', '=', 'employees.employee_id')
            ->leftJoin('positions', 'step_increments.position_id', '=', 'positions.position_id')
            ->select('id', 'date_step_increment', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'position_name', 'item_no', 'date_latest_appointment',
            DB::raw('CONCAT(sg_no_from, "-" , step_no_from) AS sg_from_and_step_from'), 'salary_amount_from', DB::raw('CONCAT(sg_no_to, "-" , step_no_to) AS sg_to_and_step_to'), 'salary_amount_to', 'salary_diff')

            ->where('step_increments.deleted_at', null)
            ->get();

            if($data->count() === 0){
                $data = $data->where('delete_at', null);
            }




            return Datatables::of($data)
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

                ->addColumn('action', function($row) {
                    $btnEdit = "<a href='". route('step-increment.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-info btn-sm'><i class='la la-edit' title='Edit'></i></a>";


                    // DELETE FUNCTION IN YAJRA TABLE //

                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';


                return $btnEdit . "&nbsp" . $btnDelete;

            })->make(true);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::whereDoesntHave('step')->with(['plantilla', 'plantilla.position'])->get();
        return view('StepIncrement.StepIncrement', compact('employee'));
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


     //  POST FUNCTION //
    public function store(Request $request)
    {
        $this->validate($request, [
                'employeeName'      => 'required',
                'dateStepIncrement' => 'required',
                'stepNo2'           => 'required',
        ]);
            $step_increments = new StepIncrement;
            $step_increments->employee_id             = $request['employeeID'];
            $step_increments->item_no                 = $request['itemNoFrom'];
            $step_increments->position_id             = $request['positionID'];
            $step_increments->date_step_increment     = $request['dateStepIncrement'];
            $step_increments->date_latest_appointment = $request['datePromotion'];
            $step_increments->sg_no_from              = $request['sgNoFrom'];
            $step_increments->step_no_from            = $request['stepNoFrom'];
            $step_increments->salary_amount_from      = $request['amountFrom'];
            $step_increments->sg_no_to                = $request['sgNo2'];
            $step_increments->step_no_to              = $request['stepNo2'];
            $step_increments->salary_amount_to        = $request['amount2'];
            $step_increments->salary_diff             = $request['monthlyDifference'];
            $step_increments->save();
            $service_record = new service_record;
            $service_record->employee_id            = $request['employeeID'];
            $service_record->service_from_date      = $request['dateStepIncrement'];
            $service_record->position_id            = $request['positionID'];
            $service_record->status                 = $request['status'];
            $service_record->salary                 = $request['amountFrom'];
            $service_record->office_code            = $request['officeCode'];
            $service_record->separation_cause       = 'Step '.$request['stepNo2'];
            $service_record->save();
            $step_increments->plantilla->update([
                'step_no' => $request['stepNo2'],
                'salary_amount' => $request['amount2']
            ]);



        return redirect('/step-increment')->with('success', true);
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


    //  EDIT FUNCTION //
    public function edit($id)
    {
        $stepIncrement = StepIncrement::with(['employee:employee_id,firstname,middlename,lastname,extension', 'position:position_id,position_name'])->find($id);
        $employee = $stepIncrement->employee;
        $position = $stepIncrement->position;
        return view ('stepIncrement.edit', compact('stepIncrement', 'employee', 'position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  UPDATE FUNCTION //
    public function update(Request $request, $id)
    {
            // $this->validate($request, [
            //     'employeeName'      => 'required',
            //     'dateStepIncrement' => 'required',
            //     'stepNo2'           => 'required',
            // ]);

            $step_increments = StepIncrement::find($id);
            $step_increments->employee_id             = $request['employeeID'];
            $step_increments->item_no                 = $request['itemNoFrom'];
            $step_increments->position_id             = $request['positionID'];
            $step_increments->date_step_increment     = $request['dateStepIncrement'];
            $step_increments->date_latest_appointment = $request['datePromotion'];
            $step_increments->sg_no_from              = $request['sgNoFrom'];
            $step_increments->step_no_from            = $request['stepNoFrom'];
            $step_increments->salary_amount_from      = $request['amountFrom'];
            $step_increments->sg_no_to                = $request['sgNo2'];
            $step_increments->step_no_to              = $request['stepNo2'];
            $step_increments->salary_amount_to        = $request['amount2'];
            $step_increments->salary_diff             = $request['monthlyDifference'];
            $step_increments->save();


            Session::flash('success', true);
            return response()->json(['success' => true]);

            // return redirect()->to(route('step-increment.edit', $step_increments->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  DELETE FUNCTION //
    public function destroy($id)
    {
        $stepIncrement = StepIncrement::find($id);
        $stepIncrement->delete();

        return response()->json(['success' => true]);
    }
}
