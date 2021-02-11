<?php

use Illuminate\Support\Facades\Route;

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
});

Route::get('/', function () {
    return view('blank-page');
});


Route::get('/{any}', function ($any) {
    $view = str_replace('.html', '', $any);
    return view($view);
});
