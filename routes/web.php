<?php

use Illuminate\Support\Facades\Route;




// Route::get('open-app/{employee_id}', function (string $employeeId) {

// });


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


//plantilla of personnel
Route::get('/plantilla-list', 'Plantillacontroller@list');
// Route::post('/plantilla', 'PlantillaController@addPosition');
Route::resource('/plantilla-of-personnel', 'PlantillaController');
//plantilla of position
Route::resource('/plantilla-of-position', 'PlantillaOfPositionController');
Route::get('/plantilla-of-position-list', 'PlantillaOfPositionController@list');
Route::get('/plantilla-of-position/{id}', 'PlantillaOfPositionController@destroy')->name('plantilla-of-position.delete');

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
Route::get('/print-adjustment/{id}/previewed', 'PrintAdjustmentController@print')->name('salary-adjustment.previewed.print');
Route::get('/print-adjustment/{id}', 'PrintAdjustmentController@printList')->name('print-adjustment');

//salary adjustment per office
Route::resource('/salary-adjustment-per-office', 'SalaryAdjustmentPerOfficeController');
Route::get('/salary-adjustment-per-office-list', 'SalaryAdjustmentPerOfficeController@list');
Route::get('/salary-adjustment-per-office-not-selected-list', 'SalaryAdjustmentPerOfficeController@NotSelectedlist');
Route::get('/salary-adjustment-per-office/{id}', 'SalaryAdjustmentPerOfficeController@destroy')->name('salary-adjustment-per-office.delete');

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

    Route::post('/exists/personal/information/store', 'PersonalDataSheetController@existingEmployeeStoreInformation');
    Route::post('/exists/personal/family/background/store', 'PersonalDataSheetController@existingEmployeeStoreFamilyBackground');
    Route::post('/exists/personal/educational/background/store', 'PersonalDataSheetController@existingEmployeeStoreEducationalBackground');
    Route::post('/exists/personal/civil/service/store', 'PersonalDataSheetController@existingEmployeeStoreCivilService');
    Route::post('/exists/personal/work/experience', 'PersonalDataSheetController@existingEmployeeStoreWorkExperience');
    Route::post('/exists/personal/personal/voluntary', 'PersonalDataSheetController@existingEmployeeStoreVoluntary');
    Route::post('/exists/personal/learning', 'PersonalDataSheetController@existingEmployeeStoreLearning');
    Route::post('/exists/personal/other/information', 'PersonalDataSheetController@existingEmployeeStoreOtherInformation');
    Route::post('/exists/personal/relevant/queries', 'PersonalDataSheetController@existingEmployeeStoreRelevantQueries');
    Route::post('/exists/personal/references', 'PersonalDataSheetController@existingEmployeeStoreReferences');
    Route::post('/exists/personal/issued/id', 'PersonalDataSheetController@existingEmployeeStoreIssuedID');

    Route::get('/leave/application', 'EmployeeLeave\LeaveController@show')->name('leave.application.filling');
    Route::resource('leave-starting-balance', 'EmployeeLeave\LeaveStartingBalanceController');
    Route::resource('/leave-monitoring', 'EmployeeLeave\LeaveMonitoringController');
    Route::resource('/leave-recall', 'EmployeeLeave\LeaveRecallController');
    Route::resource('/leave-forwarded-balance', 'EmployeeLeave\LeaveForwardedBalanceController');
    Route::resource('/compensatory-build-up', 'EmployeeLeave\CompensatoryBuildUpController');
});
// Route::resource('/print-increment', 'PrintIncrementController');
Route::get('/profile', 'EmployeeController@profile');
