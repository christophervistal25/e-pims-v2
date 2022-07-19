<?php

use App\Holiday;
use App\Division;
use App\Employee;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use App\StepIncrement;
use Carbon\CarbonPeriod;
use App\PositionSchedule;
use App\SalaryAdjustment;
use App\PlantillaPosition;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Services\SalaryGradeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\PlantillaController;
use App\Http\Controllers\StepIncrementController;
use App\Http\Controllers\ServiceRecordsController;
use App\Http\Controllers\PersonalDataSheetController;
use App\Http\Controllers\Api\PlantillaPositionController;
use App\Http\Controllers\DownloadPersonalDataSheetController;
use App\Http\Controllers\Api\SalaryAdjustmentPerOfficeController;
use App\Http\Controllers\Api\SalaryGradeController as APISalaryGradeController;

Route::group(['prefix' => 'personal-data-sheet'], function () {

      Route::controller(PersonalDataSheetController::class)->group(function () {
            // BEGINNING OF C1 ROUTES
            Route::get('information/fetch/{idNumber}', 'getPersonalInformation');
            Route::post('information/update/{idNumber}', 'updatePersonalInformation');

            Route::get('family-background/fetch/{idNumber}', 'getFamilyBackground');
            Route::post('family-background/update/{idNumber}', 'updateFamilyBackground');

            Route::get('educational-background/fetch/{idNumber}', 'getEducationalBackground');
            Route::post('educational-background/update/{idNumber}', 'updateEducationalBackground');
            // END OF C1 ROUTES

            // BEGINNING OF C2 ROUTES
            Route::get('civil-service-eligibility/fetch/{idNumber}', 'getCivilServiceEligibility');
            Route::post('civil-service-eligibility/update/{idNumber}', 'updateCivilServiceEligibility');

            Route::get('work-experience/fetch/{idNumber}', 'getWorkExperience');
            Route::post('work-experience/update/{idNumber}', 'updateWorkExperience');
            // END OF C2 ROUTES

            // BEGINNING OF C3 ROUTES
            Route::get('voluntary-work/fetch/{idNumber}', 'getVoluntaryWork');
            Route::post('voluntary-work/update/{idNumber}', 'updateVoluntaryWork');

            Route::get('learning-and-development/fetch/{idNumber}', 'getLearningAndDevelopment');
            Route::post('learning-and-development/update/{idNumber}', 'updateLearningAndDevelopment');

            Route::get('other-information/fetch/{idNumber}', 'getOtherInformation');
            Route::post('other-information/update/{idNumber}', 'updateOtherInformation');
            // END OF C3 ROUTES

            // BEGINNING OF C4 ROUTES
            Route::get('relevant-queries/fetch/{idNumber}', 'getRelevantQueries');
            Route::post('relevant-queries/update/{idNumber}', 'updateRelevantQueries');

            Route::get('references/fetch/{idNumber}', 'getReferences');
            Route::post('references/update/{idNumber}', 'updateReferences');

            Route::get('government-issued-id/fetch/{idNumber}', 'getGovernmentIssuedID');
            Route::post('government-issued-id/update/{idNumber}', 'updateGovernmentIssuedID');
            // END OF C4 ROUTES
      });

      Route::group(['prefix' => 'download', 'controller' => DownloadPersonalDataSheetController::class], function () {
            Route::get('{idNumber}', 'generate');
            Route::get('excel/{fileName}', 'excel');
            Route::get('pdf/{fileName}', 'pdf');
      });
});

