<?php

use App\City;
use App\User;
use App\Office;
use App\Barangay;
use App\Employee;
use App\LeaveIncrement;
use App\PlantillaPosition;
use Illuminate\Support\Str;
use App\EmployeeTrainingAttained;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SalaryGradeController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BirthdayCardController;
use App\Http\Controllers\StepPromotionController;
use App\Http\Controllers\ServiceRecordsController;
use App\Http\Controllers\PersonnelFile201Controller;
use App\Http\Controllers\PositionScheduleController;
use App\Http\Controllers\MaintenanceOfficeController;
use App\Http\Controllers\PersonalDataSheetController;
use App\Http\Controllers\PrintServiceRecordController;
use App\Http\Controllers\EmployeeLeave\LeaveController;
use App\Http\Controllers\MaintenanceDivisionController;
use App\Http\Controllers\MaintenancePositionController;
use App\Http\Controllers\PlantillaOfPositionController;
use App\Http\Controllers\PlantillaOfScheduleController;
use App\Http\Controllers\Account\Employee\ChatController;
use App\Http\Controllers\EmployeePersonnelFileController;
use App\Http\Controllers\EmployeeLeave\LeaveListController;
use App\Http\Controllers\Prints\SalaryGradePrintController;
use App\Http\Controllers\Account\Employee\PaySlipController;
use App\Http\Controllers\Account\Employee\ProfileController;
use App\Http\Controllers\Reports\EmployeeTrainingController;
use App\Http\Controllers\DownloadPersonalDataSheetController;
use App\Http\Controllers\EmployeeLeave\LeaveRecallController;
use App\Http\Controllers\Account\Employee\LeaveCardController;
use App\Http\Controllers\Maintenance\LeaveIncrementController;
use App\Http\Controllers\Reports\CSCPlantillaReportController;
use App\Http\Controllers\Reports\DBMPlantillaReportController;
use App\Http\Controllers\EmployeeLeave\LeaveUndertimeController;
use App\Http\Controllers\EmployeeLeave\LeaveMonitoringController;
use App\Http\Controllers\DownloadSeperateWorkExperienceController;
use App\Http\Controllers\Account\Employee\LeaveApplicationController;
use App\Http\Controllers\EmployeeLeave\CompensatoryBuildUpController;
use App\Http\Controllers\Maintenance\EmployeeLeaveIncrementController;
use App\Http\Controllers\Account\Employee\LeaveCertificationController;
use App\Http\Controllers\EmployeeLeave\LeaveForwardedBalanceController;
use App\Http\Controllers\DashboardController as AdminDashboardController;
use App\Http\Controllers\Account\Employee\PrintLeaveApplicationController;
use App\Http\Controllers\Account\Employee\EmployeePersonalDataSheetController;
use App\Http\Controllers\Maintenance\LeaveController as MaintenanceLeaveController;
use App\Http\Controllers\Account\Employee\DashboardController as EmployeeDashboardController;

Route::get('/', function () {
    $user = Auth::user();
    if ($user && $user->user_type === User::USER_TYPES['ADMINISTRATOR']) {
        return redirect()->to(route('administrator.dashboard'));
    } elseif ($user && $user->user_type === User::USER_TYPES['USER']) {
        return redirect()->to(route('employee.dashboard'));
    } else {
        return redirect()->to(route('login'));
    }
});

Route::resource('notifications', 'NotificationController');
Route::get('administrator/dashboard', [AdminDashboardController::class, 'index']);

