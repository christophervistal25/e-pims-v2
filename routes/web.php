<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/print/pds/{employeeId}', 'EmployeePersonalDataSheetPrintController');


Route::get('/', 'DashboardController@index');

//maintenance salary grade
Route::get('/salary-grade-list', 'SalaryGradecontroller@list')->name('salary-grade-list');
Route::resource('/salary-grade', 'SalaryGradeController');
//maintenance position
Route::get('/maintenance-position-list', 'MaintenancePositionController@list')->name('maintenance-position-list');
Route::resource('/maintenance-position', 'MaintenancePositionController');
Route::get('/maintenance-position/{id}', 'MaintenancePositionController@destroy')->name('maintenance-position.delete');
//maintenance office
Route::get('/maintenance-office-list', 'MaintenanceOfficeController@list')->name('maintenance-office-list');
Route::resource('/maintenance-office', 'MaintenanceOfficeController');
Route::get('/maintenance-office/{id}', 'MaintenanceOfficeController@destroy')->name('maintenance-office.delete');
//maintenance division
Route::get('/maintenance-division-list', 'MaintenanceDivisionController@list')->name('maintenance-division-list');
Route::resource('/maintenance-division', 'MaintenanceDivisionController');
Route::get('/maintenance-division/{id}', 'MaintenanceDivisionController@destroy')->name('maintenance-division.delete');

//plantilla of schedule
Route::resource('/plantilla-of-schedule', 'PlantillaOfScheduleController');
Route::get('/plantilla-of-schedule-list', 'PlantillaOfScheduleController@list');
Route::get('/plantilla-of-schedule-adjustedlist/{yearFilter}', 'PlantillaOfScheduleController@adjustedlist');
Route::get('/print-plantilla-of-schedule/{id}/previewed', 'PrintPlantillaOfScheduleController@print')->name('plantilla-of-schedule.previewed.print');
Route::get('/print-plantilla-of-schedule/{id}', 'PrintPlantillaOfScheduleController@printList')->name('print-plantilla-of-schedule');

//position of schedule
// Route::get('/position-schedule-list-adjusted/{year?}', 'PositionScheduleController@adjustedlist')->name('position.schedule.list.adjusted');
Route::get('/position-schedule-list-adjusted/{year}', 'PositionScheduleController@adjustedlist')->name('position.schedule.list.adjusted');
Route::resource('/position-schedule', 'PositionScheduleController');
Route::get('/position-schedule/edit/{edit}', 'PositionScheduleController@edits')->name('position-schedule.edits');
Route::put('/position-schedule/update/{edit}', 'PositionScheduleController@updates')->name('position-schedule.updates');
Route::get('/position-schedule-list', 'PositionScheduleController@list');


//plantilla of personnel
Route::get('/plantilla-list', 'Plantillacontroller@list');
// Route::post('/plantilla', 'PlantillaController@addPosition');
Route::resource('/plantilla-of-personnel', 'PlantillaController');

//plantilla of position
Route::resource('/plantilla-of-position', 'PlantillaOfPositionController');
Route::get('/plantilla-of-position-list', 'PlantillaOfPositionController@list');
Route::get('/plantilla-of-position/{id}', 'PlantillaOfPositionController@destroy')->name('plantilla-of-position.delete');

// Step-Increment //
Route::get('/step-increment/list', 'StepIncrementController@list');
Route::delete('/step-increment/{id}', 'StepIncrementController@destroy')->name('step-increment.delete');
Route::resource('/step-increment', 'StepIncrementController');

Route::get('/print-increment/{id}/previewed', 'PrintIncrementController@print')->name('step-increment.previewed.print');
Route::get('/print-increment/{id}', 'PrintIncrementController@printList')->name('print-increment');
Route::resource('/print-increment', 'PrintIncrementController');

//salary adjustment
Route::get('/salary-adjustment/{id}', 'SalaryAdjustmentController@destroy')->name('salary-adjustment.delete');
Route::resource('/salary-adjustment', 'SalaryAdjustmentController');
Route::get('/salary-adjustment-list/{currentSgyear}', 'SalaryAdjustmentController@list');
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
Route::get('/print-service-records/{id}/previewed', 'PrintServiceRecordsController@print')->name('service-records.previewed.print');
Route::get('/print-service-records/{id}', 'PrintServiceRecordsController@printList')->name('print-service-records');

