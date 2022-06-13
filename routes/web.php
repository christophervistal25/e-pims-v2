<?php

use App\Http\Controllers\BirthdayCardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\SalaryGradeController;
use App\Http\Controllers\StepPromotionController;
use App\Http\Controllers\ServiceRecordsController;
use App\Http\Controllers\MaintenanceOfficeController;
use App\Http\Controllers\PersonalDataSheetController;
use App\Http\Controllers\PrintServiceRecordController;
use App\Http\Controllers\PlantillaOfScheduleController;
use App\Http\Controllers\EmployeeLeave\LeaveListController;
use App\Http\Controllers\Prints\SalaryGradePrintController;
use App\Http\Controllers\Reports\PlantillaReportController;

Route::resource('notifications', 'NotificationController');

Route::get('/', 'DashboardController@index');
Route::get('personal-data-sheet/{idNumber}', [PersonalDataSheetController::class, 'edit'])->name('employee.personal-data-sheet.edit');

// Maintenance salary grade
Route::get('salary-grade-list', [SalaryGradeController::class, 'list'])->name('salary-grade-list');
Route::resource('salary-grade', 'SalaryGradeController');

// Maintenance position
Route::get('maintenance-position-list', [MaintenancePositionController::class, 'list'])->name('maintenance-position-list');
Route::resource('maintenance-position', 'MaintenancePositionController');
Route::get('maintenance-position/{id}', [MaintenancePositionController::class, 'destroy'])->name('maintenance-position.delete');

// Maintenance office
Route::get('maintenance-office-list', [MaintenanceOfficeController::class, 'list'])->name('maintenance-office-list');
Route::resource('maintenance-office', 'MaintenanceOfficeController');
Route::get('maintenance-office/{id}', [MaintenanceOfficeController::class, 'destroy'])->name('maintenance-office.delete');

//maintenance division
Route::get('/maintenance-division-list', [MaintenanceDivisionController::class, 'list'])->name('maintenance-division-list');
Route::resource('/maintenance-division', 'MaintenanceDivisionController');
Route::get('/maintenance-division/{id}', [MaintenanceDivisionController::class, 'destroy'])->name('maintenance-division.delete');

// Plantilla of Schedule
Route::get('plantilla-of-schedule-list/{office?}/{year?}', [PlantillaOfScheduleController::class, 'list'])->name('plantilla-of-schedile.lists');
Route::get('plantilla-of-schedule', [PlantillaOfScheduleController::class, 'index'])->name('plantilla-of-schedule.index');
Route::post('plantilla-of-schedule-store', [PlantillaOfScheduleController::class, 'store'])->name('plantilla-of-schedule.store');
Route::post('bulk-plantilla-of-schedule-generate', [PlantillaOfScheduleController::class, 'generate'])->name('plantilla-of-schedule.generate');

Route::get('/position-schedule-list-adjusted/{year}', 'PositionScheduleController@adjustedlist')->name('position.schedule.list.adjusted');
Route::resource('/position-schedule', 'PositionScheduleController');
Route::get('/position-schedule/edit/{edit}', 'PositionScheduleController@edits')->name('position-schedule.edits');
Route::put('/position-schedule/update/{edit}', 'PositionScheduleController@updates')->name('position-schedule.updates');
Route::get('/position-schedule-list', 'PositionScheduleController@list');


//plantilla of personnel
Route::get('/plantilla-list/{office?}/{year?}', [PlantillaController::class, 'list']);
Route::resource('/plantilla-of-personnel', 'PlantillaController');
Route::put('/plantilla-of-personnel/{id}', 'PlantillaController@update');

//plantilla of position
Route::resource('/plantilla-of-position', 'PlantillaOfPositionController');
Route::get('/plantilla-of-position-list/{office_code?}/{year?}', 'PlantillaOfPositionController@list');
Route::get('/plantilla-of-position/{id}', 'PlantillaOfPositionController@destroy')->name('plantilla-of-position.destroy');
Route::put('/plantilla-of-position/{id}', 'PlantillaOfPositionController@update');

// Step-Increment //
Route::get('step-increment/list', 'StepIncrementController@list');
Route::delete('step-increment/{id}', 'StepIncrementController@destroy')->name('step-increment.delete');
Route::post('/', 'StepIncrementController@store')->name('create.step');
Route::put('step-increment/{id}', 'StepIncrementController@update')->name('step-increment.update');
Route::resource('step-increment', 'StepIncrementController');

