<?php

use App\Division;
use App\Employee;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use App\StepIncrement;
use App\PositionSchedule;
use App\PlantillaPosition;
use App\PlantillaSchedule;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\SalaryAdjustmentPerOfficeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StepIncrementController;
use App\Http\Controllers\PersonalDataSheetController;
use App\Http\Controllers\DownloadPersonalDataSheetController;
use App\SalaryAdjustment;

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
        ->join('positions', 'service_records.position_id', '=', 'positions.position_id')
        ->select('id', 'employee_id', DB::raw("DATE_FORMAT(service_from_date, '%m-%d-%Y') as service_from_date"), DB::raw("DATE_FORMAT(service_to_date, '%m-%d-%Y') as service_to_date"), 'positions.position_name', 'status', 'salary', 'offices.office_name', 'leave_without_pay', DB::raw("DATE_FORMAT(separation_date, '%m-%d-%Y') as separation_date"), 'separation_cause')
        ->where('employee_id', $employeeId)
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

// salary adjustment per office
Route::get('/office/salary/adjustment/peroffice/{officeCode}/{filterYear}', function ($office_code, $filterYear) {
    $data = DB::table('salary_adjustments')
        ->join('Employees', 'salary_adjustments.employee_id', '=', 'Employees.Employee_id')
        ->join('plantillas', 'salary_adjustments.employee_id', '=', 'plantillas.employee_id')
        ->select('id', 'salary_adjustments.date_adjustment', DB::raw("CONCAT(FirstName, ' ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"), 'salary_adjustments.item_no', 'salary_adjustments.pp_id', DB::raw("FORMAT(date_adjustment, 'M/d/y') as date_adjustment"), 'salary_adjustments.sg_no', 'salary_adjustments.step_no', 'salary_adjustments.salary_previous', 'salary_new', 'salary_adjustments.salary_diff', 'plantillas.office_code')
        ->where('plantillas.office_code', $office_code)
        ->whereYear('salary_adjustments.date_adjustment', $filterYear)
        ->orderBy('id', 'DESC')
        ->whereNull('deleted_at')
        ->get();

    return DataTables::of($data)
        ->addColumn('action', function ($row) {
            $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
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
});
// Route::get('/office/salary/adjustment/peroffice/notselected/{officeCode}/query', );
// Route::get('/office/salary/adjustment/peroffice/notselected/{officeCode}/query', function ($officeCode) {
    // $dataWithLateSalaryAdjustment = Employee::with(['plantilla' => function ($query) use ($officeCode)
    //         {
    //                 $query->where('office_code', $officeCode);
    //         }
    //     , 'plantilla.pp_id', 'salary_adjustment'])
    //     ->has('salary_adjustment')
    //     ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2'])
    //     ->filter(function ($record) {
    //         return !in_array(date('Y'), $record->salary_adjustment->pluck('date_adjustment_year')->toArray());
    //     });



    // $dataWithNoSalaryAdjustment = Employee::whereHas('plantilla', function ($query) use ($officeCode) {
    //     $query->where('office_code', $officeCode)->where('year', date('Y'));
    // })
    //     ->with(['plantilla', 'plantilla.plantillaPosition.position', 'plantilla.position'])
    //     ->doesntHave('salary_adjustment')
    //     ->get(['Employee_id', 'FirstName', 'Middlename', 'LastName', 'Suffix', 'PosCode', 'OfficeCode', 'OfficeCode2']);


    // $data = $dataWithLateSalaryAdjustment->merge($dataWithNoSalaryAdjustment);



    // return DataTables::of($data)
    //     ->editColumn('checkbox', function ($row) {
    //         // $checkbox = "<input id='checkbox{$row->plantilla->plantilla_id}' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla->plantilla_id}' type='checkbox' />";
    //         $checkbox = "<input id='checkbox{$row}' class='not-select-checkbox' style='transform:scale(1.35)' value='' type='checkbox' />";
    //         return $checkbox;
    //     })->rawColumns(['checkbox'])
    //     ->make(true);
// });

// salary adjustment per office multiple save
Route::post('/salary-adjustment-per-office', function () {
    $plantillaIds = explode(',', request()->ids);
    $data = Plantilla::with('plantillaPosition', 'plantillaPosition.position')->whereIn('plantilla_id', $plantillaIds)->get();
    $newAdjustment = $data->toArray();
    foreach ($data as $newAdjustment) {
        $newAdjustment->plantilla_id;
        $newAdjustment->sg_no;
        $newAdjustment->step_no;
        $newAdjustment->salary_amount;
        $getsalaryResult = SalaryGrade::where('sg_no', $newAdjustment->sg_no)
            ->where('sg_year', request()->year)
            ->first(['sg_year', 'sg_step' .  $newAdjustment->step_no]);
        $salaryDiff = $getsalaryResult['sg_step' .  $newAdjustment->step_no] - $newAdjustment->salary_amount;
        DB::table('salary_adjustments')->updateOrInsert(
            [
                'employee_id' => $newAdjustment->employee_id,
                'salary_new' => $getsalaryResult['sg_step' .  $newAdjustment->step_no]
            ],
            [
                'employee_id'     => $newAdjustment->employee_id,
                'item_no'         => $newAdjustment->item_no,
                'pp_id'           => $newAdjustment->pp_id,
                'date_adjustment' => request()->date,
                'sg_no'           => $newAdjustment->sg_no,
                'step_no'         => $newAdjustment->step_no,
                'salary_previous' => $newAdjustment->salary_amount,
                'salary_new'      => $getsalaryResult['sg_step' .  $newAdjustment->step_no],
                'salary_diff'     => $salaryDiff,
                'remarks'         =>  request()->remarks,
                'created_at'      =>  Carbon::now(),
                'deleted_at'      => null,
            ]
        );
        // salary adjustment per office save to service record
        DB::table('service_records')->updateOrInsert(
            [
                'employee_id' => $newAdjustment->employee_id,
                'position_id' =>  $newAdjustment->plantillaPosition->position_id,
            ],
            [
                'employee_id'               => $newAdjustment->employee_id,
                'service_from_date'         => request()->date,
                'position_id'               => $newAdjustment->plantillaPosition->position_id,
                'status'                    => $newAdjustment->status,
                'salary'                    => $getsalaryResult['sg_step' .  $newAdjustment->step_no],
                'office_code'               => $newAdjustment->office_code,
            ]
        );
    }
    return response()->json(['success' => true]);
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
Route::get('/plantilla/schedule/{officeCode}/{filterYear}', function ($office_code, $filterYear) {
    if ($office_code == "All") {
        $data = DB::connection('E_PIMS_CONNECTION')
            ->table('plantilla_schedules')
            ->join('offices', 'plantilla_schedules.office_code', '=', 'offices.office_code')
            ->join('employees', 'plantilla_schedules.employee_id', '=', 'employees.employee_id')
            ->join('plantilla_positions', 'plantilla_schedules.pp_id', '=', 'plantilla_positions.pp_id')
            ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
            ->select('ps_id', 'plantilla_schedules.item_no', 'positions.position_name', 'offices.office_name', 'plantilla_schedules.status', 'plantilla_schedules.year', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
            ->where('plantilla_schedules.year', $filterYear ?? 0)
            ->orderBy('plantilla_id', 'DESC')
            ->get();
    } else {
        $filterYear = $filterYear == 'null' ? 0000 : $filterYear;
        $data = DB::connection('E_PIMS_CONNECTION')
            ->table('plantilla_schedules')
            ->join('DTRPayroll.dbo.Office', 'plantilla_schedules.office_code', '=', 'Office.OfficeCode')
            ->join('DTRPayroll.dbo.Employees', 'plantilla_schedules.employee_id', '=', 'Employees.Employee_id')
            ->join('plantilla_positions', 'plantilla_schedules.pp_id', '=', 'plantilla_positions.pp_id')
            ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
            ->select('ps_id', 'plantilla_schedules.item_no', 'positions.position_name', 'plantilla_schedules.office_code', 'Office.Description as office_name', 'plantilla_schedules.status', 'plantilla_schedules.year', DB::raw("CONCAT(FirstName, ' ' , MIddleName , ' ' , lastName, ' ' , Suffix) AS fullname"))
            ->where('plantilla_schedules.year', $filterYear)
            ->where('plantilla_schedules.office_code', $office_code)
            ->orderBy('plantilla_id', 'DESC')
            ->get();
    }
    return DataTables::of($data)
        ->addColumn('action', function ($row) {
            $btn = "<a title='Edit Plantilla' href='" . route('plantilla-of-schedule.edit', $row->ps_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
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


Route::post('/plantilla/schedule/adjust', function () {
    $plantillaIds = explode(',', request()->ids);
    $data = Plantilla::whereIn('plantilla_id', $plantillaIds)->get();
    $newSchedcule = $data->toArray();
    $newYear = request()->coveredYear;
    foreach ($data as $newSchedcule) {
        PlantillaSchedule::FirstOrCreate([
            'employee_id' => $newSchedcule->employee_id,
            'year' => $newSchedcule->year,
        ], [
            'plantilla_id' => $newSchedcule->plantilla_id,
            'old_item_no' => $newSchedcule->old_item_no,
            'item_no' => $newSchedcule->item_no,
            'pp_id' => $newSchedcule->pp_id,
            'sg_no' => $newSchedcule->sg_no,
            'step_no' => $newSchedcule->step_no,
            'salary_amount' => $newSchedcule->salary_amount,
            'employee_id' => $newSchedcule->employee_id,
            'area_code' => $newSchedcule->area_code,
            'area_type' => $newSchedcule->area_type,
            'area_level' => $newSchedcule->area_level,
            'date_original_appointment' => $newSchedcule->date_original_appointment,
            'date_last_promotion' => $newSchedcule->date_last_promotion,
            'office_code' => $newSchedcule->office_code,
            'division_id' => $newSchedcule->division_id,
            'status' => $newSchedcule->status,
            'year' => $newSchedcule->year,
        ]);
        $data = Plantilla::whereIn('plantilla_id', $plantillaIds)
            ->update(['year' => $newYear]);
    }
    return response()->json(['success' => true]);
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
    // dd($salaryGrade);

    return $salaryGrade;
});

// UPDATE OF STEP-INCREMENT //
Route::post('step-increment/update/{stepId}', [StepIncrementController::class, 'update']);


// LEAVE LIST //
Route::get('/leave/leave-list/{officeID}/{status?}/{employeeID?}', 'EmployeeLeave\LeaveListController@search');
