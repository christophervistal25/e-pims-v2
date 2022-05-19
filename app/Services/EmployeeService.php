<?php
namespace App\Services;

use App\Employee;
use App\EmployeeCivilService;
use App\Plantilla;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    public const INACTIVE = 0;
    public const ACTIVE = 1;

    public function getJobOrdersCount() :int
    {
        return Cache::rememberForever('JOB_ORDERS_COUNT', function () {
            return Employee::without(['position', 'office'])
                        ->where('isActive', self::ACTIVE)
                        ->where('Work_Status', 'LIKE' , '%JOB ORDER%')
                        ->orWhere('Work_Status', 'LIKE', '%CONTRACT OF SERVICE%')
                        ->count();
        });
    }

    public function findByEmployeeID(string $employeeID) : Employee
    {
        return Employee::find($employeeID);
    }

    public function getRegularsCount() : int
    {
        return Cache::rememberForever('REGULARS_COUNT', function () {
            return Employee::without(['position', 'office'])
                    ->where('isActive', self::ACTIVE)
                    ->where('Work_Status', 'NOT LIKE' , '%JOB ORDER%')
                    ->orWhere('Work_Status', 'NOT LIKE', '%CONTRACT OF SERVICE%')
                    ->count();
        }); 
    }

    private function getPromotedEmployeesByYear(string $year) : Collection
    {
        return Employee::without(['position'])->where('isActive', self::ACTIVE)
                ->whereHas('step', function ($query) use($year) {
                    $query->whereYear('date_step_increment', $year);
                })->get();
    }

    public function getNoOfPromotedEmployees(string $year) : int
    {
        return $this->getPromotedEmployeesByYear($year)->count();
    }

    public function getActiveEmployees() : int
    {
        return Employee::without(['position', 'office'])
                        ->where('isActive', self::ACTIVE)
                        ->count();
    }

    public function getInActiveEmployees() : int
    {
        return Cache::rememberForever('IN_ACTIVE_EMPLOYEES', function () {
            return Employee::without(['position', 'office'])
                        ->where('isActive', self::INACTIVE)
                        ->count();
        });
    }

    public function getNoOfEmployeesWithEligibility() : int
    {
        return Cache::rememberForever('EMPLOYEES_WITH_CIVIL_SERVICE', function () {
            return EmployeeCivilService::has('employee')->count();
        });
    }

    public function getNoOfEmployeesWithNewPlantilla() : int
    {
        return Cache::rememberForever('EMPLOYEES_WITH_NEW_PLANTILLA', function () {
            $currentYear = date('Y');
            return Plantilla::has('employee')->where('year', $currentYear)->count();
        });
    }

    public function getLastId() : int
    {
        return Employee::max('employee_id') + 1;
    }

    public function getEmployeeIDS()
    {
        return Employee::get(['Employee_id'])->pluck('Employee_id');
    }

    public function updateInformation(array $data, Employee $employee) : Employee
    {
        return tap($employee, function ($employee) use($data) {
            $employee['FirstName'] = $data['firstname'];
            $employee['LastName'] = $data['lastname'];
            $employee['MiddleName'] = $data['middlename'];
            $employee['Suffix'] = $data['suffix'];
            $employee['Birthdate'] = $data['birthdate'];
            $employee['BirthPlace'] = $data['birthplace'];
            $employee['Gender'] = $data['gender'];
            $employee['CivilStatus'] = $data['civil_status'];
            $employee['Address'] = $data['address'];
            $employee['ContactNumber'] = $data['contact_no'];
            $employee['isActive'] = $data['active_status'];
            $employee['OfficeCode'] = $data['office_charging'];
            $employee['OfficeCode2'] = $data['office_assignment'];
            $employee['Work_Status'] = $data['status'];
            $employee['salary_rate'] = $data['salary_rate'];
            $employee['pagibig_no'] = $data['pagibig_no'];
            $employee['tin_no'] = $data['tin_no'];
            $employee['gsis_no'] = $data['gsis_no'];
            $employee['dbp_account_no'] = $data['dbp_account_no'];
            $employee['lbp_account_no'] = $data['lbp_account_no'];

            if(array_key_exists('salary_grade', $data)) {
                $employee['sg_no'] = $data['salary_grade'];
            }

            if(array_key_exists('step_increment', $data)) {
                $employee['step'] = $data['step_increment'];
            }

            $employee->save();
        });
    }

}