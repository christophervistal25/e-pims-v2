<?php
namespace App\Services;

use App\Employee;
use Carbon\Carbon;
use App\Services\EmployeeService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class EmployeeBirthdayService extends EmployeeService
{
    public const ONE_WEEK = 7;

    public function __construct()
    {
        $this->currentDay = date('d', time());
        $this->currentMonth = date('m', time());
    }

    private function getByMonthAndDate(string $month, string $date) : Collection
    {
        return Employee::whereMonth('Birthdate', $month)
                        ->whereDay('Birthdate', $date)
                        ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'OfficeCode', 'PosCode']);
    }

    public function today() : Collection
    {
        return Cache::rememberForever('EMPLOYEE_TODAYS_BIRTHDAY', function () {
            return $this->getByMonthAndDate($this->currentMonth, $this->currentDay);
        });
    }

    public function tomorrow() : Collection
    {
        $date  = Carbon::now()->addDays(1);
        $month = $date->format('m');
        $day   = $date->format('d');

        return Cache::rememberForever('EMPLOYEE_TOMORROW_BIRTHDAY', function () use($month, $day) {
            return $this->getByMonthAndDate($month, $day);
        });
    }

    public function weekBefore() : Collection
    {
        $date  = Carbon::now()->addDay(self::ONE_WEEK);
        $month = $date->format('m');
        $day   = $date->format('d');
        
        return Cache::rememberForever('EMPLOYEE_ONE_WEEK_BEFORE_BIRTHDAY', function () use($month, $day) {
            return $this->getByMonthAndDate($month, $day);
        });
    }

    public function getByRange(string $from, string $to) : Collection
    {
        return DB::connection('DTR_PAYROLL_CONNECTION')->table('Employees')
                            ->whereBetween('BirthDate', [$from, $to])
                            ->leftJoin('E_PIMS.dbo.positions', 'Employees.PosCode', '=', 'E_PIMS.dbo.positions.position_code')
                            ->leftJoin('Office', 'Employees.OfficeCode', '=', 'Office.OfficeCode')
                            ->select(['Employee_id', 'FirstName', 'LastName', 'MiddleName', 'Suffix', 'BirthDate' ,'positions.position_name', 'Office.Description'])
                            ->get();
    }
}