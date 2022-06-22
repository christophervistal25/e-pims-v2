<?php

namespace App\Http\Controllers;

use App\Office;
use App\Setting;
use App\Division;
use App\Employee;
use App\Plantilla;
use App\Promotion;
use Carbon\Carbon;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\EmployeeService;
use App\Services\PromotionService;
use Illuminate\Support\Facades\DB;
use App\Services\PlantillaPersonnelService;

class PromotionController extends Controller
{
      public function __construct(public PlantillaPersonnelService $plantillaPersonnelService, public PromotionService $promotionService)
      {

      }

      public function list(string $office = '*', string $year = '*')
      {
            $promotions = Promotion::with(['employee', 'old_plantilla_position', 'old_plantilla_position.position', 'new_plantilla_position.position']);

            if($office != '*') {
                  $promotions->whereHas('employee', function ($query) use($office) {
                        $query->where('OfficeCode', $office);
                  });
            }

            if($year != '*') {
                  $promotions->where('sg_year', $year);
            }

            return DataTables::of($promotions->get())
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
                  'offices' => $offices,
                  'rangeYear' => $rangeYear
            ]);
      }

      public function create()
      {
            $employees = Employee::without(['position', 'office_charging', 'office_assignment'])
                  ->permanent()
                  ->active()
                  ->orderBy('LastName')
                  ->orderBy('FirstName')
                  ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'PosCode', 'OfficeCode']);

            $offices = Office::get();

            $employeeStatus = ['Permanent', 'Casual', 'Coterminous', 'Provisional', 'Temporary'];
            
            $areaCode = Plantilla::REGIONS;

            $areaType = ['Region', 'Province', 'District', 'Municipality', 'Foreign Post'];

            $areaLevel = ['K', 'T', 'S', 'A'];

            return view('promotion.create', [
                  'employees' => $employees,
                  'offices' => $offices,
                  'areaCode' => $areaCode,
                  'areaType' => $areaType,
                  'areaLevel' => $areaLevel,
                  'employeeStatus' => $employeeStatus,
                  // 'class' => 'mini-sidebar',
            ]);
      }

      public function store(Request $request)
      {
            $employeeLatestPlantilla = Plantilla::where('employee_id', $request->employee)
                                                            ->orderBy('year', 'DESC')
                                                            ->first();

            DB::transaction(function () use($request, $employeeLatestPlantilla) {

                  /* Creating a new promotion. */
                  $this->promotionService->store($employeeLatestPlantilla->pp_id, $request->all());

                  /* Adding a new plantilla for the employee. */
                  $this->plantillaPersonnelService->addNewPlantilla($employeeLatestPlantilla, $request->all());

                  /* Removing the current plantilla of the employee. */
                  $this->plantillaPersonnelService->removeCurrentPlantilla($employeeLatestPlantilla);


            });

            return back()->with('success', 'You successfully promote a employee');
      }
}
