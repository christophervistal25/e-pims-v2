<?php

use App\Employee;
use App\Jobs\LeaveIncrementJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Repositories\LeaveRecordRepository;



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