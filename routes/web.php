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
//step Increment
Route::Resource('/step-increment', 'StepIncrementController');

Route::group(['prefix' => 'employee'], function () {
    Route::resource('data', 'PersonalDataSheetController');
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
});
Route::Resource('/print-increment', 'PrintIncrementController');
