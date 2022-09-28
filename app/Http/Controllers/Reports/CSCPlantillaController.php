<?php

namespace App\Http\Controllers\Reports;

use App\Employee;
use App\Plantilla;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\OfficeService;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use App\Reports\PlantillaDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\SalaryGradeService;
use App\Http\Requests\CSCPlantillaGenerateRequest;
use App\Services\Reports\PlantillaPositionService;

final class CSCPlantillaController extends Controller
{
    protected readonly SalaryGradeService $salaryGradeService;

    public function __construct(private readonly PlantillaPositionService $service, private readonly OfficeService $officeService)
    {
        $this->salaryGradeService = app()->make(SalaryGradeService::class);
    }

    public function list()
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->get();
        return Datatables::of($data)->make(true);
    }

    public function listShow(int $reportID, string $office = '*')
    {
        $data = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('R_Id', $reportID)
                        ->leftJoin('DTRPayroll.dbo.Employees', 'Plantilla_Reports_Details.employee_id', '=', 'Employees.Employee_id')
                        ->leftJoin('plantilla_positions', 'Plantilla_Reports_Details.pp_id', '=', 'plantilla_positions.pp_id')
                        ->leftJoin('Offices', 'Plantilla_Reports_Details.office_code', '=', 'Offices.office_code')
                        ->join('Positions', 'plantilla_positions.PosCode', '=', 'Positions.PosCode')
                        ->select(
                            'Plantilla_Reports_Details.*',
                            'plantilla_positions.pp_id', 'plantilla_positions.PosCode',
                            'Positions.PosCode', 'Positions.Description',
                            'Offices.office_name', 'Offices.office_short_name',
                            DB::raw("CONCAT(FirstName, ' ' , MiddleName , ' ',  LastName, Suffix) AS fullname"),
                        );


        if($office !== '*') {
            $data->where('Plantilla_Reports_Details.office_code', $office);
        }

        return Datatables::of($data->get())->addColumn('fullname', function ($record) {
            if(!($record->employee_id)) {
                return 'VACANT';
            }
            return $record->fullname;
        })->make(true);
    }

    public function vacant(int $id)
    {
        DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('Id', $id)->update([
            'date_original_appointment' => null,
            'date_last_promotion'       => null,
            'date_last_increment'       => null,
            'employee_id'               => null,
        ]);

        return response()->json(['success' => true]);
    }

    public function index()
    {
        return view('reports.plantilla.index', [
            'class' => 'mini-sidebar',
            'years' => range(2015, date('Y') + 1),
            'reports' => $this->service->getReports(),
        ]);
    }

    public function generate(CSCPlantillaGenerateRequest $request)
    {
        if($request->plantillaType === 'DBM') {
            DB::transaction(function () use($request) {
                DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->insert([
                    'Year'           => $request->year,
                    'Asof_date'      => $request->asOfDate,
                    'Description'    => $request->description,
                    'Plantilla_type' => $request->plantillaType,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                ]);

                $data = $this->service->getByYearForDBM($request->year);

                $records = json_decode($data, true);

                data_set($records, '*.R_Id', DB::connection('E_PIMS_CONNECTION')->getPdo()->lastInsertId(), true);
                foreach($records as &$record) {
                    if($record['date_last_increment'] && $record['step_no'] < 8) {
                        // Check the if range as of date then add 3 years
                        $startOfYear = Carbon::parse($request->asOfDate)->subYears(3)->startOfYear();
                        $endOfYear   = Carbon::parse($request->asOfDate)->endOfYear();

                        $employeeLastIncrement = Carbon::parse($record['date_last_increment'])->addYears(3);

                        if($employeeLastIncrement->between($startOfYear, $endOfYear)) {
                            $asOfDateOnlyYear = Carbon::parse($request->asOfDate)->format('Y');
                            if(in_array($asOfDateOnlyYear, $this->salaryGradeService->yearsAvailable())) {
                                $record['step_no_previous']              = (int) $record['step_no'];
                                $record['sg_no_previous']                = (int) $record['sg_no'];
                                $record['salary_amount_previous']        = $record['salary_amount'];
                                $record['salary_amount_previous_yearly'] = $record['salary_amount_yearly'];
                                $record['step_no']                       = ++$record['step_no'];
                                $record['salary_amount']                 = Str::remove(',', $this->salaryGradeService->getSalaryAmount($record['sg_no'], $record['step_no'], $record['year']));
                                $record['salary_amount_yearly']          = Str::remove(',', $this->salaryGradeService->getSalaryAmount($record['sg_no'], $record['step_no'], $record['year'])) * 12;
                                $record['date_last_increment']           = Carbon::parse($record['date_last_increment'])->addYears(3)->format('Y-m-d');
                            }
                        }
                    }
                }
                $chunkedRecords = array_chunk($records, 20);
                foreach($chunkedRecords as $records) {
                    DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->insert($records);
                }
            });
        } else {
            DB::transaction(function () use($request) {
                DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->insert([
                    'Year'           => $request->year,
                    'Asof_date'      => $request->asOfDate,
                    'Description'    => $request->description,
                    'Plantilla_type' => $request->plantillaType,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                ]);

                $data = $this->service->getByYear($request->year);

                $records = json_decode($data, true);

                data_set($records, '*.R_Id', DB::connection('E_PIMS_CONNECTION')->getPdo()->lastInsertId(), true);

                $chunkedRecords = array_chunk($records, 20);

                foreach($chunkedRecords as $records) {
                    DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->insert($records);
                }
            });
        }


        return response()->json(['success' => true]);
    }

    public function assigned(Request $request)
    {
        $VACANT_VALUES = 0;

        $employeeIDS = $request->employeeIDS;
        $ids = $request->ids;
        $vacantIndex = array_search($VACANT_VALUES, $employeeIDS);
        $employeePlantillaIndex = ($vacantIndex === 0) ? 1 : 0;

        $vacant = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('Id', $ids[$vacantIndex]);
        $employeePlantilla = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('Id', $ids[$employeePlantillaIndex]);

        $vacant->update([
            'date_last_promotion'       => $employeePlantilla->first()->date_last_promotion,
            'date_last_increment'       => $employeePlantilla->first()->date_last_increment,
            'date_original_appointment' => $employeePlantilla->first()->date_original_appointment,
            'old_item_no'               => $employeePlantilla->first()->item_no,
            'employee_id'               => $employeePlantilla->first()->employee_id,
            'step_no'                      => 1,
        ]);

        $employeePlantilla->update([
            'date_last_promotion'       => null,
            'date_last_increment'       => null,
            'date_original_appointment' => null,
            'old_item_no'               => null,
            'employee_id'               => null,
            'step_no_previous'          => $employeePlantilla->first()->step_no,
            'step_no'                      => 1,
        ]);

        return response()->json(['success' => true]);
    }

    public function show(int $reportID)
    {
        $report = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->where('Id', $reportID)->first();

        $employees = Employee::without(['position', 'office_charging', 'office_assignment'])
            ->permanent()
            ->orderBy('LastName')
            ->orderBy('FirstName')
            ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'PosCode', 'OfficeCode']);

        return view('reports.plantilla.show', [
            'reportID' => $reportID,
            'offices' => $this->officeService->offices(),
            'employees' => $employees,
        ]);
    }

    public function filled(Request $request)
    {
        $this->validate($request, [
            'employee' => ['required'],
            // 'employee' => ['required', Rule::unique('E_PIMS_CONNECTION.dbo.Plantilla_Reports_Details', 'employee_id')->ignore($request->detailID)]
        ]);

        $detail = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('Id', $request->detailID)->update([
            'old_item_no'                   => $request->oldItemNo,
            'item_no'                       => $request->itemNo,
            'status'                        => $request->status,
            'year'                          => $request->currentSgyear,
            'sg_no'                         => $request->currentSalarygrade,
            'step_no'                       => $request->stepNo,
            "salary_amount"                 => Str::remove(",", $this->salaryGradeService->getSalaryAmount($request->currentSalarygrade, $request->stepNo, $request->currentSgyear)),
            "salary_amount_yearly"          => Str::remove(",", $this->salaryGradeService->getSalaryAmount($request->currentSalarygrade, $request->stepNo, $request->currentSgyear)) * 12,
            "sg_no_previous"                => $request->salaryGradePrevious,
            "step_no_previous"              => $request->stepNoPrevious,
            "salary_amount_previous"        => Str::remove(",", $this->salaryGradeService->getSalaryAmount($request->salaryGradePrevious, $request->stepNoPrevious, $request->currentSgyear)),
            "salary_amount_previous_yearly" => Str::remove(",", $this->salaryGradeService->getSalaryAmount($request->salaryGradePrevious, $request->stepNoPrevious, $request->currentSgyear)) * 12,
            "employee_id"                   => $request->employee,
            "date_original_appointment"     => $request->originalAppointment,
            "date_last_promotion"           => $request->lastPromotion,
            "date_last_increment"           => $request->lastStepIncrement,
        ]);
        return $detail;
    }

    public function viewDetails(int $id)
    {

        $record = PlantillaDetails::find($id);

        $plantilla = Plantilla::with(['office', 'plantilla_positions', 'plantilla_positions.division', 'plantilla_positions.section', 'plantilla_positions.Position', 'plantilla_positions.section', 'plantilla_positions.division'])->where('year', $record->year)->find($record->plantilla_id);

        return response()->json(['report_details' => $record, 'plantilla' => $plantilla]);
    }

    public function checkpoint(Request $request)
    {
        $report = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')
                        ->where(['Plantilla_type' => $request->plantillaType, 'Year' => $request->year]);

        return response()->json(['exists' => false, 'report' => $report->first()]);
    }

    public function remove(int $id)
    {
        DB::transaction(function () use($id) {
            DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->where('Id', $id)->delete();
            DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports_Details')->where('R_Id', $id)->delete();
        });
        return response()->json(['success' => true]);
    }
}