Route::group(['namespace' => 'Api'], function () {

      Route::controller(PositionController::class)->group(function () {
            Route::get('positions', 'list');
            Route::get('position/lookup', 'lookup');
      });

      Route::controller(OfficeController::class)->group(function () {
            Route::get('offices', 'list');
      });

      Route::group(['prefix' => 'employee', 'controller' => EmployeeController::class], function () {
            Route::get('list/{charging?}/{assignment?}/{status?}/{active?}', 'list');
            Route::post('store', 'store');
            Route::get('find/{employeeID}', 'show');
            Route::put('{employeeID}/update',  'update');
            Route::get('find/ids/{employee_id?}',  'ids');
      });

      Route::group(['prefix' => 'province', 'controller' => ProvinceController::class], function () {
            Route::get('all', 'provinces');
            Route::get('cities/by/{code}', 'getCities');
      });

      Route::group(['prefix' => 'city', 'controller' => CityController::class], function () {
            Route::get('barangay/by/{code}', 'getBarangays');
      });

      Route::get('countries', [CountryController::class, 'index']);
});



Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}', 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}', 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}', 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}', 'Api\PlantillaController@cscPrevious');
Route::get('/positionSalaryGrade/{positionTitle}/{currentYear}', 'Api\PlantillaController@positionSalaryGrade');
Route::post('/addPosition', 'Api\PlantillaController@addPosition');

