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
Route::Resource('/salary-grade', 'SalaryGradeController');
Route::get('/salary-grade-list', 'SalaryGradecontroller@list');
//plantilla
Route::Resource('/plantilla', 'PlantillaController');
Route::get('/plantilla-list', 'Plantillacontroller@list');
//step Increment
Route::Resource('/step-increment', 'StepIncrementController');
