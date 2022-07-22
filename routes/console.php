<?php

use App\Employee;
use App\Jobs\LeaveIncrementJob;
use App\Plantilla;
use App\PlantillaPosition;
use App\Promotion;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('increment', function () {
    $employees = Employee::without(['position', 'office_charging', 'office_assignment', 'office_charging.desc'])
        ->with(['leave_records' => function ($query) {
            $query->orderBy('date_record', 'DESC');
        }])
        ->permanent()
        ->active()
        ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix']);
    LeaveIncrementJob::dispatch($employees)->delay(now()->addSeconds(1));
});

Artisan::command('clear', function () {
    // Plantilla::truncate();
    // PlantillaPosition::truncate();
    // Promotion::truncate();
});

Artisan::command('files_dump', function () {
    $generatedServiceRecords = glob(storage_path().'\\'.'files\\*');
    $generatedPds = glob(storage_path().'\\'.'generated_pds\\*');

    foreach ($generatedServiceRecords as $generated) {
        unlink($generated);
    }

    foreach ($generatedPds as $generated) {
        unlink($generated);
    }
});
