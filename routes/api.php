<?php
use App\SalaryGrade;
use App\service_record;
use App\SalaryAdjustment;
use Yajra\Datatables\Datatables;
use App\PlantillaPosition;
use App\Plantilla;
use App\PlantillaSchedule;
use App\Division;
use Carbon\Carbon;


Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@cscPrevious');
Route::get('/positionSalaryGrade/{positionTitle}' , 'Api\PlantillaController@positionSalaryGrade');
Route::post('/addPosition' , 'Api\PlantillaController@addPosition');

///service record
Route::get('/employee/service/records/{employeeId}', function ($employeeId) {
    $data = service_record::select('id', 'employee_id', 'service_from_date', 'service_to_date', 'position_id', 'status', 'salary', 'office_code', 'leave_without_pay', 'separation_date', 'separation_cause')->with('office:office_code,office_name,office_address','position:position_id,position_name')->where('employee_id', $employeeId)->get();
    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('position', function ($row) {
                            return $row->position->position_name;
                        })
                        ->addColumn('office', function ($row) {
                            return $row->office->office_name . '' . $row->office->office_address;
                        })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Service Record' href='". route('service-records.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                        $btn = $btn."<a title='Delete Service Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
});

Route::get('step/{sg_no}/{step}' , function ($sgNo, $step) {
    $salaryGrade = SalaryGrade::where('sg_no', $sgNo)->first(['sg_step' . $step]);
    return $salaryGrade;
});

Route::group(['prefix' => 'employee'], function () {
    Route::get('employees', 'Api\EmployeeController@list');
    Route::get('/search/{key}', 'Api\EmployeeController@search');
    Route::get('show/{employeeIdNumber}', 'Api\EmployeeController@show');
    Route::get('find/{employeeIdNumber}', 'Api\EmployeeController@find');
    Route::post('image/upload', 'Api\EmployeeController@onUploadImage');

    Route::get('/employment/status', 'Api\ReferenceStatusController@status');
});

Route::get('offices', 'Api\OfficeController@list');
Route::get('office/search/head/{key}', 'Api\OfficeController@searchOfficeHead');
Route::get('office/search/{key}', 'Api\OfficeController@search');
Route::post('office/store', 'Api\OfficeController@store');

Route::get('positions', 'Api\PositionController@list');
Route::post('position/store', 'Api\PositionController@store');
Route::get('position/search/{key}', 'Api\PositionController@search');

Route::group(['prefix' => 'province'], function () {
    Route::get('/all/with/city', 'Api\ProvinceController@allWithCity');
    Route::get('/all/with/barangay', 'Api\ProvinceController@allWithCityAndBarangay');
    Route::get('/all/with/city/barangay', 'Api\ProvinceController@allWithCityAndBarangay');
    Route::get('all', 'Api\ProvinceController@all');
    Route::get('/{code}', 'Api\ProvinceController@show');
    Route::get('/cities/by/{code}', 'Api\ProvinceController@citiesByProvince');
});

Route::group(['prefix' => 'city'], function () {
    Route::get('/barangay/by/{code}', 'Api\CityController@barangaysByCode');
});

Route::get('countries', function () {
    return config('countries.all');
});

// Reference Routes.
Route::post('/employment/status/store', 'Api\ReferenceStatusController@store');
Route::get('name/extensions', 'Api\ReferenceNameExtensionController@index');
Route::post('name/extensions/store', 'Api\ReferenceNameExtensionController@store');

