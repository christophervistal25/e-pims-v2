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
            ->leftJoin('Position', 'Step_increments.position_id', '=', 'Position.PosCode')
            ->select('id', 'date_step_increment', DB::raw("CONCAT(FirstName, ' ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"), 'Description', 'item_no', 'last_latest_appointment',
            DB::raw("CONCAT(sg_no_from, '-' , step_no_from) AS sg_from_and_step_from"), 'salary_amount_from', DB::raw("CONCAT(sg_no_to, '-' , step_no_to) AS sg_to_and_step_to"), 'salary_amount_to', 'salary_diff')
            

            ->where('Step_increments.deleted_at', null)
            ->get();

        // dd($data);

    


        if($data->count() === 0)
        {
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
                ->addColumn('action', function($row) {
                    $btnEdit = "<a href='". route('step-increment.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil' title='Edit Step Increment'></i></a>";


                    // DELETE FUNCTION IN YAJRA TABLE //
                    $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'"><i style="pointer-events:none;" class="la la-trash"></i></button>';


                return $btnEdit . "&nbsp" . $btnDelete;

            })->make(true);


    }




    public function index()
    {
        
        $employees = Employee::whereDoesntHave('step')->with(['plantilla'])->get();
    

        return view('StepIncrement.create', compact('employees'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     //  POST METHOD //
    public function store(Request $request)
    {
      
        $this->validate($request, [
                'employeeName'      => 'required',
                'dateStepIncrement' => 'required',
                'stepNo2'           => 'required',
        ]);


        $step_increments = DB::table('Step_increments')->insert([
                'employee_id'               => $request->employeeID,
                'item_no'                   => $request->itemNoFrom,
                'position_id'               => $request->positionID,
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

          
        return redirect('/step-increment')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    //  EDIT METHOD //
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



    //  UPDATE METHOD //
    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'employeeName'      => 'required',
                'dateStepIncrement' => 'required',
                'stepNo2'           => 'required',
            ]);

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


    //  DELETE METHOD //
    public function destroy($id)
    {
        $stepIncrement = StepIncrement::find($id);
        $stepIncrement->delete();

        return response()->json(['success' => true]);
    }
}
