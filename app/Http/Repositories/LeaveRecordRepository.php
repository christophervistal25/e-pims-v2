<?php
namespace App\Http\Repositories;

use App\Employee;
use App\EmployeeLeaveRecord;
use App\LeaveType;
use Illuminate\Database\Eloquent\Collection;

class LeaveRecordRepository
{
    public const VACATION_LEAVE_CODE = 'VL';
    public const SICK_LEAVE_CODE = 'SL';

    public function records(Employee $employee) : Collection
    {
        return $employee->leave_records->groupBy('leave_type.name');
    }

    public function getAsOfDate(string $employeeID) : string
    {
        return EmployeeLeaveRecord::where('employee_id', $employeeID)
                                ->whereNotNull('fb_as_of')
                                ->first()['fb_as_of'];
    }

    private function getRecordByLeaveCode(string $code, string $employeeID) : Collection
    {
        return EmployeeLeaveRecord::whereHas('type', function ($query) use ($code) {
            return $query->where('code', $code);
        })->where('employee_id', $employeeID)->get();
    }

    public function getVacationLeave(string $employeeID) :array
    {
        $records = $this->getRecordByLeaveCode(self::VACATION_LEAVE_CODE, $employeeID);
        if($records->count() !== 0) {
            return [
                'vacation_leave_earned'  => $records->sum('earned'),
                'vacation_leave_used' => $records->sum('used'),
            ];
        }

        return [
            'vacation_leave_earned'  => 0.000,
            'vacation_leave_used' => 0.000,
        ];
    }

    public function getSickLeave(string $employeeID)
    {
        $records = $this->getRecordByLeaveCode(self::SICK_LEAVE_CODE, $employeeID);
        if($records->count() !== 0) {
            return [
                'sick_leave_earned'  => $records->sum('earned'),
                'sick_leave_used' => $records->sum('used'),
            ];
        }

        return [
            'sick_leave_earned'  => 0.000,
            'sick_leave_used' => 0.000,
        ];
    }


}