/////// salary adjustment
Route::get('/salaryAdjustment/{sg_no}/{sg_step?}/{sg_year}' , 'Api\SalaryAdjustmentController@salaryAdjustment');
Route::post('/printEditAdjustment' , 'Api\SalaryAdjustmentController@printEdit');
//individual
Route::get('/salary/adjustment/{year}', function ($year) {
    $data = SalaryAdjustment::select('id','employee_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff')->with('employee:employee_id,firstname,middlename,lastname,extension')->whereYear('date_adjustment', '=', $year)->get();
    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('employee', function ($row) {
                            return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                        })
                        ->addColumn('action', function($row){
                            $btn = "<a title='Edit Salary Adjustment' href='". route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                            $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                            ";
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
});

//per office
Route::get('/office/salary/adjustment/peroffice/{officeCode}', function ($office_code) {
    $data = SalaryAdjustment::select('id','employee_id','item_no','pp_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous','salary_new','salary_diff')->with(['plantillaPosition:pp_id,position_id','plantillaPosition', 'plantillaPosition.position','employee:employee_id,firstname,middlename,lastname,extension', 'plantilla:employee_id,office_code'])->whereHas('plantilla', function ($query) use ($office_code) {
        $query->where('office_code', $office_code);
    })->orderBy('id', 'DESC');
    return (new Datatables)->eloquent($data)
            ->addIndexColumn()
            ->addColumn('employee', function ($row) {
                return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
            })
            ->addColumn('plantilla', function ($row) {
                return $row->plantilla->office_code;
            })
            ->addColumn('action', function($row){
                $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                ";
                    return $btn;
            })
            ->editColumn('checkbox', function ($row) {
                $checkbox = "<input style='transform:scale(1.3)' name='id[$row->id]' value='$row->id' type='checkbox' />";
                return $checkbox;
            })->rawColumns(['checkbox'])
            ->rawColumns(['action'])
            ->make(true);
});

//per office not selected
Route::get('/office/salary/adjustment/peroffice/notselected/{officeCode}', function ($office_code) {
    $salaryAdjustment = SalaryAdjustment::get()->pluck('employee_id')->toArray();
    $data = Plantilla::select('plantilla_id','item_no', 'office_code', 'pp_id', 'sg_no', 'step_no', 'salary_amount', 'employee_id')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position','employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->whereNotIn('employee_id', $salaryAdjustment );
    return (new Datatables)->eloquent($data)
    ->addIndexColumn()
    ->addColumn('employee', function ($row) {
        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    })
    ->addColumn('plantillaPosition', function ($row) {
        return $row->plantillaPosition->position->position_name;
    })
    ->editColumn('checkbox', function ($row) {
        $checkbox = "<input class='check-select' id='checkbox$row->plantilla_id' style='transform:scale(1.3)' value='$row->plantilla_id' type='checkbox' />";
        return $checkbox;
    })->rawColumns(['checkbox'])
    ->make(true);
});


Route::post('/salary-adjustment-per-office', function () {
    $plantillaIds = explode(',', request()->ids);
    $data = Plantilla::with('plantillaPosition', 'plantillaPosition.position')->whereIn('plantilla_id', $plantillaIds)->get();
    $newAdjustment = $data->toArray();
    foreach($data as $newAdjustment){
        $newAdjustment->plantilla_id;
        $newAdjustment->sg_no;
        $newAdjustment->step_no;
        $newAdjustment->salary_amount;
        $getsalaryResult = SalaryGrade::where('sg_no', $newAdjustment->sg_no)
                            ->where('sg_year', request()->year)
                            ->first(['sg_year' ,'sg_step' .  $newAdjustment->step_no]);
        $salaryDiff = $getsalaryResult['sg_step' .  $newAdjustment->step_no] - $newAdjustment->salary_amount;
        $salaryAdjustment= new SalaryAdjustment();
        $salaryAdjustment->employee_id = $newAdjustment->employee_id;
        $salaryAdjustment->item_no = $newAdjustment->item_no;
        $salaryAdjustment->pp_id = $newAdjustment->pp_id;
        $salaryAdjustment->date_adjustment = request()->date;
        $salaryAdjustment->sg_no = $newAdjustment->sg_no;
        $salaryAdjustment->step_no = $newAdjustment->step_no;
        $salaryAdjustment->salary_previous = $newAdjustment->salary_amount;
        $salaryAdjustment->salary_new =  $getsalaryResult['sg_step' .  $newAdjustment->step_no];
        $salaryAdjustment->salary_diff = $salaryDiff;
        $salaryAdjustment->save();
        $service_record                         = new service_record;
        $service_record->employee_id            = $newAdjustment->employee_id;
        $service_record->service_from_date      = request()->date;
        $service_record->position_id            = $newAdjustment->plantillaPosition->position_id;
        $service_record->status                 = $newAdjustment->status;
        $service_record->salary                 = $getsalaryResult['sg_step' .  $newAdjustment->step_no];
        $service_record->office_code            = $newAdjustment->office_code;
        $service_record->separation_cause       =  request()->remarks;
        $service_record->save();

    }
    return response()->json(['success'=>true]);
});

// plantilla position
Route::get('/plantilla/position/{officeCode}', function ($office_code) {
    $data = PlantillaPosition::select('pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name', 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('office_code', $office_code)->get();
    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('position', function ($row) {
                        return $row->position->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_name;
                    })
                    ->addColumn('action', function($row){

                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-position.edit', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                        $btn = $btn."<a title='Delete Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
});

// plantilla personnel
Route::get('/plantilla/personnel/{officeCode}', function ($office_code) {
    $data = Plantilla::select('plantilla_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id')->with('office:office_code,office_short_name','plantillaPosition:pp_id,position_id', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->orderBy('plantilla_id', 'DESC')->get();
    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('plantillaPosition', function ($row) {
                        return $row->plantillaPosition->position->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_short_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
});


// plantilla schedule list
Route::get('/plantilla/list/{officeCode}', function ($office_code) {
    $year = Carbon::now()->format('Y') - 1;
    $data = Plantilla::select('plantilla_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->where('year' ,'=',  $year)->orderBy('plantilla_id', 'DESC')->get();
    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('plantillaPosition', function ($row) {
                        return $row->plantillaPosition->position->position_name;
                        return $row;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_short_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm id__holder' data-id='".$row['plantilla_id']."'><i class='la la-pencil'></i></a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
});

Route::get('/plantilla/schedule/{officeCode}/{filterYear}', function ($office_code, $filterYear) {
    if($office_code == "All" && $filterYear == "All"){
        $data = PlantillaSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->orderBy('plantilla_id', 'DESC');
    }elseif($filterYear == "All"){
        $data = PlantillaSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code);
    }elseif($office_code == "All"){
        $data = PlantillaSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('year', $filterYear);
    }else{
        $data = PlantillaSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->where('year', $filterYear);
    }
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('employee', function ($row) {
                        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
                    })
                    ->addColumn('plantillaPosition', function ($row) {
                        return $row->plantillaPosition->position->position_name;
                    })
                    ->addColumn('office', function ($row) {
                        return $row->office->office_short_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-schedule.edit', $row->ps_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
});

// maintenance division
Route::get('/maintenance/division/{officeCode}', function ($office_code) {
    $data = Division::select('division_id','division_name', 'office_code')->with('offices:office_code,office_name,office_short_name')->where('office_code', $office_code)->get();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('offices', function ($row) {
        return $row->offices->office_name;
    })
    ->addColumn('action', function($row){
        $btn = "<a title='Edit Division' href='". route('maintenance-division.edit', $row->division_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
        $btn = $btn."<a title='Delete Division' id='delete' value='$row->division_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
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
    foreach($data as $newSchedcule){
            PlantillaSchedule::FirstOrCreate([
                'employee_id' => $newSchedcule->employee_id,
                'year' => $newSchedcule->year,
            ],[
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
    return response()->json(['success'=>true]);
});