Route::get('/print-increment/{id}/previewed', 'PrintIncrementController@print')->name('step-increment.previewed.print');
Route::get('/print-increment/{id}', 'PrintIncrementController@printList')->name('print-increment');
Route::resource('/print-increment', 'PrintIncrementController');

//salary adjustment
Route::get('/salary-adjustment/{id}', 'SalaryAdjustmentController@destroy')->name('salary-adjustment.delete');
Route::resource('/salary-adjustment', 'SalaryAdjustmentController');
Route::get('/salary-adjustment-list/{employeeOffice}/{currentSgyear?}', 'SalaryAdjustmentController@list');
Route::put('/salary-adjustment/update/{id}', 'SalaryAdjustmentController@update');
Route::get('/print-adjustment/{id}/previewed', 'PrintAdjustmentController@print')->name('salary-adjustment.previewed.print');
Route::get('/print-adjustment/{id}', 'PrintAdjustmentController@printList')->name('print-adjustment');

//salary adjustment per office
Route::resource('/salary-adjustment-per-office', 'SalaryAdjustmentPerOfficeController');
Route::get('/salary-adjustment-per-office-list', 'SalaryAdjustmentPerOfficeController@list');
Route::get('/salary-adjustment-per-office-not-selected-list', 'SalaryAdjustmentPerOfficeController@NotSelectedlist');
Route::get('/salary-adjustment-per-office/{id}', 'SalaryAdjustmentPerOfficeController@destroy')->name('salary-adjustment-per-office.delete');

// Service Records
Route::get('service-record/{id}', [ServiceRecordsController::class, 'destroy'])->name('service-records.delete');
Route::get('service-records-list', [ServiceRecordsController::class, 'list']);
Route::resource('service-records', 'ServiceRecordsController');


Route::get('employees-birthdays/{from}/{to}', [BirthdayController::class, 'range']);
Route::resource('employees-birthday', 'BirthdayController');
Route::get('employees', 'EmployeeController@index')->name('employee.index');
Route::group(['prefix' => 'employee'], function () {
      Route::get('/leave/application', 'EmployeeLeave\LeaveController@show')->name('leave.application.filling');
      Route::get('/leave/leave-recall', 'EmployeeLeave\LeaveRecallController@index')->name('leave.leave-recall');
      Route::resource('/leave-recall', 'EmployeeLeave\LeaveRecallController');
      Route::post('employee-leave-application-filling', 'Account\Employee\LeaveApplicationController@storeByAdmin')
            ->name('employee.leave.application.filling.admin.create');
      Route::get('/list/leave-forwarded-balance', 'EmployeeLeave\LeaveForwardedBalanceController@list')->name('leave-forwarded-balance.list');
      Route::post('/leave-forwarded-balance/{id}', 'EmployeeLeave\LeaveForwardedBalanceController@destroy');
      Route::get('/leave-forwarded-balance/{id}/edit', 'EmployeeLeave\LeaveForwardedBalanceController@edit');
      Route::put('/leave-forwarded-balance/{id}', 'EmployeeLeave\LeaveForwardedBalanceController@update');
      Route::resource('/leave-forwarded-balance', 'EmployeeLeave\LeaveForwardedBalanceController');

      //  LEAVE-LIST APPLICATIONS //
      Route::get('leave-list/list', [LeaveListController::class, 'list']);
      Route::get('leave-list', [LeaveListController::class, 'index'])->name('leave.leave-list');

      Route::get('/leave/leave-list/{edit}', 'EmployeeLeave\LeaveListController@edit')->name('leave-list.edit');

      Route::delete('/leave-list/{id}', 'EmployeeLeave\LeaveListController@destroy')->name('leave-list.delete');
      Route::put('/leave/leave-list/{id}', [LeaveListController::class, 'update'])->name('leave-list.update');

      // LEAVE MONITORING INDEX //
      Route::get('/leave-monitoring/{id}', 'EmployeeLeave\LeaveMonitoringController@list');
      Route::resource('/leave-monitoring', 'EmployeeLeave\LeaveMonitoringController');

      // LATE & UNDERTIME //
      Route::resource('/late-undertime', 'EmployeeLeave\LeaveUndertimeController');

      // COMPENSATORY LEAVE //
      Route::get('/leave/compensatory-build-up', 'EmployeeLeave\CompensatoryBuildUpController@list')->name('compensatory-build-up.list');
      Route::get('/leave/compensatory-build-up/{id}/{year}', 'EmployeeLeave\CompensatoryBuildUpController@listComLeaveByYear');
      Route::get('/leave/compensatory-build-up/forfeited/{id}/{year}', 'EmployeeLeave\CompensatoryBuildUpController@forfeited');
      Route::get('/leave/compensatory-build-up/updateForfeited/{emloyeeID}/{year}', 'EmployeeLeave\CompensatoryBuildUpController@updateForfeited');
      Route::post('/compensatory-build-up/{id}', 'EmployeeLeave\CompensatoryBuildUpController@destroy');
      Route::resource('/compensatory-build-up', 'EmployeeLeave\CompensatoryBuildUpController');
});

