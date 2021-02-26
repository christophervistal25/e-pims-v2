<?php

use Illuminate\Support\Facades\Route;

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
});



Route::get('/', function () {
    return view('blank-page');
});



Route::view('/view-layouts', function() {
   return view('activities');
});

//salary grade
Route::get('/salary-grade-list', 'SalaryGradecontroller@list');
Route::Resource('/salary-grade', 'SalaryGradeController');
//plantilla
Route::get('/plantilla-list', 'Plantillacontroller@list');
Route::Resource('/plantilla', 'PlantillaController');
//step Increment
Route::Resource('/step-increment', 'StepIncrementController');

Route::group(['prefix' => 'employee'], function () {
    Route::resource('data', 'PersonalDataSheetController');
});
