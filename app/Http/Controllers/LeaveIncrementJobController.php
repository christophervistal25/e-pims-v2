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
        foreach($employees as $employee) {
            
        }
        
        return true;
    }
}
