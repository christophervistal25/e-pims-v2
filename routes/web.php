<?php

use Illuminate\Support\Facades\Route;

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
});

Route::get('/', function () {
    return view('blank-page');
});


// Route::get('/{any}', function ($any) {
//     $view = str_replace('.html', '', $any);
//     return view($view);
// });

Route::view('/view-layouts', function() {
   return view('activities');
});

Route::view('/salary_grade', 'salarygrade');
Route::post('/salary_grade', 'SalaryGradecontroller@store')->name('save');
Route::get('/salary_grade', 'SalaryGradecontroller@index');
Route::get('/list', 'SalaryGradecontroller@list');
Route::view('/step_increment', 'stepincrement');
Route::view('/plantilla' , 'plantilla');
Route::get('/list_plantilla', 'PlantillaController@list');
