<?php
use App\SalaryGrade;
use App\service_record;
use App\SalaryAdjustment;
use Yajra\Datatables\Datatables;
use App\PlantillaPosition;
use App\Plantilla;
use App\PlantillaSchedule;
use App\Division;
use App\PositionSchedule;
use Carbon\Carbon;
use App\EmployeeLeaveApplication;


Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@cscPrevious');
Route::get('/positionSalaryGrade/{positionTitle}' , 'Api\PlantillaController@positionSalaryGrade');
Route::post('/addPosition' , 'Api\PlantillaController@addPosition');

///service record
Route::get('/employee/service/records/{employeeId}', function ($employeeId) {
    $data = DB::table('service_records') ->
    join('offices', 'service_records.office_code', '=', 'offices.office_code')
    ->join('positions', 'service_records.position_id', '=', 'positions.position_id')
    ->select('id', 'employee_id', DB::raw("DATE_FORMAT(service_from_date, '%m-%d-%Y') as service_from_date"), DB::raw("DATE_FORMAT(service_to_date, '%m-%d-%Y') as service_to_date"), 'positions.position_name', 'status', 'salary', 'offices.office_name', 'leave_without_pay', DB::raw("DATE_FORMAT(separation_date, '%m-%d-%Y') as separation_date"), 'separation_cause')
    ->where('employee_id', $employeeId)
    ->get();
    return DataTables::of($data)
    ->addColumn('action', function($row){
        $btn = "<a title='Edit Service Record' href='". route('service-records.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
        $btn = $btn."<a title='Delete Service Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        ";
            return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
    // $data = service_record::select('id', 'employee_id', 'service_from_date', 'service_to_date', 'position_id', 'status', 'salary', 'office_code', 'leave_without_pay', 'separation_date', 'separation_cause')->with('office:office_code,office_name,office_address','position:position_id,position_name')->where('employee_id', $employeeId)->get();
    // return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('position', function ($row) {
    //                         return $row->position->position_name;
    //                     })
    //                     ->addColumn('office', function ($row) {
    //                         return $row->office->office_name . '' . $row->office->office_address;
    //                     })
    //                 ->addColumn('action', function($row){
    //                     $btn = "<a title='Edit Service Record' href='". route('service-records.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
    //                     $btn = $btn."<a title='Delete Service Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
    //                     ";
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
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
    $data = DB::table('salary_adjustments')
        ->join('employees', 'salary_adjustments.employee_id', 'employees.employee_id')
        ->select('id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), DB::raw("DATE_FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff')
        ->whereYear('date_adjustment', '=', $year)
        ->orderBy('date_adjustment', 'DESC')
        ->whereNull('deleted_at')
        ->orderBy('id', 'DESC')
        ->get();
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $btn = "<a title='Edit Salary Adjustment' href='". route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
            $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
            ";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    //old query
    // $data = SalaryAdjustment::select('id','employee_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous', 'salary_new', 'salary_diff')->with('employee:employee_id,firstname,middlename,lastname,extension')->whereYear('date_adjustment', '=', $year)->get();
    // return Datatables::of($data)
    //                     ->addIndexColumn()
    //                     ->addColumn('employee', function ($row) {
    //                         return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    //                     })
    //                     ->addColumn('action', function($row){
    //                         $btn = "<a title='Edit Salary Adjustment' href='". route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
    //                         $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
    //                         ";
    //                             return $btn;
    //                     })
    //                     ->rawColumns(['action'])
    //                     ->make(true);
});

//per office
Route::get('/office/salary/adjustment/peroffice/{officeCode}/{filterYear}', function ($office_code, $filterYear) {
    $data = DB::table('salary_adjustments')
    ->join('employees', 'salary_adjustments.employee_id', '=', 'employees.employee_id')
    ->join('plantillas', 'salary_adjustments.employee_id', '=', 'plantillas.employee_id')
    ->select('id', 'salary_adjustments.date_adjustment', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'),'salary_adjustments.item_no','salary_adjustments.pp_id', DB::raw("DATE_FORMAT(date_adjustment, '%m-%d-%Y') as date_adjustment"), 'salary_adjustments.sg_no', 'salary_adjustments.step_no', 'salary_adjustments.salary_previous','salary_new','salary_adjustments.salary_diff', 'plantillas.office_code')
    ->where('plantillas.office_code', $office_code)
    ->whereYear('salary_adjustments.date_adjustment', $filterYear)
    ->orderBy('id', 'DESC')
    ->whereNull('deleted_at')
    ->get();
    return DataTables::of($data)
    ->addColumn('action', function($row){
        $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
        ";
            return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);


    //old query
    // $data = SalaryAdjustment::select('id','employee_id','item_no','pp_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous','salary_new','salary_diff')->with(['plantillaPosition:pp_id,position_id','plantillaPosition', 'plantillaPosition.position','employee:employee_id,firstname,middlename,lastname,extension', 'plantilla:employee_id,office_code'])->whereHas('plantilla', function ($query) use ($office_code) {
    //     $query->where('office_code', $office_code);
    // })->orderBy('id', 'DESC');
    // return (new Datatables)->eloquent($data)
    //         ->addIndexColumn()
    //         ->addColumn('employee', function ($row) {
    //             return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    //         })
    //         ->addColumn('plantilla', function ($row) {
    //             return $row->plantilla->office_code;
    //         })
    //         ->addColumn('action', function($row){
    //             $btn = "<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
    //             ";
    //                 return $btn;
    //         })
    //         ->editColumn('checkbox', function ($row) {
    //             $checkbox = "<input style='transform:scale(1.3)' name='id[$row->id]' value='$row->id' type='checkbox' />";
    //             return $checkbox;
    //         })->rawColumns(['checkbox'])
    //         ->rawColumns(['action'])
    //         ->make(true);
});

//per office not selected
Route::get('/office/salary/adjustment/peroffice/notselected/{officeCode}', function ($office_code) {
    $salaryAdjustment = SalaryAdjustment::get()->pluck('employee_id')->toArray();
    $data = DB::table('plantillas')
    ->join('employees', 'plantillas.employee_id', '=', 'employees.employee_id')
    ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
    ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
    ->select('plantilla_id','plantillas.item_no', 'plantillas.office_code', 'positions.position_name', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
    ->where('plantillas.office_code', $office_code)
    ->whereNotIn('plantillas.employee_id', $salaryAdjustment)
    ->get();
    return DataTables::of($data)
    ->editColumn('checkbox', function ($row) {
        $checkbox = "<input id='checkbox$row->plantilla_id' style='transform:scale(1.35)' value='$row->plantilla_id' type='checkbox' />";
        return $checkbox;
    })->rawColumns(['checkbox'])
    ->make(true);
    // $salaryAdjustment = SalaryAdjustment::get()->pluck('employee_id')->toArray();
    // $data = Plantilla::select('plantilla_id','item_no', 'office_code', 'pp_id', 'sg_no', 'step_no', 'salary_amount', 'employee_id')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position','employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->whereNotIn('employee_id', $salaryAdjustment );
    // return (new Datatables)->eloquent($data)
    // ->addIndexColumn()
    // ->addColumn('employee', function ($row) {
    //     return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    // })
    // ->addColumn('plantillaPosition', function ($row) {
    //     return $row->plantillaPosition->position->position_name;
    // })
    // ->editColumn('checkbox', function ($row) {
    //     $checkbox = "<input class='check-select' id='checkbox$row->plantilla_id' style='transform:scale(1.3)' value='$row->plantilla_id' type='checkbox' />";
    //     return $checkbox;
    // })->rawColumns(['checkbox'])
    // ->make(true);
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

        DB::table('salary_adjustments')->updateOrInsert(
            [
                'employee_id' => $newAdjustment->employee_id
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
            'remarks'     =>  request()->remarks,
            'created_at'     =>  Carbon::now(),
            'deleted_at'      => null,
        ]);
        // $salaryAdjustment= new SalaryAdjustment();
        // $salaryAdjustment->employee_id = $newAdjustment->employee_id;
        // $salaryAdjustment->item_no = $newAdjustment->item_no;
        // $salaryAdjustment->pp_id = $newAdjustment->pp_id;
        // $salaryAdjustment->date_adjustment = request()->date;
        // $salaryAdjustment->sg_no = $newAdjustment->sg_no;
        // $salaryAdjustment->step_no = $newAdjustment->step_no;
        // $salaryAdjustment->salary_previous = $newAdjustment->salary_amount;
        // $salaryAdjustment->salary_new =  $getsalaryResult['sg_step' .  $newAdjustment->step_no];
        // $salaryAdjustment->salary_diff = $salaryDiff;
        // $salaryAdjustment->save();

        $service_record                         = new service_record;
        $service_record->employee_id            = $newAdjustment->employee_id;
        $service_record->service_from_date      = request()->date;
        $service_record->position_id            = $newAdjustment->plantillaPosition->position_id;
        $service_record->status                 = $newAdjustment->status;
        $service_record->salary                 = $getsalaryResult['sg_step' .  $newAdjustment->step_no];
        $service_record->office_code            = $newAdjustment->office_code;
        $dataCheck = request()->remarks;
        if($dataCheck == ''){
            $service_record->separation_cause       =  'Salary Adjust';
        }else{
            $service_record->separation_cause       =  request()->remarks;
        }
        $service_record->save();
    }
    return response()->json(['success'=>true]);
});

// plantilla position
Route::get('/plantilla/position/{officeCode}', function ($office_code) {
    $data = DB::table('plantilla_positions')
    ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
    ->join('offices', 'plantilla_positions.office_code', 'offices.office_code')
    ->select('pp_id', 'positions.position_name', 'item_no', 'plantilla_positions.sg_no', 'plantilla_positions.office_code', 'offices.office_name', 'old_position_name', 'year')
    ->where('plantilla_positions.office_code', $office_code)
    ->get();
    return DataTables::of($data)
    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Plantilla Of Position' href='". route('plantilla-of-position.edit', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
                        $btn = $btn."<a title='Delete Plantilla Of Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                        ";
                            return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
    //old query
    // $data = PlantillaPosition::select('pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name', 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('office_code', $office_code)->get();
    // return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('position', function ($row) {
    //                     return $row->position->position_name;
    //                 })
    //                 ->addColumn('office', function ($row) {
    //                     return $row->office->office_name;
    //                 })
    //                 ->addColumn('action', function($row){

    //                     $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-position.edit', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
    //                     $btn = $btn."<a title='Delete Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
    //                     ";
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
});

// plantilla personnel
Route::get('/plantilla/personnel/{officeCode}', function ($office_code) {
    $data = DB::table('plantillas')->join('offices', 'plantillas.office_code', '=', 'offices.office_code')
        ->join('employees', 'plantillas.employee_id', '=', 'employees.employee_id')
        ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
        ->select('plantilla_id', 'plantillas.item_no', 'positions.position_name', 'plantillas.office_code', 'offices.office_name', 'plantillas.status', 'plantillas.year', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
        ->where('plantillas.office_code', $office_code)
        ->orderBy('plantilla_id', 'desc')
        ->get();
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    //old query
    // $data = Plantilla::select('plantilla_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id')->with('office:office_code,office_short_name','plantillaPosition:pp_id,position_id', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->orderBy('plantilla_id', 'DESC')->get();
    // return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('employee', function ($row) {
    //                     return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    //                 })
    //                 ->addColumn('plantillaPosition', function ($row) {
    //                     return $row->plantillaPosition->position->position_name;
    //                 })
    //                 ->addColumn('office', function ($row) {
    //                     return $row->office->office_short_name;
    //                 })
    //                 ->addColumn('action', function($row){
    //                     $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
});


// plantilla schedule list
Route::get('/plantilla/list/{officeCode}', function ($office_code) {
    $year = Carbon::now()->format('Y') - 1;
        $data = DB::table('plantillas')->join('offices', 'plantillas.office_code', '=', 'offices.office_code')
        ->join('employees', 'plantillas.employee_id', '=', 'employees.employee_id')
        ->join('plantilla_positions', 'plantillas.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
        ->select('plantilla_id', 'plantillas.item_no', 'positions.position_name', 'plantillas.office_code', 'offices.office_name', 'plantillas.status', 'plantillas.year', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
        ->where('plantillas.year' ,'=',  $year)
        ->where('plantillas.office_code', $office_code)
        ->orderBy('plantilla_id', 'desc')
        ->get();
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm id__holder' data-id='".$row->plantilla_id."'><i class='la la-pencil'></i></a>";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);

    //old query
    // $year = Carbon::now()->format('Y') - 1;
    // $data = Plantilla::select('plantilla_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->where('year' ,'=',  $year)->orderBy('plantilla_id', 'DESC')->get();
    // return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('employee', function ($row) {
    //                     return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    //                 })
    //                 ->addColumn('plantillaPosition', function ($row) {
    //                     return $row->plantillaPosition->position->position_name;
    //                     return $row;
    //                 })
    //                 ->addColumn('office', function ($row) {
    //                     return $row->office->office_short_name;
    //                 })
    //                 ->addColumn('action', function($row){
    //                     $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-personnel.edit', $row->plantilla_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm id__holder' data-id='".$row['plantilla_id']."'><i class='la la-pencil'></i></a>";
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
});

Route::get('/plantilla/schedule/{officeCode}/{filterYear}', function ($office_code, $filterYear) {
    if($office_code == "All"){
        $data = DB::table('plantilla_schedules')
        ->join('offices', 'plantilla_schedules.office_code', '=', 'offices.office_code')
        ->join('employees', 'plantilla_schedules.employee_id', '=', 'employees.employee_id')
        ->join('plantilla_positions', 'plantilla_schedules.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
        ->select('ps_id', 'plantilla_schedules.item_no', 'positions.position_name', 'offices.office_name', 'plantilla_schedules.status', 'plantilla_schedules.year', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
        ->where('plantilla_schedules.year', $filterYear)
        ->orderBy('plantilla_id', 'DESC')
        ->get();
     }else{
        $data = DB::table('plantilla_schedules')
        ->join('offices', 'plantilla_schedules.office_code', '=', 'offices.office_code')
        ->join('employees', 'plantilla_schedules.employee_id', '=', 'employees.employee_id')
        ->join('plantilla_positions', 'plantilla_schedules.pp_id', '=', 'plantilla_positions.pp_id')
        ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
        ->select('ps_id', 'plantilla_schedules.item_no', 'positions.position_name', 'plantilla_schedules.office_code' ,'offices.office_name', 'plantilla_schedules.status', 'plantilla_schedules.year', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'))
        ->where('plantilla_schedules.year', $filterYear)
        ->where('plantilla_schedules.office_code', $office_code)
        ->orderBy('plantilla_id', 'DESC')
        ->get();
    }
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-schedule.edit', $row->ps_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
            //     if($office_code == "All"){
            //        $data = PlantillaSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('year', $filterYear)->orderBy('plantilla_id', 'DESC');
            //     }else{
            //         $data = PlantillaSchedule::select('ps_id', 'item_no', 'pp_id', 'office_code', 'status', 'employee_id', 'year')->with('office:office_code,office_short_name','plantillaPosition', 'plantillaPosition.position', 'employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->where('year', $filterYear);
            //    }
            // return (new Datatables)->eloquent($data)
            //         ->addIndexColumn()
            //         ->addColumn('employee', function ($row) {
            //             return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
            //         })
            //         ->addColumn('plantillaPosition', function ($row) {
            //             return $row->plantillaPosition->position->position_name;
            //         })
            //         ->addColumn('office', function ($row) {
            //             return $row->office->office_short_name;
            //         })
            //         ->addColumn('action', function($row){
            //             $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-schedule.edit', $row->ps_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-pencil'></i></a>";
            //                 return $btn;
            //         })
            //         ->rawColumns(['action'])
            //         ->make(true);
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

// plantilla position schedule
Route::get('/plantilla/position/schedule/{officeCode}', function ($office_code) {
    $year = Carbon::now()->format('Y') - 1;
        $data = DB::table('plantilla_positions')
        ->join('positions', 'plantilla_positions.position_id', '=', 'positions.position_id')
        ->join('offices', 'plantilla_positions.office_code', 'offices.office_code')
        ->select('pp_id', 'positions.position_name', 'item_no', 'plantilla_positions.sg_no', 'plantilla_positions.office_code', 'offices.office_name', 'old_position_name', 'year')
        ->where('plantilla_positions.office_code', $office_code)
        ->where('year' ,'=',  $year)
        ->get();
        return DataTables::of($data)
        ->addColumn('action', function($row){
                $btn = "<a title='Edit Plantilla Of Position' href='". route('position-schedule.edits', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1 id__holder' data-id='".$row->pp_id."'><i class='la la-pencil'></i></a>";
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    //old query
    // $year = Carbon::now()->format('Y') - 1;
    // $data = PlantillaPosition::select('pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name', 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('office_code', $office_code)->where('year' ,'=',  $year)->get();
    // return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('position', function ($row) {
    //                     return $row->position->position_name;
    //                 })
    //                 ->addColumn('office', function ($row) {
    //                     return $row->office->office_name;
    //                 })
    //                 ->addColumn('action', function($row){
    //                     $btn = "<a title='Edit Plantilla' href='". route('plantilla-of-position.edit', $row->pp_id) . "' class='rounded-circle text-white edit btn btn-success btn-sm mr-1'><i class='la la-pencil'></i></a>";
    //                     $btn = $btn."<a title='Delete Position' id='delete' value='$row->pp_id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
    //                     ";
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
});
//  position schedule
Route::get('/position/schedule/{officeCode}/{yearFilter}', function ($office_code, $yearFilter) {
    if($office_code == "All"){
        $data = DB::table('position_schedules')
        ->join('offices', 'position_schedules.office_code', '=', 'offices.office_code')
        ->join('positions', 'position_schedules.position_id', '=', 'positions.position_id')
        ->select('pos_id', 'pp_id', 'positions.position_name','item_no', 'position_schedules.sg_no', 'offices.office_name', 'old_position_name' , 'year')
        ->where('year', $yearFilter)
        ->orderBy('pos_id', 'DESC')
        ->get();
        }else{
        $data = DB::table('position_schedules')
        ->join('offices', 'position_schedules.office_code', '=', 'offices.office_code')
        ->join('positions', 'position_schedules.position_id', '=', 'positions.position_id')
        ->select('pos_id', 'pp_id', 'positions.position_name','item_no', 'position_schedules.sg_no', 'position_schedules.office_code' ,'offices.office_name', 'old_position_name' , 'year')
        ->where('position_schedules.office_code', $office_code)
        ->where('year', $yearFilter)
        ->orderBy('pos_id', 'DESC')
        ->get();
        }
        return DataTables::of($data)
        ->make(true);

    //old query
    // if($office_code == "All"){
    //     $data = PositionSchedule::select('pos_id','pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name' , 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('year', $yearFilter)->orderBy('pp_id', 'DESC');
    //   }else{
    //     $data = PositionSchedule::select('pos_id','pp_id', 'position_id','item_no', 'sg_no', 'office_code', 'old_position_name' , 'year')->with('position:position_id,position_name', 'office:office_code,office_name')->where('office_code', $office_code)->where('year', $yearFilter)->orderBy('pp_id', 'DESC')->get();
    //  }
    // return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('position', function ($row) {
    //                     return $row->position->position_name;
    //                 })
    //                 ->addColumn('office', function ($row) {
    //                     return $row->office->office_name;
    //                 })
    //                 ->make(true);
});

Route::post('/position/schedule/adjust', function () {
    $PlantillaPositionIds = explode(',', request()->ids);
    $data = PlantillaPosition::whereIn('pp_id', $PlantillaPositionIds)->get();
    $newSchedcule = $data->toArray();
    $newYear = request()->currentYear;
    foreach($data as $newSchedcule){
            PositionSchedule::FirstOrCreate([
                'position_id' => $newSchedcule->position_id,
                'year' => $newSchedcule->year,
            ],[
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
    return response()->json(['success'=>true]);
});



// LEAVE-LIST SEARCH EMPLOYEE NAME //
Route::get('/leave/leave-list/employee/{employeeID}', function($employee_id) {
    $data = [];
    if(strtolower($employee_id) !== 'all')
    {
        $data = DB::table('employee_leave_applications')
        ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
        ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
        ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')

        ->where('employees.employee_id', $employee_id)
        ->get();

    } else {

        $data = DB::table('employee_leave_applications')
        ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
        ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
        ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')
        ->get();
    }

    return Datatables::of($data)
        ->addColumn('action', function($row)
        {
            // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
            $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-edit' title='Edit'></i></a>";


            // DELETE FUNCTION IN YAJRA TABLE //
            $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';


            return $btnUpdate . "&nbsp" . $btnDelete;
        })->make(true);


});





// LEAVE-LIST SEARCH STATUS //
Route::get('/leave/leave-list/status/{typeID}', function($pendingStatus) {
    $data = [];
    if(strtolower($pendingStatus) !== 'all') {
        $data = DB::table('employee_leave_applications')
            ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
            ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
            ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')

            ->where('employee_leave_applications.approved_status', $pendingStatus)
            ->get();

    } else {
        $data = DB::table('employee_leave_applications')
            ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
            ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
            ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')
            ->get();
    }

    return Datatables::of($data)
        ->addColumn('action', function($row)
        {
            // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
            $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-edit' title='Edit'></i></a>";


            // DELETE FUNCTION IN YAJRA TABLE //
            $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';


            return $btnUpdate . "&nbsp" . $btnDelete;
        })->make(true);

});



// OFFICE SEARCH//
Route::get('/leave/leave-list/{officeID}', function($officeCode) {
    $data = [];
    if(strtolower($officeCode) !== 'all') {

        $data = DB::table('employee_leave_applications')
            ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
            ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
            ->leftJoin('employee_informations', 'employee_informations.EmpIDNo', '=', 'employee_leave_applications.employee_id')
            ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')

            ->where('employee_informations.office_code', $officeCode)
            ->get();

        } else {
            $data = DB::table('employee_leave_applications')
                ->leftJoin('employees', 'employees.employee_id', '=', 'employee_leave_applications.employee_id')
                ->leftJoin('leave_types', 'leave_types.id', '=', 'employee_leave_applications.leave_type_id')
                ->leftJoin('employee_informations', 'employee_informations.EmpIDNo', '=', 'employee_leave_applications.employee_id')
                ->select('employee_leave_applications.id', DB::raw('CONCAT(firstname, " " , middlename , " " , lastname, " " , extension) AS fullname'), 'recommending_approval', 'approved_by', 'leave_type_id', 'incase_of', 'commutation', 'approved_status', 'date_approved', 'date_rejected', 'date_applied', 'date_from', 'date_to', 'no_of_days', 'leave_types.id as leave_type_id', 'leave_types.name AS leave_type_name')
                ->get();
        }

    return Datatables::of($data)
        ->addColumn('action', function($row)
        {
            // route('leave.leave-list.edit', $row->id) is the name of the route on the web.php
            $btnUpdate = "<a href='". route('leave-list.edit', $row->id) . "' class='rounded-circle text-white edit btn btn-success btn-sm'><i class='la la-edit' title='Edit'></i></a>";


            // DELETE FUNCTION IN YAJRA TABLE //
            $btnDelete = '<button type="button" class="rounded-circle text-white delete btn btn-danger btn-sm btnRemoveRecord" title="Delete" data-id="'.$row->id.'" hidden><i style="pointer-events:none;" class="la la-trash"></i></button>';


            return $btnUpdate . "&nbsp" . $btnDelete;
        })->make(true);

});
