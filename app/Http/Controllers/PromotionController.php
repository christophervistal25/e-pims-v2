<?php

namespace App\Http\Controllers;


use App\Promotion;
use App\Services\OfficeService;
use App\Pipes\PromotedEmployees;
use App\Services\EmployeeService;
use App\Pipes\PromotedFilterByYear;
use Chefhasteeth\Pipeline\Pipeline;
use App\Pipes\PromotedFilterByOffice;
use App\Pipes\PromotedListByDatatables;
use App\Pipes\AddNewPromotionForEmployee;
use App\Pipes\AddPromotionToServiceRecord;
use App\Services\PlantillaPositionService;
use App\Pipes\CurrentPlantillaMarkAsVacant;
use App\Http\Requests\StorePromotionRequest;
use App\Pipes\CreateNewPlantillaForEmployee;

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
                    PromotedListByDatatables::class,
                ])->then(fn ($records) => $records);
    }

    public function index()
    {
        return view('promotion.index')->with('offices', $this->officeService->offices());
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
                        AddPromotionToServiceRecord::class,
                    ])->then(fn() => back()->with('success', 'Employee promoted successfully'));
    }

}
