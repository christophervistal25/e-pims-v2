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
        return EmployeeLeaveApplication::get(['Employee_id'])
                                ->pluck('Employee_id')
                                ->toArray();
    }

    public function countAllStatus() : array
    {
        $data = [];
 
        foreach(self::STATUS as $status) {
            $data[$status] =  EmployeeLeaveApplication::where('status', $status)->count();
        }   
        return $data;
    }

}