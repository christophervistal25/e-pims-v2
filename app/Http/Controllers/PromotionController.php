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
use App\Services\EmployeeService;
use Illuminate\Support\Facades\DB;
use App\Services\PlantillaPersonnelService;

class PromotionController extends Controller
{
      public function __construct(public PlantillaPersonnelService $plantillaPersonnelService)
      {

      }

      public function index()
      {
            $offices = Office::get();
            $minYear = date('Y') - 5;
            $maxYear = date('Y');

            return view('promotion.index', [
                  'offices' => $offices,
                  'minYear' => $minYear,
                  'maxYear' => $maxYear,
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
                  Promotion::create([
                        'promotion_id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                        'promotion_date' => Carbon::now(),
                        'employee_id' => $request->employee,
                        'oldpp_id' => $employeeLatestPlantilla->pp_id,
                        'sg_no' => $request->salary_grade,
                        'step_no' => $request->step,
                        'sg_year' => $request->current_salary_grade_year,
                        'newpp_id' => $request->position
                  ]);

                  /* Adding a new plantilla for the employee. */
                  $this->plantillaPersonnelService->addNewPlantilla($employeeLatestPlantilla, $request->all());

                  /* Removing the current plantilla of the employee. */
                  $this->plantillaPersonnelService->removeCurrentPlantilla($employeeLatestPlantilla);

            });

            return back()->with('success', 'You successfully promote a employee');
      }
}
