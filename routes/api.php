<?php
use App\SalaryGrade;
use App\service_record;
use App\SalaryAdjustment;
use Yajra\Datatables\Datatables;
use App\Plantilla;

// Route::get('/salaryList/{sg_no}' , 'Api\PlantillaController@salaryList');
Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@cscPrevious');

Route::get('/positionSalaryGrade/{positionTitle}' , 'Api\PlantillaController@positionSalaryGrade');

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
                        $btn = "<a title='Edit Service Record' href='". route('service-records.edit', $row->id) . "' class='rounded-circle edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
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

Route::post('/addPosition' , 'Api\PlantillaController@addPosition');


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
                            $btn = "<a title='Edit Salary Adjustment' href='". route('salary-adjustment.edit', $row->id) . "' class='rounded-circle edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
                            $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
                            ";
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
});

//per office
Route::get('/office/salary/adjustment/peroffice/{officeCode}', function ($office_code) {
    $data = SalaryAdjustment::select('id','employee_id','item_no','position_id', 'date_adjustment', 'sg_no', 'step_no', 'salary_previous','salary_new','salary_diff')->with(['position:position_id,position_name','employee:employee_id,firstname,middlename,lastname,extension', 'plantilla:employee_id,office_code'])->whereHas('plantilla', function ($query) use ($office_code) {
        $query->where('office_code', $office_code);
    });
    return (new Datatables)->eloquent($data)
            ->addIndexColumn()
            ->addColumn('employee', function ($row) {
                return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
            })
            ->addColumn('plantilla', function ($row) {
                return $row->plantilla->office_code;
            })
            ->addColumn('action', function($row){
                $btn = "<a title='Edit Salary Adjustment' href='$row->id' class='rounded-circle edit btn btn-primary btn-sm mr-1'><i class='la la-edit'></i></a>";
                $btn = $btn."<a title='Delete Salary Adjustment' id='delete' value='$row->id' class='delete rounded-circle delete btn btn-danger btn-sm mr-1'><i class='la la-trash'></i></a>
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
    $data = Plantilla::select('plantilla_id','item_no', 'office_code', 'position_id', 'sg_no', 'step_no', 'salary_amount', 'employee_id')->with('position:position_id,position_name','employee:employee_id,firstname,middlename,lastname,extension')->where('office_code', $office_code)->whereNotIn('employee_id', $salaryAdjustment );
    return (new Datatables)->eloquent($data)
    ->addIndexColumn()
    ->addColumn('employee', function ($row) {
        return $row->employee->firstname . ' ' . $row->employee->middlename  . ' ' . $row->employee->lastname;
    })
    ->addColumn('position', function ($row) {
        return $row->position->position_name;
    })
    ->editColumn('checkbox', function ($row) {
        $checkbox = "<input class='check-select' id='checkbox$row->plantilla_id' style='transform:scale(1.3)' value='$row->plantilla_id' type='checkbox' />";
        return $checkbox;
    })->rawColumns(['checkbox'])
    ->make(true);
});


Route::post('/salary-adjustment-per-office', function () {
    $plantillaIds = explode(',', request()->ids);
    $data = Plantilla::whereIn('plantilla_id', $plantillaIds)->get();
    $newAdjustment = $data->toArray();
    foreach($data as $newAdjustment){
        $salaryAdjustment= new SalaryAdjustment();
        $salaryAdjustment->employee_id = $newAdjustment->employee_id;
        $salaryAdjustment->item_no = $newAdjustment->item_no;
        $salaryAdjustment->position_id = $newAdjustment->position_id;
        $salaryAdjustment->date_adjustment = $newAdjustment->date_original_appointment;
        $salaryAdjustment->sg_no = $newAdjustment->sg_no;
        $salaryAdjustment->step_no = $newAdjustment->step_no;
        $salaryAdjustment->salary_previous = $newAdjustment->salary_amount;
        $salaryAdjustment->salary_new = $newAdjustment->salary_amount;
        $salaryAdjustment->salary_diff = $newAdjustment->salary_amount;
        $salaryAdjustment->save();
    }

    return response()->json(['success'=>true]);



});
