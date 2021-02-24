<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/salaryList/{sg_no}' , 'Api\PlantillaController@salaryList');
Route::get('/salarySteplist/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@salarySteplist');
Route::get('/dbmPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmPrevious');
Route::get('/dbmCurrent/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@dbmCurrent');
Route::get('/cscPrevious/{sg_no}/{sg_step?}/{sg_year}' , 'Api\PlantillaController@cscPrevious');