// service record
Route::get('/employee/service/records/{employeeId}', function ($employeeId) {
      $data = DB::table('service_records')->join('offices', 'service_records.office_code', '=', 'offices.office_code')
            ->join('Position', 'service_records.PosCode', '=', 'Position.PosCode')
            ->select('id', 'employee_id', DB::raw("FORMAT(service_from_date, 'MM-dd-yy') as service_from_date"), DB::raw("FORMAT(service_to_date, 'MM-dd-yy') as service_to_date"), 'Position.Description as position_name', 'status', 'salary', 'offices.office_name', 'leave_without_pay', DB::raw("FORMAT(separation_date, 'MM-dd-yy') as separation_date"), 'separation_cause')
            ->where('employee_id', $employeeId)
            ->whereNull('service_records.deleted_at')
            ->get();

      return DataTables::of($data)
            ->addColumn('action', function ($row) {
                  $btn = "<a title='Edit Service Record' href='" . route('service-records.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                  $btn = $btn . "<a title='Delete Service Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        ";
                  return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
});

Route::get('step/{sg_no}/{step}', function ($sgNo, $step) {
      $salaryGrade = SalaryGrade::where('sg_no', $sgNo)->first(['sg_step' . $step]);
      return $salaryGrade;
});




// salary adjustment
Route::get('/salaryAdjustment/{sg_no}/{sg_step?}/{sg_year}', 'Api\SalaryAdjustmentController@salaryAdjustment');
Route::post('/printEditAdjustment', 'Api\SalaryAdjustmentController@printEdit');
// salary adjustment individual
Route::get('/salary/adjustment/{year}', function ($year) {
      $data = DB::table('salary_adjustments')
            ->join('employees', 'salary_adjustments.employee_id', 'employees.employee_id')
            ->select('id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), DB::raw("DATE_FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff')
            ->whereYear('date_adjustment', '=', $year)
            ->orderBy('date_adjustment', 'DESC')
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->get();
      return DataTables::of($data)
            ->addColumn('action', function ($row) {
                  $btn = "<a title='Edit Salary Adjustment' href='" . route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                  $btn = $btn . "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
            ";
                  return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
});

// salary adjustment per office not selected
Route::group(['prefix' => 'salary-adjustment-per-office'], function () {
      Route::get('plantilla-with-adjustment/{office}/{year?}', [SalaryAdjustmentPerOfficeController::class, 'plantillaWithAdjustment']);
      Route::get('plantilla-without-adjustment/{office}/{year?}', [SalaryAdjustmentPerOfficeController::class, 'plantillaWithoutAdjustment']);
      Route::post('/AddData', [SalaryAdjustmentPerOfficeController::class, 'AddNewDatas']);
});


// plantilla schedule list filter
Route::get('/plantilla/list/{officeCode}', function ($office_code) {
      $year = Carbon::now()->format('Y') - 1;
      $data = DB::connection('E_PIMS_CONNECTION')->table('plantillas')
            ->join('DTRPayroll.dbo.Office', 'plantillas.office_code', '=', 'Office.OfficeCode')
            ->join('DTRPayroll.dbo.Employees', 'plantillas.employee_id', '=', 'Employees.Employee_id')
            ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
            ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
            ->select('plantilla_id', 'plantillas.item_no', 'positions.position_name', 'plantillas.office_code', 'Office.Description as office_name', 'plantillas.status', 'plantillas.year', DB::raw("CONCAT(FirstName, ' ' , MiddleName, ' ' , LastName, ' ' , Suffix) AS fullname"))
            ->where('plantillas.year', '=',  $year)
            ->where('plantillas.office_code', $office_code)
            ->orderBy('plantilla_id', 'desc')
            ->get();

      return DataTables::of($data)
            ->addColumn('action', function ($row) {
                  $btn = "<a title='Edit Plantilla' href='" . route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm id__holder' data-id='" . $row->plantilla_id . "'><i class='la la-pencil'></i></a>";
                  return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
});
// plantilla schedule filter
Route::get('/plantilla/schedule/{officeCode}/{filterYear}', function ($officeCode, $filterYear) {
      dd($officeCode, $filterYear);
});

// Maintenance Division Filter
Route::get('/maintenance/division/{officeCode}', function ($office_code) {

      $data = Division::select('division_id', 'division_name', 'office_code')
            ->with(['offices', 'offices.desc'])
            ->where('office_code', $office_code)
            ->get();

      return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('offices', function ($row) {
                  return $row->offices->Description;
            })
            ->addColumn('action', function ($row) {
                  $btn = "<a title='Edit Division' href='" . route('maintenance-division.edit', $row->division_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                  $btn = $btn . "<a title='Delete Division' id='delete' value='$row->division_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        ";
                  return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
});


// plantilla position schedule filter
Route::get('/plantilla/position/schedule/{officeCode}', function ($office_code) {
      $year = Carbon::now()->format('Y') - 1;
      $data = DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
            ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
            ->join('DTRPayroll.dbo.Office', 'plantilla_positions.office_code', 'DTRPayroll.dbo.Office.OfficeCode')
            ->select('pp_id', 'positions.position_name', 'item_no', 'plantilla_positions.sg_no', 'plantilla_positions.office_code', 'DTRPayroll.dbo.Office.Description as office_name', 'old_position_name', 'year')
            ->where('plantilla_positions.office_code', $office_code)
            ->where('year', '=',  $year)
            ->get();

      return DataTables::of($data)
            ->addColumn('action', function ($row) {
                  $btn = "<a title='Edit Plantilla Of Position' href='" . route('position-schedule.edits', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1 id__holder' data-id='" . $row->pp_id . "'><i class='la la-pencil'></i></a>";
                  return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
});
//  position schedule filter
Route::get('/position/schedule/{officeCode}/{yearFilter}', function ($office_code, $yearFilter) {
      if ($office_code == "All") {
            $data = DB::table('position_schedules')
                  ->join('offices', 'position_schedules.office_code', '=', 'offices.office_code')
                  ->join('positions', 'position_schedules.position_id', '=', 'positions.position_id')
                  ->select('pos_id', 'pp_id', 'positions.position_name', 'item_no', 'position_schedules.sg_no', 'offices.office_name', 'old_position_name', 'year')
                  ->where('year', $yearFilter)
                  ->orderBy('pos_id', 'DESC')
                  ->get();
      } else {
            $data = DB::connection('E_PIMS_CONNECTION')->table('position_schedules')
                  ->join('DTRPayroll.dbo.Office', 'position_schedules.office_code', '=', 'DTRPayroll.dbo.Office.OfficeCode')
                  ->join('positions', 'position_schedules.position_id', '=', 'positions.position_id')
                  ->select('pos_id', 'pp_id', 'positions.position_name', 'item_no', 'position_schedules.sg_no', 'position_schedules.office_code', 'DTRPayroll.dbo.Office.Description as office_name', 'old_position_name', 'year')
                  ->where('position_schedules.office_code', $office_code)
                  ->where('year', $yearFilter)
                  ->orderBy('pos_id', 'DESC')
                  ->get();
      }
      return DataTables::of($data)
            ->make(true);
});

// position schedule multiple save
Route::post('/position/schedule/adjust', function () {
      $PlantillaPositionIds = explode(',', request()->ids);
      $data = PlantillaPosition::whereIn('pp_id', $PlantillaPositionIds)->get();
      $newSchedcule = $data->toArray();
      $newYear = request()->currentYear;
      foreach ($data as $newSchedcule) {
            PositionSchedule::FirstOrCreate([
                  'position_id' => $newSchedcule->position_id,
                  'year' => $newSchedcule->year,
            ], [
                  'pp_id' => $newSchedcule->pp_id,
                  'position_id' => $newSchedcule->position_id,
                  'item_no' => $newSchedcule->item_no,
                  'sg_no' => $newSchedcule->sg_no,
                  'office_code' => $newSchedcule->office_code,
                  'old_position_name' => $newSchedcule->old_position_name,
                  'year' => $newSchedcule->year
            ]);
            $data = PlantillaPosition::whereIn('pp_id', $PlantillaPositionIds)
                  ->update(['year' => $newYear]);
      }
      return response()->json(['success' => true]);
});



// NOTICE OF STEP INCREMENT ---FETCH SALARY GRADE //
Route::get('step/{sg_no}/{step}', function ($sgNo, $step) {
      $salaryGrade = SalaryGrade::where('sg_no', $sgNo)->first(['sg_step' . $step]);
      return $salaryGrade;
});



// UPDATE OF STEP-INCREMENT //
Route::post('step-increment/update/{stepId}', [StepIncrementController::class, 'update']);


// LEAVE LIST //
Route::get('/leave/leave-list/{officeID}/{status?}/{employeeID?}', 'EmployeeLeave\LeaveListController@search');

Route::get('generate/periods/{start}/{end}/{includeWeekends}/{employeeID}', function ($start, $end, $includeWeekends, $employeeID) {
      $employee = Employee::with(['leave_files'])->find($employeeID);

      $checkSum = 0;
      if($employee->leave_files->count() >= 1) {
            $checkSum += $employee->leave_files()->where('status', 'approved')->where('date_from', '>=', $start)->where('date_from', '<=', $end)->count();
            $checkSum += $employee->leave_files()->where('status', 'approved')->where('date_to', '>=', $start)->where('date_to', '<=', $end)->count();

            if($checkSum >= 1) {
                  // Fail
                  return response()->json(['success' => false, 'message' => 'Conflict']);
            }
      }
      
      if($includeWeekends == 'true'){
            $period = CarbonPeriod::create($start, $end);
      }else{
            $period = CarbonPeriod::create($start, $end)->filter('isWeekday');
      }

      $range = [];
      $holidays = [];

      foreach ($period as $date) {
            $range[] = $date->format('Y-m-d');
            $holidays[] = $date->format('m-d');
      }
      $holidays = Holiday::whereIn('date', $holidays)->get()->each(fn($holiday) => $holiday->date = date('Y').'-'. $holiday->date)->pluck('date')->toArray();

      return response()->json(['success' => true, 'period' => array_diff($range, $holidays)]);
});



/* Promotion Routes */
Route::get('division-by-office/{office}', [DivisionController::class, 'getDivisions']);
Route::get('office-plantilla-positions/{office}', [PlantillaPositionController::class, 'positionsByOffice']);
Route::get('plantilla-position-details/{plantillaPositionID}', [PlantillaPositionController::class, 'getPositionDetails']);
Route::get('salary-amount/{grade}/{step}/{year}', [APISalaryGradeController::class, 'salary']);
Route::get('personnel-get-current-plantilla/{employeeID}', [PlantillaController::class, 'getEmployeeCurrentPlantilla']);