Route::group(['middleware' => ['auth', 'administrator']], function () {
    Route::get('administrator/dashboard', [AdminDashboardController::class, 'index'])->name('administrator.dashboard');
    Route::get('personal-data-sheet/{idNumber}', [PersonalDataSheetController::class, 'edit'])->name('employee.personal-data-sheet.edit');
    Route::get('personnel-file', [PersonnelFile201Controller::class, 'index'])->name('employee.personnel-file.index');
    Route::get('download-personnel-file/{fileName}', function (string $fileName) {
        return response()->download(storage_path().'\\app\\employees_file\\'.$fileName);
    });

    Route::post('employee-personnel-file/{id}', [EmployeePersonnelFileController::class, 'store'])->name('employee.personnel-file.store');

    Route::get('administrator/profile', [AdminProfileController::class, 'edit'])->name('administrator.profile');
    Route::put('administrator/profile', [AdminProfileController::class, 'update'])->name('administrator.update.profile');

    Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');

    Route::get('user/list', [UserController::class, 'list'])->name('users.list');
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    /* Creating a route for the SalaryGradeController. */
    Route::get('salary-grade-list', [SalaryGradeController::class, 'list'])->name('salary-grade-list');
    Route::resource('salary-grade', SalaryGradeController::class);
    Route::post('/import-salarygrade', [SalaryGradeController::class, 'ImportSalaryGrade'])->name('import');

    /* Creating a route for the MaintenancePositionController. */
    Route::get('maintenance-position-list', [MaintenancePositionController::class, 'list'])->name('maintenance-position-list');
    Route::resource('maintenance-position', MaintenancePositionController::class);
    Route::get('maintenance-position/{id}', [MaintenancePositionController::class, 'destroy'])->name('maintenance-position.delete');

    /* Creating a route for the MaintenanceOfficeController. */
    Route::get('maintenance-office-list', [MaintenanceOfficeController::class, 'list'])->name('maintenance-office-list');
    Route::resource('maintenance-office', MaintenanceOfficeController::class);
    Route::get('maintenance-office/{id}', [MaintenanceOfficeController::class, 'destroy'])->name('maintenance-office.delete');

    /* Creating a route for the MaintenanceDivisionController. */
    // Route::get('maintenance-division-list', [MaintenanceDivisionController::class, 'list'])->name('maintenance-division-list');
    Route::get('/maintenance-division-list/{office_code?}', 'MaintenanceDivisionController@list')->name('maintenance-division-list');
    Route::resource('maintenance-division', MaintenanceDivisionController::class);
    Route::get('maintenance-division/{id}', [MaintenanceDivisionController::class, 'destroy'])->name('maintenance-division.delete');

    /* Creating a route for the PlantillaOfScheduleController. */
    Route::get('plantilla-of-schedule-list/{office?}/{year?}', [PlantillaOfScheduleController::class, 'list'])->name('plantilla-of-schedile.lists');
    Route::get('plantilla-of-schedule', [PlantillaOfScheduleController::class, 'index'])->name('plantilla-of-schedule.index');
    Route::post('plantilla-of-schedule-store', [PlantillaOfScheduleController::class, 'store'])->name('plantilla-of-schedule.store');
    Route::post('bulk-plantilla-of-schedule-generate', [PlantillaOfScheduleController::class, 'generate'])->name('plantilla-of-schedule.generate');

    Route::get('position-schedule-list-adjusted/{year}', [PositionScheduleController::class, 'adjustedlist'])->name('position.schedule.list.adjusted');
    Route::resource('position-schedule', PositionScheduleController::class);
    Route::get('position-schedule/edit/{edit}', [PositionScheduleController::class, 'edits'])->name('position-schedule.edits');
    Route::put('position-schedule/update/{edit}', [PositionScheduleController::class, 'updates'])->name('position-schedule.updates');
    Route::get('position-schedule-list', [PositionScheduleController::class, 'list']);

    Route::get('plantilla-list/{office?}/{year?}', [PlantillaController::class, 'list']);
    Route::resource('plantilla-of-personnel', PlantillaController::class);
    Route::put('plantilla-of-personnel/{id}', [PlantillaController::class, 'update']);

    Route::resource('plantilla-of-position', PlantillaOfPositionController::class);
    Route::get('plantilla-of-position-list/{office_code?}', [PlantillaOfPositionController::class, 'list']);
    Route::get('plantilla-of-position/{id}', [PlantillaOfPositionController::class, 'destroy'])->name('plantilla-of-position.destroy');
    Route::put('plantilla-of-position/{id}', [PlantillaOfPositionController::class, 'update']);

    Route::get('promotion/list/{office?}/{year?}', [PromotionController::class, 'list'])->name('promotion.list');
    Route::get('promotions', [PromotionController::class, 'index'])->name('promotion.index');
    Route::get('promotion/create', [PromotionController::class, 'create'])->name('promotion.create');
    Route::post('promotion/store', [PromotionController::class, 'store'])->name('promotion.store');
    Route::get('promotion/{id}/edit', [PromotionController::class, 'edit'])->name('promotion.edit');
    Route::put('promotion/{id}/edit', [PromotionController::class, 'update'])->name('promotion.update');
    Route::delete('promotion/{id}/delete', [PromotionController::class, 'destroy'])->name('promotion.destroy');
    Route::get('see-more/promotions', [StepPromotionController::class, 'upcomingStep'])->name('promotion.see-more');

    Route::get('step-increment/list', 'StepIncrementController@list');
    Route::delete('step-increment/{id}', 'StepIncrementController@destroy')->name('step-increment.delete');
    Route::post('/', 'StepIncrementController@store')->name('create.step');
    Route::put('step-increment/{id}', 'StepIncrementController@update')->name('step-increment.update');
    Route::resource('step-increment', 'StepIncrementController');

    Route::get('/print-increment/{id}/previewed', 'PrintIncrementController@print')->name('step-increment.previewed.print');
    Route::get('/print-increment/{id}', 'PrintIncrementController@printList')->name('print-increment');
    Route::resource('/print-increment', 'PrintIncrementController');

    /* A route for the salary adjustment. */
    Route::get('/salary-adjustment/{id}', 'SalaryAdjustmentController@destroy')->name('salary-adjustment.delete');
    Route::resource('/salary-adjustment', 'SalaryAdjustmentController');

    Route::get('/salary-adjustment-list/{employeeOffice?}/{currentSgyear?}', 'SalaryAdjustmentController@list');
    Route::put('/salary-adjustment/update/{id}', 'SalaryAdjustmentController@update');
    Route::get('/print-adjustment/{id}/previewed', 'PrintAdjustmentController@print')->name('salary-adjustment.previewed.print');
    Route::get('/print-adjustment/{id}', 'PrintAdjustmentController@printList')->name('print-adjustment');

    Route::resource('/salary-adjustment-per-office', 'SalaryAdjustmentPerOfficeController');
    Route::get('/salary-adjustment-per-office-list', 'SalaryAdjustmentPerOfficeController@list');
    Route::get('/salary-adjustment-per-office-not-selected-list', 'SalaryAdjustmentPerOfficeController@NotSelectedlist');
    Route::get('/salary-adjustment-per-office/{id}', 'SalaryAdjustmentPerOfficeController@destroy')->name('salary-adjustment-per-office.delete');
    Route::put('/salary-adjustment-per-office/update/{id}', 'SalaryAdjustmentPerOfficeController@update');
    Route::delete('/salary-adjustment-per-offices/{id}', 'SalaryAdjustmentPerOfficeController@destroy');

    // Service Records
    Route::get('service-record/{id}', [ServiceRecordsController::class, 'destroy'])->name('service-records.delete');
    Route::get('service-records-list', [ServiceRecordsController::class, 'list']);
    Route::resource('service-records', ServiceRecordsController::class);

    Route::get('employees-birthdays/{from}/{to}', [BirthdayController::class, 'range']);
    Route::resource('employees-birthday', BirthdayController::class);
    Route::get('birthday-card/{name}', [BirthdayCardController::class, 'firstCard']);
    Route::get('birthday-card-2/{name}', [BirthdayCardController::class, 'secondCard']);

    Route::group(['prefix' => 'employee'], function () {
        Route::get('leave/application', [LeaveController::class, 'show'])->name('leave.application.filling');
        Route::get('leave/leave-recall', [LeaveRecallController::class, 'index'])->name('leave.leave-recall');
        Route::resource('leave-recall', LeaveRecallController::class);
        Route::post('employee-leave-application-filling', [LeaveApplicationController::class, 'storeByAdmin'])->name('employee.leave.application.filling.admin.create');
        Route::get('list/leave-forwarded-balance', [LeaveForwardedBalanceController::class, 'list'])->name('leave-forwarded-balance.list');
        Route::post('leave-forwarded-balance/{id}', [LeaveForwardedBalanceController::class, 'destroy']);
        Route::get('leave-forwarded-balance/{id}/edit', [LeaveForwardedBalanceController::class, 'edit']);
        Route::put('leave-forwarded-balance/{id}', [LeaveForwardedBalanceController::class, 'update']);
        Route::resource('leave-forwarded-balance', LeaveForwardedBalanceController::class);

        Route::get('leave-list/list', [LeaveListController::class, 'list']);
        Route::get('leave-list', [LeaveListController::class, 'index'])->name('leave.leave-list');
        Route::get('leave/leave-list/{edit}', [LeaveListController::class, 'edit'])->name('leave-list.edit');
        Route::get('leave/leave-list/{id}/print', [LeaveListController::class, 'print'])->name('leave-list.print');
        Route::delete('leave-list/{id}', [LeaveListController::class, 'destroy'])->name('leave-list.delete');
        Route::put('leave/leave-list/{id}', [LeaveListController::class, 'update'])->name('leave-list.update');

        Route::get('leave-monitoring/{id}', [LeaveMonitoringController::class, 'list']);
        Route::resource('leave-monitoring', LeaveMonitoringController::class);

        Route::resource('late-undertime', LeaveUndertimeController::class);

        Route::get('leave/compensatory-build-up', [CompensatoryBuildUpController::class, 'list'])->name('compensatory-build-up.list');
        Route::get('leave/compensatory-build-up/{id}/{year}', [CompensatoryBuildUpController::class, 'listComLeaveByYear']);
        Route::get('leave/compensatory-build-up/forfeited/{id}/{year}', [CompensatoryBuildUpController::class, 'forfeited']);
        Route::get('leave/compensatory-build-up/updateForfeited/{emloyeeID}/{year}', [CompensatoryBuildUpController::class, 'updateForfeited']);
        Route::post('compensatory-build-up/{id}', [CompensatoryBuildUpController::class, 'destroy']);
        Route::resource('compensatory-build-up', CompensatoryBuildUpController::class);
    });

    Route::group(['prefix' => 'maintenance'], function () {
        Route::get('leave/list', [MaintenanceLeaveController::class, 'list']);
        Route::resource('leaveIncrement', LeaveIncrementController::class);
        Route::get('employee-leave-increment', [EmployeeLeaveIncrementController::class, 'index'])->name('employee.leave.increment');
        Route::post('leave/increments/guard/{month}', [EmployeeLeaveIncrementController::class, 'validateMonth']);
        Route::post('leave/increments/{month}', [EmployeeLeaveIncrementController::class, 'increment'])->name('employee.leave.increment.submit');
        Route::get('leave/increments/{employeeID}', [EmployeeLeaveIncrementController::class, 'show'])->name('employee.leave.increment.show');

        Route::resource('leave', MaintenanceLeaveController::class);
    });

    Route::get('holiday/list', [HolidayController::class, 'list']);
    Route::resource('holiday', HolidayController::class);

    Route::get('profile', 'EmployeeController@profile');

    Route::get('salary-grade/{year}', [SalaryGradePrintController::class, 'index'])->name('salary-grade-print');
    Route::post('leave-increment-job', 'LeaveIncrementJobController');
});

