<?php

namespace App\Http\Controllers\Api;

use App\Setting;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class SalaryAdjustmentPerOfficeController extends Controller
{
    public function plantillaWithAdjustment(string $office, string $year = null)
    {
            $data = Plantilla::whereHas('salary_adjustment', function ($query)  use($year) {
                  $query->whereYear('date_adjustment', $year);
            })->with(['Employee', 'salary_adjustment' => function ($query) use($year) {
                  $query->whereYear('date_adjustment', $year);
            }, 'office' => function ($query) use($office) {
                  $query->where('office_code', $office);
            }])->where('office_code', $office)
            ->where('year', $year)
            ->get();

            return DataTables::of($data)
                  ->make(true);
    }

    public function plantillaWithoutAdjustment(string $office, string $year)
    {
        $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) use($year) {
            $query->whereYear('date_adjustment', $year);
        })->with(['Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment' => function ($query) use($year) {
            $query->whereYear('date_adjustment', $year);
        }, 'office'])->where('year', $year)
            ->where('office_code', $office)
            ->get();

        return DataTables::of($data)
            ->editColumn('checkbox', function ($row) {
                $checkbox = "<input id='checkbox{$row}' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla_id}' type='checkbox' />";
                return $checkbox;
            })->rawColumns(['checkbox'])
            ->make(true);
    }

    public function AddNewDatas()
    {
        $plantillaIds = explode(',', request()->ids);
        $data = Plantilla::whereIn('plantilla_id', $plantillaIds)->get();
        $newAdjustment = $data->toArray();
        foreach ($newAdjustment as $newAdjustments) {

            $getsalaryResult = SalaryGrade::where('sg_no', $newAdjustments['sg_no'])
                ->where('sg_year', request()->year)
                ->first(['sg_step' .  $newAdjustments['step_no']]);
            $salaryDiff = $getsalaryResult['sg_step' .  $newAdjustments['step_no']] - $newAdjustments['salary_amount'];
            $datas = DB::table('settings')->where('Keyname', 'AUTONUMBER2')->first();
                DB::table('salary_adjustments')->insert(
                [
                    'id'              => $datas->Keyvalue,
                    'employee_id'     => $newAdjustments['employee_id'],
                    'office_code'     => $newAdjustments['office_code'],
                    'item_no'         => $newAdjustments['item_no'],
                    'pp_id'           => $newAdjustments['pp_id'],
                    'date_adjustment' => request()->date,
                    'sg_no'           => $newAdjustments['sg_no'],
                    'step_no'         => $newAdjustments['step_no'],
                    'salary_previous' => $newAdjustments['salary_amount'],
                    'salary_new'      => $getsalaryResult['sg_step' .  $newAdjustments['step_no']],
                    'salary_diff'     => $salaryDiff,
                    'remarks'         =>  request()->remarks,
                    'created_at'      =>  Carbon::now(),
                    'deleted_at'      => null,
                ]
            );
            Setting::find('AUTONUMBER2')->increment('Keyvalue');
            // salary adjustment per office save to service record
            // DB::table('service_records')->updateOrInsert(
            //     [
            //         'employee_id' => $newAdjustment->employee_id,
            //         'position_id' =>  $newAdjustment->plantillaPosition->position_id,
            //     ],
            //     [
            //         'employee_id'               => $newAdjustment->employee_id,
            //         'service_from_date'         => request()->date,
            //         'position_id'               => $newAdjustment->plantillaPosition->position_id,
            //         'status'                    => $newAdjustment->status,
            //         'salary'                    => $getsalaryResult['sg_step' .  $newAdjustment->step_no],
            //         'office_code'               => $newAdjustment->office_code,
            //     ]
            // );
        }
        return response()->json(['success' => true]);
    }


}
