<?php

namespace App\Services;

use App\Employee;
use Illuminate\Support\Str;

final class WorkStatusService
{
    public function availableWorkStatusForFilter()
    {
        return Employee::get(['Work_Status'])
                        ->pluck('Work_Status')
                        ->unique()
                        ->map(fn ($status) => Str::upper($status))
                        ->values()
                        ->toArray();
    }
}
