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
use Chefhasteeth\Pipeline\Pipeline;
use App\Pipes\AddNewPromotionForEmployee;
use App\Services\PlantillaPositionService;
use App\Pipes\CurrentPlantillaMarkAsVacant;
use App\Services\PlantillaPersonnelService;
use App\Http\Requests\StorePromotionRequest;
use App\Pipes\CreateNewPlantillaForEmployee;

class PromotionController extends Controller
{
    private readonly PlantillaPositionService $plantillaPositionService;

    public function __construct(private readonly PlantillaPersonnelService $plantillaPersonnelService, private readonly PromotionService $promotionService)
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
            ->addColumn('promotion_date', fn ($record) => date('F d, Y', strtotime($record->promotion_date)))
            ->addColumn('office', fn ($record) => $record->new_plantilla_position->office->office_name)
            ->addColumn('employee', fn ($record) => $record->employee->fullname)
            ->addColumn('old_plantilla_position', fn ($record) => $record->old_plantilla_position->position->Description)
            ->addColumn('new_plantilla_position', fn ($record) => $record->new_plantilla_position->position->Description)
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
        ]);
    }

    public function store(StorePromotionRequest $request)
    {
        return Pipeline::make()
                    ->withTransaction()
                    ->send($request->all())
                    ->through([
                        CurrentPlantillaMarkAsVacant::class,
                        CreateNewPlantillaForEmployee::class,
                        AddNewPromotionForEmployee::class,
                    ])->then(fn() => back()->with('success', 'Employee promoted successfully'));
    }

}
