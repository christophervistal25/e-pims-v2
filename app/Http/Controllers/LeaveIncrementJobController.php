<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\LeaveRecordRepository;
use App\Jobs\LeaveIncrementJob;


class LeaveIncrementJobController extends Controller
{
    public function __invoke()
    {
        $employees = LeaveRecordRepository::employeesWithRecord(['employee_id']);
        
        $data = $employees->pluck('employee_id')->toArray();

        LeaveIncrementJob::dispatchIf(
            $employees->count() !== 0, $data
        )->onQueue('high')->delay(now()->addSeconds(3));
        
        return true;
    }
}
