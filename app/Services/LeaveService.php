<?php
namespace App\Services;

use App\EmployeeLeaveApplication;
use App\EmployeeLeaveRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LeaveService
{
    public const STATUS = [
        'all',
        'pending',
        'approved',
        'declined',
        'on-going',
        'enjoyed',
    ];

    public function getEmployeeApplied() : array
    {
        return EmployeeLeaveApplication::get(['employee_id'])
                                ->pluck('employee_id')
                                ->toArray();
    }

    public function countAllStatus() : array
    {
        $data = [];

        foreach(self::STATUS as $status) {
            $data[$status] = EmployeeLeaveApplication::where('approved_status', $status)
                                                    ->count();
        }

        return $data;
    }

}