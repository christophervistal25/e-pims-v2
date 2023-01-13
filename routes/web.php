<?php

use App\User;
use App\Office2;
use App\Section;
use App\Setting;
use App\Division;
use App\Employee;
use App\Position;
use Carbon\Carbon;
use App\PersonnelFile;
use App\Payslip\Payroll;
use App\EmployeePersonnelFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\service_record as ServiceRecord;
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
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Controllers\MaintenanceSectionController;
use App\Http\Controllers\PrintServiceRecordController;
use App\Http\Controllers\EmployeeLeave\LeaveController;
use App\Http\Controllers\MaintenanceDivisionController;
use App\Http\Controllers\MaintenancePositionController;
use App\Http\Controllers\PlantillaOfPositionController;
use App\Http\Controllers\PlantillaOfScheduleController;
use App\Http\Controllers\Reports\CSCPlantillaController;
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
use App\Http\Controllers\ReportSalaryAdjustmentController;
use App\Http\Controllers\Reports\DBMPlantillaReportController;
use App\Http\Controllers\EmployeeLeave\LeaveUndertimeController;
use App\Http\Controllers\EmployeeLeave\LeaveMonitoringController;
use App\Http\Controllers\DownloadSeperateWorkExperienceController;
use App\Http\Controllers\Account\Employee\LeaveApplicationController;
use App\Http\Controllers\EmployeeLeave\CompensatoryBuildUpController;
use App\Http\Controllers\Maintenance\EmployeeLeaveIncrementController;
use App\Http\Controllers\EmployeeLeave\LeaveForwardedBalanceController;
use App\Http\Controllers\DashboardController as AdminDashboardController;
use App\Http\Controllers\Account\Employee\PrintLeaveApplicationController;
use App\Http\Controllers\Account\Employee\EmployeePersonalDataSheetController;
use App\Http\Controllers\Maintenance\LeaveController as MaintenanceLeaveController;
use App\Http\Controllers\Account\Employee\DashboardController as EmployeeDashboardController;

Route::get('/', function () {
    $user = auth()->user();
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
    Route::put('salary-grade/{id}', [SalaryGradeController::class, 'update']);
    Route::post('import-salarygrade', [SalaryGradeController::class, 'ImportSalaryGrade'])->name('import');

    /* Creating a route for the MaintenancePositionController. */
    Route::get('maintenance-position-list', [MaintenancePositionController::class, 'list'])->name('maintenance-position-list');
    Route::resource('maintenance-position', MaintenancePositionController::class);
    Route::put('maintenance-position-update/{id}', [MaintenancePositionController::class, 'update']);
    Route::get('maintenance-position/{id}', [MaintenancePositionController::class, 'destroy'])->name('maintenance-position.delete');

    /* Creating a route for the MaintenanceOfficeController. */
    Route::get('maintenance-office-list', [MaintenanceOfficeController::class, 'list'])->name('maintenance-office-list');
    Route::resource('maintenance-office', MaintenanceOfficeController::class);
    Route::put('maintenance-office-update/{id}', [MaintenanceOfficeController::class, 'update']);
    Route::get('maintenance-office/{id}', [MaintenanceOfficeController::class, 'destroy'])->name('maintenance-office.delete');

    /* Creating a route for the MaintenanceDivisionController. */
    // Route::get('maintenance-division-list', [MaintenanceDivisionController::class, 'list'])->name('maintenance-division-list');
    Route::get('maintenance-division-list/{office_code?}', 'MaintenanceDivisionController@list')->name('maintenance-division-list');
    Route::resource('maintenance-division', MaintenanceDivisionController::class);
    Route::get('maintenance-division/{id}', [MaintenanceDivisionController::class, 'destroy'])->name('maintenance-division.delete');

    /* Creating a route for the MaintenanceSectionController. */
    Route::resource('maintenance-section', MaintenanceSectionController::class);
    Route::get('maintenance-section-list/{sectionId?}', 'MaintenanceSectionController@list')->name('maintenance-section-list');
    Route::get('maintenance-section/{id}', [MaintenanceSectionController::class, 'destroy'])->name('maintenance-section.delete');

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
    Route::get('plantilla-of-personnel/edit/{id}/{year}', [PlantillaController::class, 'edit']);
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
    Route::get('promotion/{promotion}', [PromotionController::class, 'show'])->name('promotion.show');
    Route::get('see-more/promotions', [StepPromotionController::class, 'upcomingStep'])->name('promotion.see-more');

    Route::get('step-increment/list/{office_code?}', 'StepIncrementController@list');
    Route::delete('step-increment/{id}', 'StepIncrementController@destroy')->name('step-increment.delete');
    Route::post('/', 'StepIncrementController@store')->name('create.step');
    Route::put('step-increment/{id}', 'StepIncrementController@update')->name('step-increment.update');
    Route::resource('step-increment', 'StepIncrementController');

    Route::get('print-increment/{id}/previewed', 'PrintIncrementController@print')->name('step-increment.previewed.print');
    Route::get('print-increment/{id}', 'PrintIncrementController@printList')->name('print-increment');
    Route::resource('print-increment', 'PrintIncrementController');

    /* A route for the salary adjustment. */
    Route::get('salary-adjustment/{id}', 'SalaryAdjustmentController@destroy')->name('salary-adjustment.delete');
    Route::resource('salary-adjustment', 'SalaryAdjustmentController');

    Route::get('salary-adjustment-list/{employeeOffice?}/{currentSgyear?}', 'SalaryAdjustmentController@list');
    Route::put('salary-adjustment/update/{id}', 'SalaryAdjustmentController@update');
    Route::get('print-adjustment/{id}/previewed', 'PrintAdjustmentController@print')->name('salary-adjustment.previewed.print');
    Route::get('print-adjustment/{id}', 'PrintAdjustmentController@printList')->name('print-adjustment');

    Route::resource('salary-adjustment-per-office', 'SalaryAdjustmentPerOfficeController');
    Route::get('salary-adjustment-per-office-list', 'SalaryAdjustmentPerOfficeController@list');
    Route::get('salary-adjustment-per-office-not-selected-list', 'SalaryAdjustmentPerOfficeController@NotSelectedlist');
    Route::get('salary-adjustment-per-office/{id}', 'SalaryAdjustmentPerOfficeController@destroy')->name('salary-adjustment-per-office.delete');
    Route::put('salary-adjustment-per-office/update/{id}', 'SalaryAdjustmentPerOfficeController@update');
    Route::delete('salary-adjustment-per-offices/{id}', 'SalaryAdjustmentPerOfficeController@destroy');

    // Service Records
    Route::get('service-record/{id}', [ServiceRecordsController::class, 'destroy'])->name('service-records.delete');
    Route::get('service-records-list/{employeeId}', [ServiceRecordsController::class, 'list']);
    Route::resource('service-records', ServiceRecordsController::class);

    Route::controller(BirthdayController::class)->group(function () {
        Route::get('employees-birthdays/{from}/{to}', 'range');
        Route::get('employees-birthday', 'index')->name('employees-birthday.index');
    });

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

    Route::get('profile', 'EmployeeController@profile');

    Route::get('salary-grade/{year}', [SalaryGradePrintController::class, 'index'])->name('salary-grade-print');

});

