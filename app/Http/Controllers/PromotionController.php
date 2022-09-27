<?php

namespace App\Http\Controllers;


use App\Promotion;
use App\Services\OfficeService;
use App\Pipes\PromotedEmployees;
use Yajra\DataTables\DataTables;
use App\Services\EmployeeService;
use Chefhasteeth\Pipeline\Pipeline;
use App\Pipes\AddNewPromotionForEmployee;
use App\Services\PlantillaPositionService;
use App\Pipes\CurrentPlantillaMarkAsVacant;
use App\Http\Requests\StorePromotionRequest;
use App\Pipes\CreateNewPlantillaForEmployee;
use App\Pipes\PromotedFilterByOffice;
use App\Pipes\PromotedFilterByYear;

final class PromotionController extends Controller
{
    public function __construct(private readonly OfficeService $officeService)
    {}

    public function list()
    {
        return Pipeline::make()
                    ->send(request()->all())
                    ->through([
                        PromotedEmployees::class,
                        PromotedFilterByOffice::class,
                        PromotedFilterByYear::class,
                    ])->then(
                        fn($promotions) => DataTables::of($promotions->get())
                                    ->addColumn('promotion_date', fn ($record) => date('F d, Y', strtotime($record->promotion_date)))
                                    ->addColumn('office', fn ($record) => $record->new_plantilla_position->office->office_name)
                                    ->addColumn('employee', fn ($record) => $record->employee->fullname)
                                    ->addColumn('old_plantilla_position', fn ($record) => $record->old_plantilla_position->position->Description)
                                    ->addColumn('new_plantilla_position', fn ($record) => $record->new_plantilla_position->position->Description)
                                    ->make(true)
                );
    }

    public function index()
    {
        return view('promotion.index', [
            'offices' => $this->officeService->offices(),
        ]);
    }

    public function show(Promotion $promotion, PlantillaPositionService $plantillaPositionService)
    {
        return view('promotion.show', [
            'promotion' => $promotion,
            'details'   => $plantillaPositionService->getDetails($promotion->newpp_id)->load('plantillas.Employee'),
        ]);
    }

    public function create(EmployeeService $service)
    {
        return view('promotion.create', [
            'employees' => $service->getEmployeeHavingPlantilla(),
            'offices'   => $this->officeService->offices(),
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
