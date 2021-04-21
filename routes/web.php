<?php

use Illuminate\Support\Facades\Route;

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
});


Route::get('/testing', function () {
    return App\Employee::with(['educational_background', 'civil_service', 'work_experience', 'voluntary_work', 'program_attained'])->get()->take(1);
});
Route::get('/', function () {
    return view('blank-page');
});

Route::view('/view-layouts', function() {
    return view('activities');
});


//salary grade
Route::get('/salary-grade-list', 'SalaryGradecontroller@list');
Route::resource('/salary-grade', 'SalaryGradeController');


//plantilla
Route::get('/plantilla-list', 'Plantillacontroller@list');
Route::post('/plantilla', 'PlantillaController@addPosition');
Route::Resource('/plantilla', 'PlantillaController');

//Increment
Route::get('/step-increment/list', 'StepIncrementController@list');
Route::resource('/step-increment', 'StepIncrementController');

//salary adjustment
Route::Resource('/salary-adjustment', 'SalaryAdjustmentController');
Route::get('/salary-adjustment-list', 'SalaryAdjustmentController@list');

//employee
Route::group(['prefix' => 'employee'], function () {
    Route::get('/record', 'EmployeeController@index')->name('employee.index');
    Route::post('/record/store', 'EmployeeController@store')->name('employee.store');
    Route::put('/record/{employeeId}/update', 'EmployeeController@update')->name('employee.update');
    Route::get('/generate/personal/data/sheet', 'PersonalDataSheetController@index')->name('data.index');
    Route::get('/create/personal/data/sheet', 'PersonalDataSheetController@create')->name('data.create');
    Route::get('/create/{idNumber}/personal/data/sheet', 'PersonalDataSheetController@createWithEmployee');
    // Route::resource('data', 'PersonalDataSheetController');
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
});
Route::Resource('/print-increment', 'PrintIncrementController');
