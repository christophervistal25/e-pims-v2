<?php
namespace App\Http\Repositories;

use App\Employee;
use App\EmployeeLeaveRecord;
use Illuminate\Support\Collection;
use App\Http\Repositories\LeaveApplicationRepository;
use Carbon\Carbon;

class LeaveRecordRepository extends LeaveApplicationRepository
{
    public const SICK_LEAVE_CODE_NUMBER = 10001;
    public const VACATION_LEAVE_CODE_NUMBER = 10002;

    public function records(Employee $employee) : Collection
    {
        return $employee->leave_records->groupBy('leave_type.name');
    }

    public function getAsOfDate(string $employeeID) : string
    {
        return EmployeeLeaveRecord::where('employee_id', $employeeID)
                                ->whereNotNull('fb_as_of')
                                ->first()['fb_as_of'] ?? '';
    }

    private function getRecordByLeaveCode(int $codeNumber, string $employeeID) : Collection
    {
        return EmployeeLeaveRecord::whereHas('type', function ($query) use ($codeNumber) {
                return $query->where('code_number', $codeNumber);
            })->where('employee_id', $employeeID)->get();
    }

    public function getVacationLeave(string $employeeID) :array
    {
        $records = $this->getRecordByLeaveCode(self::VACATION_LEAVE_CODE_NUMBER, $employeeID);
        return ($records->count() !== 0) ? [
                'vacation_leave_earned' => $records->sum('earned'),
                'vacation_leave_used'   => $records->sum('used'),
        ] : [
            'vacation_leave_earned' => 0.000,
            'vacation_leave_used'   => 0.000,
        ];
    }

    public function getSickLeave(string $employeeID) : array
    {
        $records = $this->getRecordByLeaveCode(self::SICK_LEAVE_CODE_NUMBER, $employeeID);
        return ($records->count() !== 0) ? [
                'sick_leave_earned' => $records->sum('earned'),
                'sick_leave_used'   => $records->sum('used'),
        ] : [
            'sick_leave_earned'   => 0.000,
            'sick_leave_used' => 0.000,
        ];
    }
    
    public static function employeesWithRecord(array $columns = ['*']) : Collection
    {
        return Employee::has('leave_records')
                    ->whereHas('leave_records', function ($query) {
                        $query->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonthsNoOverflow()->format('m'));
                })->get($columns);
    }

    public function increment(array $data = [])
    {
        return EmployeeLeaveRecord::create($data);
    }


}