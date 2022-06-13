<?php

use App\Employee;
use App\EmployeeLeaveRecord;
use App\Jobs\LeaveIncrementJob;
use App\EmployeeLeaveTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use App\EmployeeLeaveForwardedBalance;
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

Artisan::command('increment', function () {
      Employee::active()->permanent()->get()->each(function ($employee) {
      });
});

Artisan::command('files_dump', function () {
      $generatedServiceRecords = glob(storage_path() . '\\' . 'files\\*');
      $generatedPds = glob(storage_path() . '\\' . 'generated_pds\\*');

      foreach ($generatedServiceRecords as $generated) {
            unlink($generated);
      }

      foreach ($generatedPds as $generated) {
            unlink($generated);
      }
});
