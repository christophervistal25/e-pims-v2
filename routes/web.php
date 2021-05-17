<?php

use Illuminate\Support\Facades\Route;


Route::view('print-test', 'sample');

Route::get('/print/pds/{employeeId}', 'EmployeePersonalDataSheetPrintController');


Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
});

Route::get('/', function () {
    return view('blank-page');
});


//salary grade
Route::get('/salary-grade-list', 'SalaryGradecontroller@list')->name('salary-grade-list');
Route::resource('/salary-grade', 'SalaryGradeController');


//plantilla
Route::get('/plantilla-list', 'Plantillacontroller@list');
Route::post('/plantilla', 'PlantillaController@addPosition');
Route::resource('/plantilla', 'PlantillaController');

//Increment
Route::get('/step-increment/list', 'StepIncrementController@list');
Route::resource('/step-increment', 'StepIncrementController');
Route::get('/print-increment/{id}/previewed', 'PrintIncrementController@print')->name('step-increment.previewed.print');
Route::get('/print-increment/{id}', 'PrintIncrementController@printList')->name('print-increment');
Route::resource('/print-increment', 'PrintIncrementController');

//salary adjustment
Route::get('/salary-adjustment/{id}', 'SalaryAdjustmentController@destroy')->name('salary-adjustment.delete');
Route::resource('/salary-adjustment', 'SalaryAdjustmentController');
Route::get('/salary-adjustment-list', 'SalaryAdjustmentController@list');

//salary adjustment per office
Route::resource('/salary-adjustment-per-office', 'SalaryAdjustmentPerOfficeController');
Route::get('/salary-adjustment-per-office-list', 'SalaryAdjustmentPerOfficeController@list');

// Service Records
Route::get('/service-records/{id}', 'ServiceRecordsController@destroy')->name('service-records.delete');
Route::resource('/service-records', 'ServiceRecordsController');
Route::get('/service-records-list', 'ServiceRecordsController@list');

Route::group(['prefix' => 'employee'], function () {
    Route::get('/record', 'EmployeeController@index')->name('employee.index');
    Route::post('/record/store', 'EmployeeController@store')->name('employee.store');
    Route::put('/record/{employeeId}/update', 'EmployeeController@update')->name('employee.update');

    Route::get('/generate/personal/data/sheet', 'PersonalDataSheetController@index')->name('data.index');
    Route::get('/create/personal/data/sheet', 'PersonalDataSheetController@create')->name('data.create');
    Route::get('/create/{idNumber}/personal/data/sheet', 'PersonalDataSheetController@createWithEmployee');

    Route::post('/personal/information/store', 'PersonalDataSheetController@storePersonInformation');
    Route::post('/personal/family/background/store', 'PersonalDataSheetController@storePersonFamilyBackground');
    Route::post('/personal/educational/background/store', 'PersonalDataSheetController@storeEducationalBackground');
    Route::post('/personal/civil/service', 'PersonalDataSheetController@storeCivilService');
    Route::post('/personal/work/experience', 'PersonalDataSheetController@storeWorkExperience');
    Route::post('/personal/voluntary/', 'PersonalDataSheetController@storeVoluntary');
    Route::post('/personal/learning/', 'PersonalDataSheetController@storeLearning');
    Route::post('/personal/other/information', 'PersonalDataSheetController@storeOtherInformation');
    Route::post('/personal/relevant/queries/', 'PersonalDataSheetController@storeRelevantQueries');
    Route::post('/personal/references', 'PersonalDataSheetController@storeReferences');
    Route::post('/personal/issued/id', 'PersonalDataSheetController@storeIssuedID');

    Route::get('/leave/application', 'EmployeeLeave\LeaveController@show')->name('leave.application.filling');
    Route::resource('leave', 'EmployeeLeave\LeaveController');
    Route::get('/leave-monitoring', 'EmployeeLeave\LeaveController@create');
});
// Route::resource('/print-increment', 'PrintIncrementController');
Route::get('/profile', 'EmployeeController@profile');