Auth::routes(['register' => false]);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'submitLogin'])->name('submit.login');

Route::get('404', function () {
    return view('errors.423');
})->name('423-leave-application');

Route::fallback(function () {
    abort(404);
});

Route::controller(PrintServiceRecordController::class)->group(function () {
    Route::post('service-record-print/{employeeID}/pdf', 'pdf');
    Route::post('service-record-print/{employeeID}/excel', 'excel');
    Route::get('service-record-print/{employeeID}/{type}/download', 'download');
});

Route::group(['prefix' => 'prints'], function () {
    Route::get('salary-grade/{year}', [SalaryGradePrintController::class, 'index'])->name('salary-grade-print');
    Route::post('download-personal-data-sheet/generate/{employeeID}', [DownloadPersonalDataSheetController::class, 'generate']);
    Route::get('download-personal-data-sheet-pdf/{employeeID}', [DownloadPersonalDataSheetController::class, 'pdf']);
    Route::get('download-personal-data-sheet-excel/{employeeID}', [DownloadPersonalDataSheetController::class, 'excel']);
    Route::get('download-personal-data-sheet-work-experience-excel/{employeeID}', [DownloadSeperateWorkExperienceController::class, 'excel']);
});

Route::controller(CSCPlantillaReportController::class)->group(function () {
    Route::get('show-plantilla-report', 'index')->name('show-plantilla-report');
    Route::post('plantilla-report/generate/{office}/{year}', 'generate')->name('generate.plantilla-report');
    Route::post('export/{office}/{year}', 'export')->name('generate.plantilla-report');
    Route::post('export/all/office/{year}', 'exportAll')->name('generate-all.plantilla-report');
    Route::get('download/plantilla-generated-report/{fileName}', 'download')->name('download.generated.plantilla-report');
});

