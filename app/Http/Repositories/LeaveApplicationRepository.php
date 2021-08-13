<?php
namespace App\Http\Repositories;

use App\User;
use App\Employee;
use App\LeaveType;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\EmployeeLeaveApplication;
use App\EmployeeLeaveRecord;

class LeaveApplicationRepository
{
    public const ON_GOING = 'on-going';

    public function __construct()
    {
        $this->today = Carbon::now();
    }

    private function isGenderApplicable(string $gender, LeaveType $leaveType) : bool
    {
        return Str::contains($leaveType->applicable_gender, $gender);
    }

    private function isRequiredServiceEnough(int $employeeServiceDays, LeaveType $leaveType) : bool
    {
        return $employeeServiceDays >= $leaveType->required_rendered_service;
    }

    private function isEmployeePointsEnough(int $earned, LeaveType $leaveType) : bool
    {
        return $earned >= $leaveType->days_period;
    }

    

    public function fileApplication(Employee $employee, LeaveType $leaveType)
    {
        // applicable_to_gender
        if(!$this->isGenderApplicable($employee->sex, $leaveType)) {
            return ['status' => false, 'message' => 'Something went wrong please refresh this page and check your gender is not applicable for this leave.'];
        }

        // calculate days of first_day_of_service
        $noOfDaysInService = Carbon::now()->diffInDays(Carbon::parse($employee->first_day_of_service));
        
        // required_rendered_service
        if(!$this->isRequiredServiceEnough($noOfDaysInService, $leaveType)) {
            return ['status' => false, 'message' => 'Something went wrong please refresh this page and check your rendered service is not enough to apply for this leave.'];
        }

        $earned = EmployeeLeaveRecord::where(['leave_type_id' => $leaveType->id, 'employee_id' => $employee->employee_id])
                                        ->get()
                                        ->sum('earned');

        if(!$this->isEmployeePointsEnough($earned, $leaveType)) {
            return ['status' => false, 'message' => 'Something went wrong please refresh this page and check your leave points for this leave type.'];
        }

        return ['status' => true];
    }

    public function applicationFiles(User $user)
    {
        return $user->employee->leave_files;
    }

    private function onGoingWhere(string $type, string $date)
    {
        $method = 'where' . ucfirst($type);
        
        $relations = [
                        'employee:employee_id,lastname,middlename,firstname,extension',
                        'employee.information:EmpIDNo,photo,office_code,pos_code',
                        'employee.information.office:office_code,office_name,office_short_name',
                        'employee.information.position:position_code,position_name',
                        'type:id,name'
        ];

        return EmployeeLeaveApplication::with($relations)
                                        ->where('approved_status', self::ON_GOING)
                                        ->$method('date_from', $date)
                                        ->get();
    }

    public function onGoingToday()
    {
        return $this->onGoingWhere('date', $this->today->format('Y-m-d'));
    }


    public function onGoingForTomorrow()
    {
        return $this->onGoingWhere('date', $this->today->addDay(1)->format('Y-m-d'));
    }

    public function onGoingForNextSevenDays()
    {
        return $this->onGoingWhere('date', $this->today->addDay(7)->format('Y-m-d'));
    }


}