Auth::routes(['register' => false]);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'submitLogin'])->name('submit.login');


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

Route::controller(CSCPlantillaController::class)->middleware('auth')->group(function () {
    Route::get('plantilla-report-history-list/{year}/{type}', 'list');
    Route::get('plantilla-report-history', 'index')->name('plantilla.report.index');
    Route::get('plantilla-report/show/{id}', 'show')->name('plantilla.report.show');
    Route::get('plantilla-report/show/{id}/list/{office}', 'listShow')->name('plantilla.report.show.list');
    Route::put('plantilla-report-show/{id}/vacant', 'vacant');
    Route::post('plantilla-report-show/assign', 'assigned');
    Route::post('plantilla-report-detail-filled', 'filled');
    Route::post('plantilla-report-history-generate', 'generate');
    Route::delete('plantilla-report-history-remove/{id}', 'remove');
    Route::post('plantilla-report-history-checkpoint', 'checkpoint');
    Route::get('plantilla-report-details/view-detials/{id}', 'viewDetails');
});

Route::post('export/{id}/{type}', [CSCPlantillaReportController::class, 'export'])->name('generate.plantilla-report');
Route::get('download/plantilla-generated-report/{fileName}', [CSCPlantillaReportController::class, 'download'])->name('download.generated.plantilla-report');

Route::controller(ReportSalaryAdjustmentController::class)->middleware('auth')->group(function () {
    // Route::get('salaryadjustment-report-list/{office}/{year}', 'list');
    Route::get('salaryadjustment-report', 'index')->name('salaryadjustment.report.index');
    Route::get('salaryadjustment-report-with-office/{office}/{year?}', 'withoffice');
    Route::get('salaryadjustment-report-without-office/{office}/{year?}', 'withoutoffice');
    Route::get('print-adjustment-report-list/{office}/{year}/previewed', 'printlist');
    Route::get('print-adjustment-report-individual/{office}/{year}/previewed', 'previewedindividual');
    Route::get('print-adjustment-report-individual/{office}/{year}/print', 'printindividual');
    Route::post('print-adjustment-report-individual-editfirstparagraph', 'editfirstparagraph');
    // Route::get('plantilla-report/show/{id}/list/{office}', 'listShow')->name('plantilla.report.show.list');
    // Route::put('plantilla-report-show/{id}/vacant', 'vacant');
    // Route::post('plantilla-report-detail-filled', 'filled');
    // Route::post('plantilla-report-history-generate', 'generate');
    // Route::delete('plantilla-report-history-remove/{id}', 'remove');
    // Route::post('plantilla-report-history-checkpoint', 'checkpoint');
    // Route::get('plantilla-report-details/view-detials/{id}', 'viewDetails');
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

    Route::get('employee-chat', [ChatController::class, 'index'])->name('employee.chat');
});


