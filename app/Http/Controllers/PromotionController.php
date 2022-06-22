<?php

namespace App\Http\Controllers;

use App\Office;
use App\Division;
use App\Employee;
use App\Plantilla;
use App\PlantillaPosition;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

class PromotionController extends Controller
{
      public function index()
      {
            $offices = Office::get();
            $minYear = date('Y') - 5;
            $maxYear = date('Y');

            return view('promotion.index', [
                  'offices' => $offices,
                  'minYear' => $minYear,
                  'maxYear' => $maxYear
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

            $employeeStatus = ['Casual', 'Coterminous', 'Permanent', 'Provisional', 'Temporary'];
            
            $areaCode = ['Region 1', 'Region 2', 'Region 3', 'Region 4', 'Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12', 'NCR', 'CAR', 'CARAGA', 'ARMM'];
      
            $areaType = ['Region', 'Province', 'District', 'Municipality', 'Foreign Post'];

            $areaLevel = ['K', 'T', 'S', 'A'];

            return view('promotion.create', [
                  'employees' => $employees,
                  'offices' => $offices,
                  'areaCode' => $areaCode,
                  'areaType' => $areaType,
                  'areaLevel' => $areaLevel,
                  'employeeStatus' => $employeeStatus
                  // 'class' => 'mini-sidebar',
            ]);
      }

      public function store(Request $request)
      {
            $latestPlantillaOfEmployee = Plantilla::has('plantilla_positions')
                                                            ->where('employee_id', $request->employee)
                                                            ->orderBy('year', 'DESC')
                                                            ->first();
            // Delete plantilla of personnel
            // Insert in Promotions table
             
            dd($latestPlantillaOfEmployee);
      }
}
