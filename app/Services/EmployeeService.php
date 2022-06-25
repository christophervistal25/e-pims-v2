<?php

namespace App\Services;

use App\User;
use App\Employee;
use App\Plantilla;
use App\Promotion;
use App\EmployeeCivilService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    public const INACTIVE = 0;
    public const ACTIVE = 1;

    public function getJobOrdersCount(): int
    {
        return Cache::rememberForever('JOB_ORDERS_COUNT', function () {
            return Employee::without(['position', 'office'])
                ->where('isActive', self::ACTIVE)
                ->where('Work_Status', 'LIKE', '%JOB ORDER%')
                ->orWhere('Work_Status', 'LIKE', '%CONTRACT OF SERVICE%')
                ->count();
        });
    }

    public function findByEmployeeID(string $employeeID): Employee
    {
        $employeeID = str_pad($employeeID, 4, 0, STR_PAD_LEFT);
        return Employee::exclude(['ImagePhoto'])->with(['account', 'province_residential', 'city_residential', 'barangay_residential', 'province_permanent', 'city_permanent', 'barangay_permanent'])
            ->find($employeeID);
    }

    public function getRegularsCount(): int
    {
        return Cache::rememberForever('REGULARS_COUNT', function () {
            return Employee::without(['position', 'office'])
                ->where('isActive', self::ACTIVE)
                ->where('Work_Status', 'NOT LIKE', '%JOB ORDER%')
                ->orWhere('Work_Status', 'NOT LIKE', '%CONTRACT OF SERVICE%')
                ->count();
        });
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
        return Cache::rememberForever('IN_ACTIVE_EMPLOYEES', function () {
            return Employee::without(['position', 'office'])
                ->where('isActive', self::INACTIVE)
                ->count();
        });
    }

    public function getNoOfEmployeesWithEligibility(): int
    {
        return Cache::rememberForever('EMPLOYEES_WITH_CIVIL_SERVICE', function () {
            return EmployeeCivilService::has('employee')->count();
        });
    }

    public function getNoOfEmployeesWithNewPlantilla(): int
    {
        return Cache::rememberForever('EMPLOYEES_WITH_NEW_PLANTILLA', function () {
            $currentYear = date('Y');
            return Plantilla::has('employee')->where('year', $currentYear)->count();
        });
    }

    public function getLastId(): int
    {
        return Employee::max('employee_id') + 1;
    }

    public function getEmployeeIDS()
    {
        return Employee::get(['Employee_id'])->pluck('Employee_id');
    }


    public function addNewEmployee(array $data = []): Employee
    {

        $employee = new Employee();
        $employee['Employee_id'] = $data['employeeID'];
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
        $employee['philhealth_no'] = $data['philhealth_no'];
        $employee['pagibig_no'] = $data['pagibig_no'];
        $employee['tin_no'] = $data['tin_no'];
        $employee['gsis_no'] = $data['gsis_no'];
        if (array_key_exists('salary_grade', $data)) {
            $employee['sg_no'] = $data['salary_grade'];
        }

        if (array_key_exists('step_increment', $data)) {
            $employee['step'] = $data['step_increment'];
        }

        if (!is_null($data['username'])) {
            $user = User::updateOrCreate([
                'Employee_id' => $data['employeeID']
            ], [
                'username' => $data['username'],
                'user_type' => $data['user_type'],
            ]);

            if (!is_null($data['password'])) {
                $user->password = bcrypt($data['password']);
                $user->save();
            }
        }
        $employee->save();
        return $employee;
    }

    /**
     * It updates the employee information and if the username is not null, it will update the user
     * information.
     * </code>
     * 
     * @param array data array of data
     * @param Employee employee the employee object
     */
    public function updateInformation(array $data, Employee $employee): Employee
    {
        $employee = tap($employee, function ($employee) use ($data) {
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
            $employee['philhealth_no'] = $data['philhealth_no'];

            if (array_key_exists('salary_grade', $data)) {
                $employee['sg_no'] = $data['salary_grade'];
            }

            if (array_key_exists('step_increment', $data)) {
                $employee['step'] = $data['step_increment'];
            }

            if (!is_null($data['username'])) {
                $user = User::updateOrCreate([
                    'Employee_id' => $data['employeeID']
                ], [
                    'username' => $data['username'],
                    'user_type' => $data['user_type'],
                ]);

                if (!is_null($data['password'])) {
                    $user->password = bcrypt($data['password']);
                    $user->save();
                }
            }


            $employee->save();
        });

        return $employee->exclude(['ImagePhoto'])->first();
    }
}
