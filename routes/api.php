<?php
use App\SalaryGrade;
use App\service_record;
use Yajra\Datatables\Datatables;

// Route::get('/salaryList/{sg_no}' , 'Api\PlantillaController@salaryList');
Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@cscPrevious');

Route::get('/positionSalaryGrade/{positionTitle}' , 'Api\PlantillaController@positionSalaryGrade');

Route::get('/employee/service/records/{employeeId}', function ($employeeId) {
    $data = service_record::select('employee_id', 'service_from_date', 'service_to_date', 'position_id', 'status', 'salary', 'office_code', 'leave_without_pay', 'separation_date', 'separation_cause')->with('office:office_code,office_name,office_address','position:position_id,position_name')->where('employee_id', $employeeId)->get();
    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('position', function ($row) {
                            return $row->position->position_name;
                        })
                        ->addColumn('office', function ($row) {
                            return $row->office->office_name . '' . $row->office->office_address;
                        })
                    ->addColumn('action', function($row){
                        $btn = "<a title='Edit Service Record' href='' class='rounded-circle text-white edit btn btn-primary btn-sm'><i class='la la-edit'></i></a>";
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
    Route::get('show/{employeeIdNumber}', 'Api\EmployeeController@show');
    Route::get('find/{employeeIdNumber}', 'Api\EmployeeController@find');
    Route::get('/employment/status', 'Api\EmployeeController@status');
    Route::post('image/upload', 'Api\EmployeeController@onUploadImage');
});

Route::get('offices', 'Api\OfficeController@list');
Route::post('office/store', 'Api\OfficeController@store');

Route::get('positions', 'Api\PositionController@list');
Route::post('position/store', 'Api\PositionController@store');

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


Route::post('/employment/status/store', 'Api\ReferenceStatusController@store');