Route::get('employee-show/{id}', function ($id) {
    $employee = Employee::with(['file_records:id,Employee_id,name,date,file,created_at,file_id', 'file_records.file_details', 'plantilla', 'plantilla.plantilla_positions', 'plantilla.plantilla_positions.position', 'account'])->exclude(['ImagePhoto', 'ImagePhoto2', 'signaturephoto'])->findOrFail($id);
    $file_records = $employee->file_records;
    $personnelFiles = PersonnelFile::whereNotIn('id', $file_records->pluck('file_id')->toArray())->get();

    $file_records = $employee->file_records->groupBy('file_details.name');

    $payrolls = Payroll::with(['details' => function ($query) use($id) {
        $query->where('employee_id', $id);
    }, 'personal_deductions' => function ($query) use($id)  {
        $query->where('employee_id', $id);
    }, 'mandatory_deductions' => function ($query) use($id) {
        $query->where('employee_id', $id);
    }, 'compensations' => function ($query) use($id) {
        $query->where('employee_id', $id);
    }, 'mandatory_deductions.description', 'mandatory_deductions.description.account_chart', 'personal_deductions.description', 'personal_deductions.description.account_chart', 'compensations.description', 'compensations.description.account_chart'])->whereHas('details', function ($query) use($id)  {
        $query->where('employee_id', $id);
    })->orderBy('created_at')->get();

    $months = array_map(function ($payroll_no) {
        [$month, $_] = explode('-', $payroll_no);

        return $month;
    }, $payrolls->pluck('payroll_no')->toArray());

    $months = array_unique($months);

    $serviceRecords = ServiceRecord::where('Employee_id', $id)->orderBy('service_from_date', 'DESC')->get();

    $charging = Office2::get();

    $assignment = Office2::get();

    $positions = Position::get();

    return view('employee.files.index', [
        'employee'       => $employee,
        'charging' => $charging,
        'personnelFiles' => $personnelFiles,
        'file_records'   => $file_records,
        'payrolls'       => $payrolls,
        'months'         => $months,
        'serviceRecords' => $serviceRecords,
        'positions' => $positions,
        'assignment' => $assignment,
    ]);
})->name('employee.profile')->middleware('auth');

Route::post('personnel-file-upload', function () {
    if(request()->file('file')) {
        $uploaded = request()->file('file')->store('temp');
        $uploaded = str_replace('temp/', 'temp\\', $uploaded);
        $data = file_get_contents(storage_path( "app\\" . $uploaded));
        $data = Crypt::encryptString($data);

        $record = EmployeePersonnelFile::create([
            'Employee_id' => request()->emp,
            'name' => request()->name,
            'file' => request()->file('file')->getClientOriginalName(),
            'file_id' => request()->id,
            'date' => date('Y-m-d'),
        ]);

        $db = DB::connection("E_PIMS_CONNECTION")->getPdo();
        $id = Setting::where('Keyname', 'PERSONNEL_FILE_ID')->first()->Keyvalue;
        $statement = $db->prepare("UPDATE Epims.dbo.Employee_Personnel_Files SET file_code = :file_code WHERE id = :id ");
        $statement->bindValue(':id', $id);
        $statement->bindParam(':file_code', $data, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $statement->execute();

        unlink(storage_path( "app\\" . $uploaded));
    }

    return response()->json(['success' => true, 'file_id' => request()->id, 'name' => request()->file('file')->getClientOriginalName(), 'created_at' => $record->created_at]);
});

Route::get('personnel-file-download/{id}', function () {
    EmployeePersonnelFile::get()->each(function ($row) {
            $decrypted = Crypt::decryptString($row->file_code);
            $file = fopen(storage_path("app\\temp\\" . Carbon::parse($row->created_at)->timestamp . '_' . $row->file), "w");
            fwrite($file, $decrypted);
            fclose($file);
    });
});

Route::get('welcome', function () {
    $divisions = Division::get();
    $divisions->each(function ($app) {
        dump($app->division_name);
    });

});
