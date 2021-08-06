<?php
namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;
use App\EmployeeLeaveApplication;
use Illuminate\Database\Eloquent\Collection;

class LeaveApplicationRepository
{
    public const ON_GOING = 'on-going';

    public function __construct()
    {
        $this->today = Carbon::now();
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