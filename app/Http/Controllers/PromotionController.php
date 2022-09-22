<?php

namespace App\Http\Controllers;

use App\Office;
use App\Division;
use App\Employee;
use App\Position;
use App\Plantilla;
use App\Promotion;
use Carbon\Carbon;
use App\PlantillaPosition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\PromotionService;
use Illuminate\Support\Facades\DB;
use App\Services\SalaryGradeService;
use App\Services\PlantillaPositionService;
use App\Services\PlantillaPersonnelService;

class PromotionController extends Controller
{
    private readonly PlantillaPositionService $plantillaPositionService;

    public function __construct(public PlantillaPersonnelService $plantillaPersonnelService, public PromotionService $promotionService, public SalaryGradeService $salaryGradeService)
    {
        $this->plantillaPositionService = app()->make(PlantillaPositionService::class);
    }

    public function list(string $office = '*', string $year = '*')
    {
        $promotions = Promotion::with(['employee', 'old_plantilla_position', 'old_plantilla_position.position', 'new_plantilla_position.position']);

        if($office !== '*') {
            $promotions->whereHas('new_plantilla_position', fn ($query) => $query->where('office_code', $office));
        }

        if ($year != '*') {
            $promotions->where('sg_year', $year);
        }


        return DataTables::of($promotions->get())
            ->addColumn('promotion_date', function ($record) {
                return date('F d, Y', strtotime($record->promotion_date));
            })
            ->addColumn('office', function ($record) {
                return $record->new_plantilla_position->office->office_name;
            })
            ->addColumn('employee', function ($record) {
                return $record->employee->fullname;
            })
            ->addColumn('old_plantilla_position', function ($record) {
                return $record->old_plantilla_position->position->Description;
            })
            ->addColumn('new_plantilla_position', function ($record) {
                return $record->new_plantilla_position->position->Description;
            })
            ->make(true);
    }

    public function index()
    {
        $offices = Office::get();
        $minYear = date('Y') - 5;
        $maxYear = date('Y');
        $rangeYear = range($minYear, $maxYear);
        rsort($rangeYear);

        return view('promotion.index', [
            'offices'   => $offices,
            'rangeYear' => $rangeYear,
            'class'     => 'mini-sidebar',
        ]);
    }

    public function show(int $promotion)
    {
        $promotion = Promotion::find($promotion);
        $details = $this->plantillaPositionService->getPlantillaPositionDetails($promotion->newpp_id)->load('plantillas.Employee');

        return view('promotion.show', [
            'promotion' => $promotion,
            'details' => $details,
        ]);
    }

