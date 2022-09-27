<?php

namespace App\Services;

use App\Employee;
use App\EmployeeCivilService;
use App\Plantilla;
use App\Promotion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class EmployeeService
{
    public const INACTIVE = 0;

    public const ACTIVE = 1;

    public function getJobOrdersCount(): int
    {
            return Employee::without(['position', 'office'])
                ->where('isActive', self::ACTIVE)
                ->where('Work_Status', 'LIKE', '%JOB ORDER%')
                ->orWhere('Work_Status', 'LIKE', '%CONTRACT OF SERVICE%')
                ->count();
    }

    public function findByEmployeeID(string $employeeID): Employee
    {
        $employeeID = str_pad($employeeID, 4, 0, STR_PAD_LEFT);
        return Employee::exclude(['ImagePhoto', 'signaturephoto'])->with(['account', 'province_residential', 'city_residential', 'barangay_residential', 'province_permanent', 'city_permanent', 'barangay_permanent'])
            ->find($employeeID);
    }

    public function getRegularsCount(): int
    {
            return Employee::without(['position', 'office'])
                ->where('isActive', self::ACTIVE)
                ->where('Work_Status', 'NOT LIKE', '%JOB ORDER%')
                ->orWhere('Work_Status', 'NOT LIKE', '%CONTRACT OF SERVICE%')
                ->count();
    }

    private function getPromotedEmployeesByYear(string $year): Collection
    {
        return Promotion::where('sg_year', $year)->get();
    }

    public function getNoOfPromotedEmployees(string $year): int
    {
        return $this->getPromotedEmployeesByYear($year)->count();
    }

    public function getActiveEmployees(): int
    {
        return Employee::without(['position', 'office'])
            ->where('isActive', self::ACTIVE)
            ->count();
    }

    public function getInActiveEmployees(): int
    {
            return Employee::without(['position', 'office'])
                ->where('isActive', self::INACTIVE)
                ->count();
    }

    public function getNoOfEmployeesWithEligibility(): int
    {
        return EmployeeCivilService::distinct('employee_id')->count();
    }

    public function getNoOfEmployeesWithNewPlantilla(): int
    {
        $currentYear = date('Y');

        return Employee::permanent()->active()->whereHas('plantilla', function () use ($currentYear) {
            return Plantilla::where('year', $currentYear);
        })->count();
    }

    public function getLastId(): int
    {
        return Employee::max('employee_id') + 1;
    }

    public function getEmployeeIDS()
    {
        return Employee::get(['Employee_id'])->pluck('Employee_id');
    }
}
