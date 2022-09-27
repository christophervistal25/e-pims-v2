<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Plantilla;
use App\SalaryGrade;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SalaryAdjustmentPerOfficeController extends Controller
{
    public function plantillaWithAdjustment(string $office, string $year = null)
    {
        $data = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
            $query->whereYear('date_adjustment', $year);
        })->with(['Employee', 'salary_adjustment' => function ($query) use ($year) {
            $query->whereYear('date_adjustment', $year);
        }, 'office' => function ($query) use ($office) {
            $query->where('office_code', $office);
        }])->where('office_code', $office)
            ->where('year', $year)
            ->get();

        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $btn = "<a title='Edit Salary Adjustment' href='".route('salary-adjustment-per-office.edit', $row->salary_adjustment[0]->id)."' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='".$row->salary_adjustment[0]->id."' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        ";

                return $btn;
            })
           ->rawColumns(['action'])
        ->make(true);
    }

    public function plantillaWithoutAdjustment(string $office, string $year)
    {
        $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) use ($year) {
            $query->whereYear('date_adjustment', $year);
        })->with(['Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment'
        => function($query) use ($year) {$query->whereYear('date_adjustment', $year); },'office'])
        ->where('Employee_id', '!=', null)
        ->where('year', $year)
        ->where('office_code', $office)
        ->get();


        return DataTables::of($data)
            ->editColumn('checkbox', function ($row) {
                $checkbox = "<input id='checkbox{$row}' name='checkboxNotSelected' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
                // $checkbox = "<input id='checkbox{$row}' name='checkboxNotSelected' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
                return $checkbox;
            })->rawColumns(['checkbox'])
            ->make(true);
    }

    public function AddNewDatas()
    {
        $plantillaIds = explode(',', request()->ids);
        $data = Plantilla::with('plantilla_positions', 'plantilla_positions.position')->whereIn('plantilla_id', $plantillaIds)->get();
        $newAdjustment = $data->toArray();
        foreach ($newAdjustment as $newAdjustments) {
            $getsalaryResult = SalaryGrade::where('sg_no', $newAdjustments['sg_no'])
                ->where('sg_year', request()->year)
                ->first(['sg_step'.$newAdjustments['step_no']]);
            $salaryDiff = $getsalaryResult['sg_step'.$newAdjustments['step_no']] - $newAdjustments['salary_amount'];
            $dateCheck = request()->remarks;
            if ($dateCheck == '') {
                $remarks = 'Salary Adjustment';
            } else {
                $remarks = request()->remarks;
            }
            $datas = DB::table('EPims.dbo.settings')->where('Keyname', 'AUTONUMBER2')->first();
            DB::table('EPims.dbo.salary_adjustments')->insert(
                [
                    'id' => $datas->Keyvalue,
                    'employee_id' => $newAdjustments['employee_id'],
                    'office_code' => $newAdjustments['office_code'],
                    'item_no' => $newAdjustments['item_no'],
                    'pp_id' => $newAdjustments['pp_id'],
                    'date_adjustment' => request()->date,
                    'sg_no' => $newAdjustments['sg_no'],
                    'step_no' => $newAdjustments['step_no'],
                    'salary_previous' => $newAdjustments['salary_amount'],
                    'salary_new' => $getsalaryResult['sg_step'.$newAdjustments['step_no']],
                    'salary_diff' => $salaryDiff,
                    'remarks' => $remarks,
                    'created_at' => Carbon::now(),
                    'deleted_at' => null,
                ]
            );
            Setting::find('AUTONUMBER2')->increment('Keyvalue');

            // /* Updating the current service record of the employee soon to be previous record. */
            $serviceToDate = Carbon::parse(request()->date)->subDays(1);
            DB::table('EPims.dbo.service_records')->select('employee_id', 'service_from_date', 'service_to_date')->where('employee_id', $newAdjustments['employee_id'])->where('service_to_date', null)->latest('service_from_date')
            ->update(['service_to_date' => $serviceToDate]);
            // salary adjustment per office save to service record
            $datas = DB::table('EPims.dbo.settings')->where('Keyname', 'AUTONUMBER2')->first();
            DB::table('EPims.dbo.service_records')->insert(
                [
                    'id' => $datas->Keyvalue,
                    'employee_id' => $newAdjustments['employee_id'],
                    'service_from_date' => request()->date,
                    'PosCode' => $newAdjustments['plantilla_positions']['position']['PosCode'],
                    'status' => $newAdjustments['status'],
                    'salary' => $getsalaryResult['sg_step'.$newAdjustments['step_no']],
                    'office_code' => $newAdjustments['office_code'],
                    'separation_cause' => $remarks,
                    'created_at' => Carbon::now(),
                ]
            );
            Setting::find('AUTONUMBER2')->increment('Keyvalue');
        }

        return response()->json(['success' => true]);
    }
}
