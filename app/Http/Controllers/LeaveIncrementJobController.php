<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Jobs\LeaveIncrementJob;
use App\Http\Repositories\LeaveRecordRepository;


class LeaveIncrementJobController extends Controller
{
    public function __invoke()
    {
        $employees = Employee::permanent()->active()
                            ->pluck('Employee_id')
                            ->toArray();
        

        LeaveIncrementJob::dispatchIf(
            $employees->count() !== 0, $employees
        )->onQueue('high')->delay(now()->addSeconds(3));
        
        return true;
    }
}