Route::controller(DBMPlantillaReportController::class)->group(function () {
    Route::post('dbm/plantilla-report/generate/{office}/{year}', 'generate')->name('dbm.generate.plantilla-report');
    Route::get('dbm/plantilla-report/download/{fileName}', 'download')->name('dmb.download.plantilla-report');
});

Route::middleware('auth')->controller(EmployeeTrainingController::class)->group(function () {
    Route::get('trainings-report', 'index')->name('trainings-report');
    Route::get('trainings-report/{office?}/{year?}', 'generate')->name('trainings-report.generate');
});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('employee-dashboard', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('employee-personal-data-sheet', [EmployeePersonalDataSheetController::class, 'edit'])->name('employee.personal-data-sheet');
    Route::get('print-leave-application/{applicationID}', [PrintLeaveApplicationController::class, 'print']);

    Route::group(['middleware' => 'verify.application.submitted'], function () {
        Route::get('employee-leave-application-filling', [LeaveApplicationController::class, 'create'])->name('employee.leave.application.filling');
        Route::post('employee-leave-application-filling', [LeaveApplicationController::class, 'store'])->name('employee.leave.application.filling.submit');
    });

    Route::get('employee-leave-history/list', [ProfileController::class, 'list'])->name('employee.leave.history.list');
    Route::get('employee-personal-profile', [ProfileController::class, 'index'])->name('employee.personal.profile');
    Route::put('employee-update-account-information', [ProfileController::class, 'update'])->name('employee.update.account.information');

    Route::get('employee-leave-card', [LeaveCardController::class, 'index'])->name('employee.leave.card.index');
    Route::get('employee-leave-card/{start?}/{end?}', [LeaveCardController::class, 'withRange'])->name('employee.leave.card.with.range.index');
    Route::post('employee-leave-card-print', [LeaveCardController::class, 'print'])->name('employee.leave.card.print');

    Route::get('employee-payslip', [PaySlipController::class, 'index'])->name('employee.payslip');

    // Route::get('leave-certification-print', [LeaveCertificationController::class, 'index'])->name('print-leave-certification');

    Route::get('employee-chat', [ChatController::class, 'index'])->name('employee.chat');
});


Route::get('export-image', function () {
    $employees = Employee::get(['Employee_id', 'ImagePhoto']);
    foreach ($employees as $employee) {
        file_put_contents(public_path('assets\\images\\'.$employee->Employee_id.'.jpg'), $employee->ImagePhoto);
    }

    return redirect()->route('');
});
