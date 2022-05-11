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

    // private function isGenderApplicable()
    // {
        // return Str::contains($leaveType->applicable_gender, $gender);
    // }

    private function isRequiredServiceEnough(int $employeeServiceDays, LeaveType $leaveType) : bool
    {
        return $employeeServiceDays >= $leaveType->required_rendered_service;
    }

    private function isEmployeePointsEnough(int $earned, int $noOfDays) : bool
    {
        return $earned >= $noOfDays;
    }

    public function fileApplication(array $employee = [], LeaveType $leaveType, int $noOfDays)
    {

        // applicable_to_gender
        // if(!$this->isGenderApplicable($employee['sex'], $leaveType)) {
        //     return ['status' => false, 'message' => 'This leave type is not applicable to your gender'];
        // }

        // calculate days of first_day_of_service
        // $noOfDaysInService = Carbon::now()->diffInDays(Carbon::parse($employee['first_day_of_service']));
        
        // required_rendered_service
        // if(!$this->isRequiredServiceEnough($noOfDaysInService, $leaveType)) {
        //     return ['status' => false, 'message' => 'Required rendered service'];
        // }

        $earned = EmployeeLeaveRecord::where(['leave_type_id' => $leaveType->id, 'employee_id' => $employee['employee_id']])
                                        ->get()
                                        ->sum('earned');
        
        if(!$this->isEmployeePointsEnough($earned, $noOfDays)) {
            return ['status' => false, 'message' => 'Insufficient leave points'];
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