Route::get('employees-birthdays/{from}/{to}', 'BirthdayController@range');
Route::resource('employees-birthday', 'BirthdayController');

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
    Route::post('/exists/personal/{employee}/civil/service/store', 'PersonalDataSheetController@existingEmployeeStoreCivilService');
    Route::post('/exists/personal/{employee}/work/experience', 'PersonalDataSheetController@existingEmployeeStoreWorkExperience');
    Route::post('/exists/personal/{employee}/voluntary', 'PersonalDataSheetController@existingEmployeeStoreVoluntary');
    Route::post('/exists/personal/{employee}/learning', 'PersonalDataSheetController@existingEmployeeStoreLearning');
    Route::post('/exists/personal/{employee}/other/information', 'PersonalDataSheetController@existingEmployeeStoreOtherInformation');
    Route::post('/exists/personal/relevant/queries', 'PersonalDataSheetController@existingEmployeeStoreRelevantQueries');
    Route::post('/exists/personal/{employee}/references', 'PersonalDataSheetController@existingEmployeeStoreReferences');
    Route::post('/exists/personal/issued/id', 'PersonalDataSheetController@existingEmployeeStoreIssuedID');

    //  LEAVE-LIST APPLICATIONS //
    Route::get('/leave-list/list', 'EmployeeLeave\LeaveListController@list');
    Route::get('leave/leave-list', 'EmployeeLeave\LeaveListController@index')->name('leave.leave-list');
    Route::get('/leave/leave-list/{edit}', 'EmployeeLeave\LeaveListController@edit')->name('leave-list.edit');
    Route::delete('/leave-list/{id}', 'EmployeeLeave\LeaveListController@destroy')->name('leave-list.delete');
    Route::put('/leave/leave-list/{id}', 'EmployeeLeave\LeaveListController@update')->name('leave-list.update');



    Route::get('/leave/application', 'EmployeeLeave\LeaveController@show')->name('leave.application.filling');
    Route::get('/leave/leave-recall', 'EmployeeLeave\LeaveRecallController@index')->name('leave.leave-recall');
    Route::resource('leave-starting-balance', 'EmployeeLeave\LeaveStartingBalanceController');
    Route::resource('/leave-monitoring', 'EmployeeLeave\LeaveMonitoringController');
    Route::resource('/leave-recall', 'EmployeeLeave\LeaveRecallController');
    Route::resource('/leave-forwarded-balance', 'EmployeeLeave\EmployeeLeaveRecordController');

    // COMPENSATORY LEAVE //
    Route::get('/leave/compensatory-build-up', 'EmployeeLeave\CompensatoryBuildUpController@list')->name('compensatory-build-up.list');
    Route::get('/leave/compensatory-build-up/{id}/{year}', 'EmployeeLeave\CompensatoryBuildUpController@listComLeaveByYear');
    Route::get('/leave/compensatory-build-up/forfeited/{id}/{year}', 'EmployeeLeave\CompensatoryBuildUpController@forfeited');
    Route::get('/leave/compensatory-build-up/updateForfeited/{emloyeeID}/{year}', 'EmployeeLeave\CompensatoryBuildUpController@updateForfeited');
    Route::resource('/compensatory-build-up', 'EmployeeLeave\CompensatoryBuildUpController');

});

Route::group(['prefix' => 'maintenance'], function () {
        Route::get('leave/list', 'Maintenance\LeaveController@list');
        Route::resource('leaveIncrement', 'Maintenance\LeaveIncrementController');
        Route::resource('leave', 'Maintenance\LeaveController');
});

Route::get('holiday/attribute', function() {
    return App\Holiday::get();
});

Route::get('holiday-by-date/{date}', function (string $date) {
    return App\Holiday::where('date', $date)->first();
});

Route::get('holiday/list', 'HolidayController@list');
Route::resource('holiday', HolidayController::class);

Route::get('/profile', 'EmployeeController@profile');

Route::get('/restore', 'RestoreController@index');


Auth::routes();


// EMPLOYEES ACCOUNT ROUTES.
Route::group(['middleware' => 'auth'], function () {
    // Route for Dashboard
    Route::get('employee-dashboard', 'Account\Employee\DashboardController')->name('employee.dashboard');
    
    Route::get('employee-setting', function () {

    })->name('employee.setting');

    Route::group(['middleware' => 'verify.application.submitted'], function () {
        // Route for Leave Application filling.
        Route::get('employee-leave-application-filling', 'Account\Employee\LeaveApplicationController@create')
                                        ->name('employee.leave.application.filling');
        Route::post('employee-leave-application-filling', 'Account\Employee\LeaveApplicationController@store')
                                            ->name('employee.leave.application.filling.submit');
    });

    // Route for Employee Personal Data Sheet
    Route::get('employee-personal-data-sheet', 'Account\Employee\PersonalDataSheetController@index')->name('employee.personal-data-sheet');
    Route::get('employee-personal-data-sheet/edit', 'Account\Employee\PersonalDataSheetController@edit')->name('employee.personal-data-sheet.edit');
    Route::get('employee-personal-profile', 'Account\Employee\ProfileController@index')->name('employee.personal.profile');
    Route::put('employee-update-account-information', 'Account\Employee\ProfileController@update')->name('employee.update.account.information');
    
    // Employee Leave Card
    Route::get('employee-leave-card' , 'Account\Employee\LeaveCardController@index')->name('employee.leave.card.index');

    //  Employee Chat
    Route::get('employee-chat', 'Account\Employee\ChatController@index')->name('employee.chat');
});



Route::get('404', function () {
    return view('errors.404');
})->name('404-leave-application');


// Jobs route.
Route::post('leave-increment-job', 'LeaveIncrementJobController');