Route::group(['prefix' => 'maintenance'], function () {
      Route::get('leave/list', 'Maintenance\LeaveController@list');
      Route::resource('leaveIncrement', 'Maintenance\LeaveIncrementController');
      Route::resource('leave', 'Maintenance\LeaveController');
});

Route::get('holiday/attribute', function () {
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

      Route::get('employee-leave-application-print/{id}', 'Account\Employee\LeaveApplicationController@print')
            ->name('employee.leave.application.filling');

      Route::group(['middleware' => 'verify.application.submitted'], function () {
            // Route for Leave Application filling.
            Route::get('employee-leave-application-filling', 'Account\Employee\LeaveApplicationController@create')
                  ->name('employee.leave.application.filling');
            Route::post('employee-leave-application-filling', 'Account\Employee\LeaveApplicationController@store')
                  ->name('employee.leave.application.filling.submit');
      });

      Route::get('employee-leave-history/list', 'Account\Employee\ProfileController@list')->name('employee.leave.history.list');
      Route::get('employee-personal-profile', 'Account\Employee\ProfileController@index')->name('employee.personal.profile');
      Route::put('employee-update-account-information', 'Account\Employee\ProfileController@update')->name('employee.update.account.information');

      // Employee Leave Card
      Route::get('employee-leave-card', 'Account\Employee\LeaveCardController@index')->name('employee.leave.card.index');
      Route::get('employee-leave-card/{start?}/{end?}', 'Account\Employee\LeaveCardController@withRange')->name('employee.leave.card.with.range.index');
      Route::post('employee-leave-card-print', 'Account\Employee\LeaveCardController@print')->name('employee.leave.card.print');


      Route::get('leave-certification-print', 'Account\Employee\LeaveCertificationController@index')->name('print-leave-certification');

      //  Employee Chat
      Route::get('employee-chat', 'Account\Employee\ChatController@index')->name('employee.chat');
});



Route::get('404', function () {
      return view('errors.423');
})->name('423-leave-application');

Route::fallback(function () {
      abort(404);
});


// Jobs route.
Route::post('leave-increment-job', 'LeaveIncrementJobController');

Route::get('see-more/promotions', [StepPromotionController::class, 'upcomingStep'])->name('promotion.see-more');

Route::controller(PrintServiceRecordController::class)->group(function () {
      Route::post('service-record-print/{employeeID}/pdf', 'pdf');
      Route::post('service-record-print/{employeeID}/excel', 'excel');
      Route::get('servicec-record-print/{employeeID}/{type}/download', 'download');
});



Route::group(['prefix' => 'prints'], function () {
      Route::get('salary-grade/{year}', [SalaryGradePrintController::class, 'index'])->name('salary-grade-print');
});

Route::get('birthday-card/{name}', [BirthdayCardController::class, 'firstCard']);
Route::get('birthday-card-2/{name}', [BirthdayCardController::class, 'secondCard']);

// Route::get('export-image', function () {
//      $employees = DB::table('Employees')->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix']);
//      foreach ($employees as $employee) {
//           DB::update(DB::raw("exec usp_ExportImage :Param1, :Param2, :Param3"), [
//                ':Param1' => $employee->Employee_id,
//                ':Param2' => "C:\\employees\\",
//                ':Param3' => $employee->Employee_id . ".jpg",
//           ]);
//      }
// });

Route::get('salary-grade/{year}', [SalaryGradePrintController::class, 'index'])->name('salary-grade-print');

// Reports
Route::controller(PlantillaReportController::class)->group(function () {
      Route::get('show-plantilla-report', 'index')->name('show-plantilla-report');
      Route::post('plantilla-report/generate/{office}/{year}', 'generate')->name('generate.plantilla-report');
      Route::post('export/{office}/{year}', 'export')->name('generate.plantilla-report');
      Route::get('download/plantilla-generated-report/{fileName}', 'download')->name('download.generated.plantilla-report');
});
