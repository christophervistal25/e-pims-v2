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

    private function getByMonthAndDate(string $month, string $date): Collection
    {
        return Employee::whereMonth('Birthdate', $month)
            ->whereDay('Birthdate', $date)
            ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'OfficeCode', 'PosCode']);
    }

    public function today(): Collection
    {
        return $this->getByMonthAndDate($this->currentMonth, $this->currentDay);
    }

    public function tomorrow(): Collection
    {
        $date  = Carbon::now()->addDays(1);
        $month = $date->format('m');
        $day   = $date->format('d');

        return $this->getByMonthAndDate($month, $day);
    }

    public function weekBefore(): Collection
    {
        $date  = Carbon::now()->addDay(self::ONE_WEEK);
        $month = $date->format('m');
        $day   = $date->format('d');

        return $this->getByMonthAndDate($month, $day);
    }

    public function getByRange(string $from, string $to): Collection
    {
        $fromMonth = Carbon::parse($from)->format('m');
        $fromDate = Carbon::parse($from)->format('d');
        $toMonth = Carbon::parse($to)->format('m');
        $toDate = Carbon::parse($to)->format('d');

        return DB::connection('DTR_PAYROLL_CONNECTION')->table('Employees')
            ->whereMonth('Birthdate', '>=', $fromMonth)
            ->whereMonth('Birthdate', '<=', $toMonth)
            ->whereDay('Birthdate', '>=', $fromDate)
            ->whereDay('Birthdate', '<=', $toDate)
            ->leftJoin('E_PIMS.dbo.positions', 'Employees.PosCode', '=', 'E_PIMS.dbo.positions.position_code')
            ->leftJoin('Office', 'Employees.OfficeCode', '=', 'Office.OfficeCode')
            ->where('isActive', 1)
            ->select(['Employee_id', 'FirstName', 'LastName', 'MiddleName', 'Suffix', 'BirthDate', 'positions.position_name', 'Office.Description'])
            ->orderBy('Birthdate', 'ASC')
            ->get();
    }
}
