<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use App\SalaryAdjustment;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Jobs\SalaryAdjustmentJob;
use Illuminate\Support\Facades\DB;

class SalaryAdjustmentMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillaOffices = Plantilla::select('office_code')
        ->distinct('office_code')
        ->with(['office', 'office.desc'])
        ->orderBy('office_code', 'ASC')
        ->get();

    $dates = SalaryAdjustment::select('date_adjustment')->whereYear('date_adjustment', '!=', date('Y'))
        ->get()
        ->pluck('date_adjustment')
        ->map(fn ($adjustment) => $adjustment->format('Y'))
        ->unique();
    $class = 'mini-sidebar';
        return view('SalaryAdjustment.SalaryAdjustmentMain', compact('plantillaOffices', 'dates', 'class'));
    }


    public function list($office){

            // $yearDeduct = Carbon::now()->subYear(1)->format('Y');
            $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) {
            $query->whereYear('date_adjustment', Carbon::now()->format('Y'));
            })->with('Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment','office')
            ->where('Employee_id', '!=', null)
            ->where('year', Carbon::now()->format('Y'));

            if (request()->ajax()) {
                $datas = ($office != '*') ? $data->where('office_code', $office)->get()
                : $data->get();

                return DataTables::of($datas)
                ->addColumn('fullname', function ($row) {
                    return $row->Employee->fullname;
                })
                ->addColumn('office', function ($row) {
                    return $row->office->office_name;
                })
                ->addColumn('position', function ($row) {
                    return $row->plantilla_positions->position->Description;
                })
                ->addColumn('office', function ($row) {
                    return $row->office->office_name;
                })
                ->addColumn('salary_difference', function ($row) {
                    $diff = $row->salary_amount - $row->salary_amount_previous;
                    return $diff;
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

        //copy previous year data in plantilla

        // $currentYear = date('Y');
        // $fetchYear = date('Y') - 1;

        // if(request()->office == '*'){
        //     $data = Plantilla::with('plantilla_positions');
        // } else {
        //     $data = Plantilla::with('plantilla_positions')->where('office_code', request()->office);
        // }
        // $data->where('year', $fetchYear)->get()->each(function ($record) use ($currentYear) {
        //     $currentData = $record->getAttributes();
        //     $currentData['plantilla_id'] = tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue;
        //     $currentData['year'] = $currentYear;

        //     $getsalaryResult = SalaryGrade::where('sg_no', $currentData['sg_no'])
        //         ->where('sg_year', Carbon::now()->format('Y'))
        //         ->first(['sg_step'.$currentData['step_no']]);

        //     $currentData['salary_amount_previous'] = $currentData['salary_amount'];
        //     $currentData['salary_amount_previous_yearly'] = $currentData['salary_amount_yearly'];

        //     $currentData['salary_amount'] = $getsalaryResult['sg_step'.$currentData['step_no']];
        //     $currentData['salary_amount_yearly'] = $getsalaryResult['sg_step'.$currentData['step_no']] * 12;
        //     unset($currentData['created_at']);
        //     unset($currentData['updated_at']);

        //     Plantilla::updateOrCreate([
        //         'year' => $currentData['year'],
        //         'status' => $currentData['status'],
        //         'office_code' => $currentData['office_code'],
        //         'employee_id' => $currentData['employee_id'],
        //         'pp_id' => $currentData['pp_id'],
        //     ], $currentData);
        // });


        // // adjust salary per office
        // $yearDeduct = Carbon::now()->subYear(1)->format('Y');
        // $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) {
        // $query->whereYear('year', '!=', Carbon::now()->format('Y'));
        // })->with('Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment','office')
        // ->where('Employee_id', '!=', null)
        // ->where('year', $yearDeduct);
        // $datas = (request()->office != '*') ? $data->where('office_code', request()->office)->get()
        //         : $data->get();
        // $newAdjustment = $datas->toArray();


        // foreach ($newAdjustment as $newAdjustments) {


        //     $getsalaryResult = SalaryGrade::where('sg_no', $newAdjustments['sg_no'])
        //         ->where('sg_year', Carbon::now()->format('Y'))
        //         ->first(['sg_step'.$newAdjustments['step_no']]);
        //     $salaryDiff = $getsalaryResult['sg_step'.$newAdjustments['step_no']] - $newAdjustments['salary_amount'];
        //     $dateCheck = request()->remarks;
        //     if ($dateCheck == '') {
        //         $remarks = 'Salary Adjustment';
        //     } else {
        //         $remarks = request()->remarks;
        //     }
        //     DB::table('EPims.dbo.salary_adjustments')->insert(
        //         [
        //             'id' => tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue,
        //             'employee_id' => $newAdjustments['employee_id'],
        //             'office_code' => $newAdjustments['office_code'],
        //             'item_no' => $newAdjustments['item_no'],
        //             'pp_id' => $newAdjustments['pp_id'],
        //             'date_adjustment' => request()->dateAdjustment,
        //             'sg_no' => $newAdjustments['sg_no'],
        //             'step_no' => $newAdjustments['step_no'],
        //             'old_sg_no' => $newAdjustments['sg_no'],
        //             'old_step_no' => $newAdjustments['step_no'],
        //             'salary_previous' => $newAdjustments['salary_amount'],
        //             'salary_new' => $getsalaryResult['sg_step'.$newAdjustments['step_no']],
        //             'salary_diff' => $salaryDiff,
        //             'remarks' => $remarks,
        //             'created_at' => Carbon::now(),
        //             'deleted_at' => null,
        //         ]
        //     );



        //     /* Updating the current service record of the employee soon to be previous record. */
        //     $serviceToDate = Carbon::parse(request()->dateAdjustment)->subDays(1);
        //     DB::table('EPims.dbo.service_records')->select('employee_id', 'service_from_date', 'service_to_date')->where('employee_id', $newAdjustments['employee_id'])->where('service_to_date', null)->latest('service_from_date')
        //     ->update(['service_to_date' => $serviceToDate]);

        //     DB::table('EPims.dbo.service_records')->insert(
        //         [
        //             'id' => tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue,
        //             'employee_id' => $newAdjustments['employee']['Employee_id'],
        //             'service_from_date' => request()->dateAdjustment,
        //             'PosCode' => $newAdjustments['plantilla_positions']['PosCode'],
        //             'status' => $newAdjustments['status'],
        //             'salary' => $getsalaryResult['sg_step'.$newAdjustments['step_no']],
        //             'office_code' => $newAdjustments['office_code'],
        //             'separation_cause' => $remarks,
        //             'created_at' => Carbon::now(),
        //         ]
        //     );
        // }


        //  $yearDeduct = Carbon::now()->subYear(1)->format('Y');
         $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) {
         $query->whereYear('date_adjustment', Carbon::now()->format('Y'));
         })->with('Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment','office')
         ->where('Employee_id', '!=', null)
         ->where('year', Carbon::now()->format('Y'));

         $datas = (request()->office != '*') ? $data->where('office_code', request()->office)->get()
                 : $data->get();
         $newAdjustment = $datas->toArray();

         $remark = request()->remarks;

         $dateAdjustment = request()->dateAdjustment;
         foreach ($newAdjustment as $newAdjustments) {
            SalaryAdjustmentJob::dispatch($newAdjustments,$remark,$dateAdjustment);
        }
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