    public function create()
    {
        $employees = Employee::without(['position', 'office_charging', 'office_assignment'])
            ->with('promotions')
            ->has('plantilla')
            ->permanent()
            ->active()
            ->orderBy('LastName')
            ->orderBy('FirstName')
            ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'PosCode', 'OfficeCode']);

        $offices = Office::get();

        return view('promotion.create', [
            'employees' => $employees,
            'offices' => $offices,
            'class' => 'mini-sidebar',
        ]);
    }

    public function store(Request $request)
    {

        // Validate form input
        $this->validate($request, [
            'employee' => ['required', 'exists:E_PIMS_CONNECTION.plantillas,employee_id'],
            'office' => ['required', 'exists:E_PIMS_CONNECTION.Offices,office_code'],
            'division' => ['nullable', 'exists:E_PIMS_CONNECTION.Divisions,division_name'],
            'section' => ['nullable', 'exists:E_PIMS_CONNECTION.Sections,section_name'],
            'position' => ['required'],
            'status' => ['required', 'in:Permanent,Casual,Coterminous,Provisional,Temporary'],
            'item_no' => ['required', 'integer'],
            'old_item_no' => ['required', 'integer'],
            'current_salary_grade_year' => ['required', 'digits:4', 'integer'],
            'salary_grade' => ['required', 'integer', 'min:1', 'max:33'],
            'step' => ['required', 'integer', 'min:1', 'max:8'],
            'salary_amount' => ['required'],
            'original_appointment' => ['required', 'date', 'before:last_promotion'],
            'last_promotion' => ['required', 'date', 'after:original_appointment'],
            'area_code' => ['required'],
            'area_type' => ['required'],
            'area_level' => ['required'],
        ], [], [
            'employee' => 'employee name',
        ]);

        foreach(['area_code','area_type','area_level','division'] as $keyToRemove) {
            $request->request->remove($keyToRemove);
        }

        $employeeLatestPlantilla = Plantilla::where('employee_id', $request->employee)
            ->orderBy('year', 'DESC')
            ->first();

        DB::transaction(function () use ($request, $employeeLatestPlantilla) {
            /**
             * CURRENT PLANTILLA *
             * Blank old_item_no & employee_id
             */
            $employeeLatestPlantilla->old_item_no = null;
            $employeeLatestPlantilla->employee_id = null;
            $employeeLatestPlantilla->save();

            /**
             * NEW PLANTILLA
             * TRANSFER THE CURRENT OLD_ITEM_NO OF PLANTILLA TO NEW
             * UPDATE OLD_ITEM_NO
             * UPDATE EMPLOYEE_iD
             */
            $this->plantillaPersonnelService->addNewPlantilla($request->all());

            // Promotion add new record.
            $this->promotionService->store($employeeLatestPlantilla->pp_id, $request->all());


            /* Updating the current service record of the employee soon to be previous record. */
            $currentServiceRecord = $this->promotionService->getCurrentServiceRecord($request->employee);

            if($currentServiceRecord) {
                $currentServiceRecord->service_to_date = Carbon::parse($request->last_promotion)->subDays(1);
                $currentServiceRecord->save();
            }

            /* Creating a new record in the service_record table. */
            $plantillaPosition = PlantillaPosition::find($request->position);

            /* Creating a new record in the service_record table. */
            $this->promotionService->addNewRecord([
                'employee_id'       => $request->employee,
                'service_from_date' => $request->last_promotion,
                'PosCode'           => $plantillaPosition->PosCode,
                'status'            => $request->status,
                'salary'            => Str::remove(',', $request->salary_amount),
                'office_code'       => $plantillaPosition->office_code,
            ]);
        });

        return back()->with('success', 'You successfully promote a employee');
    }

    public function edit(int $promotionID)
    {
        $offices = Office::get();
        $positions = Position::get();
        $promotion = Promotion::with(['employee', 'new_plantilla_position', 'new_plantilla_position.plantillas', 'new_plantilla_position.plantillas.plantilla_positions', 'new_plantilla_position.plantillas.plantilla_positions.position'])->find($promotionID);
        $employeeStatus = ['Permanent', 'Casual', 'Coterminous', 'Provisional', 'Temporary'];
        $areaCode = Plantilla::REGIONS;
        $areaType = Plantilla::AREA_TYPES;
        $areaLevel = Plantilla::AREA_LEVELS;

        return view('promotion.edit', [
            'positions' => $positions,
            'promotion' => $promotion,
            'offices' => $offices,
            'areaCode' => $areaCode,
            'areaType' => $areaType,
            'areaLevel' => $areaLevel,
            'employeeStatus' => $employeeStatus,
            'class' => 'mini-sidebar',
        ]);
    }

    public function update(Request $request, int $promotionID)
    {
        $this->validate($request, [
            'office' => ['required', 'exists:E_PIMS_CONNECTION.Offices,office_code'],
            'division' => ['required', 'exists:E_PIMS_CONNECTION.Divisions,division_id'],
            'status' => ['required', 'in:Permanent,Casual,Coterminous,Provisional,Temporary'],
            'item_no' => ['required', 'integer'],
            'old_item_no' => ['required', 'integer'],
            'current_salary_grade_year' => ['required', 'digits:4', 'integer'],
            'salary_grade' => ['required', 'integer', 'min:1', 'max:33'],
            'step' => ['required', 'integer', 'min:1', 'max:8'],
            'salary_amount' => ['required'],
            'original_appointment' => ['required', 'date', 'before:last_promotion'],
            'last_promotion' => ['required', 'date', 'after:original_appointment'],
            'area_code' => ['required', 'in:'.implode(',', Plantilla::REGIONS)],
            'area_type' => ['required', 'in:'.implode(',', Plantilla::AREA_TYPES)],
            'area_level' => ['required', 'in:'.implode(',', Plantilla::AREA_LEVELS)],
        ]);


        $promotion = Promotion::with(['new_plantilla_position', 'new_plantilla_position.plantillas'])->find($promotionID);

        if (! is_null($request->position)) {
            $this->promotionService->changePositionInPromotion($promotion, $request->all());
            $plantillaPosition = PlantillaPosition::find($request->position);
            $this->promotionService->getCurrentServiceRecord($promotion->employee_id)->update([
                'employee_id' => $promotion->employee_id,
                'service_from_date' => $request->last_promotion,
                'PosCode' => $plantillaPosition->PosCode,
                'status' => $request->status,
                'salary' => Str::remove(',', $request->salary_amount),
                'office_code' => $request->office,
            ]);
        } else {
            $this->promotionService->updatePromotion($promotion, $request->all());
            $this->promotionService->getCurrentServiceRecord($promotion->employee_id)->update([
                'service_from_date' => $request->last_promotion,
                'status' => $request->status,
            ]);
        }

        /* Updating the service record of the employee. */

        return back()->with('success', 'You successfully update a promotion');
    }

    // public function destroy(Request $request, int $promotionID)
    // {
    //     return response()->json(['success' => true]);
    // }
}
