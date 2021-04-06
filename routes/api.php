<?php
// Route::get('/salaryList/{sg_no}' , 'Api\PlantillaController@salaryList');
Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@cscPrevious');

Route::post('/addPosition' , 'Api\PlantillaController@addPosition');


Route::group(['prefix' => 'employee'], function () {
    Route::get('employees', 'Api\EmployeeController@list');
});

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

