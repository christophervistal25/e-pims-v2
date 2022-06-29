<?php

namespace App\Http\Repositories;

use App\Employee;
use App\EmployeeLeaveForwardedBalance;
use Carbon\Carbon;
use App\EmployeeLeaveRecord;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\LeaveApplicationRepository;

class LeaveRecordRepository extends LeaveApplicationRepository
{

      public function getCredits(string $employeeID)
      {
            return EmployeeLeaveForwardedBalance::where('Employee_id', $employeeID)->orderBy('date_forwarded', 'DESC')->get();
      }

     /**
      * It gets the leave credits of an employee.
      * 
      * @param Employee employee the employee object
      * 
      * @return array Array
      * (
      *     [slBalance] => 0.000
      *     [vlBalance] => 0.000
      *     [vawcBalance] => 0.000
      *     [adoptBalance] => 0.000
      *     [mandatoryBalance] => 0.000
      *     [maternityBalance] => 0.000
      *     [paternityBalance] => 0.
      */
     
      public function getEmployeeLeaveCredits(Employee $employee) : array
      {
            $credits = [
                'slBalance'         => ($employee->leave_increments->where('leave_type_id', 'SL')->sum('transaction.leave_amount') + $employee->forwarded_leave_records?->sl_balance) - $employee->leave_files?->where('leave_type_id', 'SL')->sum('no_of_days'),
                'vlBalance'         =>  ($employee->leave_increments->where('leave_type_id', 'VL')->sum('transaction.leave_amount') + $employee->forwarded_leave_records?->vl_balance) - $employee->leave_files?->where('leave_type_id', 'VL')->sum('no_of_days'),
                'vawcBalance'       => $employee->forwarded_leave_records?->vawc_balance - $employee->leave_files?->where('leave_type_id', 'VAWC')->sum('no_of_days'),
                'adoptBalance'      => $employee->forwarded_leave_records?->adopt_balance - $employee->leave_files?->where('leave_type_id', 'AL')->sum('no_of_days'),
                'mandatoryBalance'  => $employee->forwarded_leave_records?->mandatory_balance - $employee->leave_files?->where('leave_type_id', 'FL')->sum('no_of_days'),
                'maternityBalance'  => $employee->forwarded_leave_records?->maternity_balance - $employee->leave_files?->where('leave_type_id', 'ML')->sum('no_of_days'),
                'paternityBalance'  => $employee->forwarded_leave_records?->paternity_balance - $employee->leave_files?->where('leave_type_id', 'PL')->sum('no_of_days'),
                'soloparentBalance' => $employee->forwarded_leave_records?->soloparent_balance - $employee->leave_files?->where('leave_type_id', 'SOLOPARENT')->sum('no_of_days'),
                'emergencyBalance'  => $employee->forwarded_leave_records?->emergency_balance - $employee->leave_files?->where('leave_type_id', 'SEL')->sum('no_of_days'),
                'slbBalance'        => $employee->forwarded_leave_records?->slb_balance - $employee->leave_files?->where('leave_type_id', 'SLB')->sum('no_of_days'),
                'studyBalance'      => $employee->forwarded_leave_records?->study_balance - $employee->leave_files?->where('leave_type_id', 'STL')->sum('no_of_days'),
                'splBalance'        => $employee->forwarded_leave_records?->spl_balance - $employee->leave_files?->where('leave_type_id', 'SPL')->sum('no_of_days'),
                'rehabBalance'      => $employee->forwarded_leave_records?->rehab_balance - $employee->leave_files?->where('leave_type_id', 'RL')->sum('no_of_days'),
            ];

            return array_map(function($value) {
                return number_format($value, 3, ".", "");
            }, $credits);
      }

      /**
       * It gets the employee's leave records with the status of approved
       * 
       * @param string employeeID the employee's ID
       * @param status approved, disapproved, pending
       * 
       * @return <code>{
       *     "Employee_id": "12345",
       *     "FirstName": "John",
       *     "MiddleName": "Doe",
       *     "LastName": "Smith",
       *     "Suffix": "Jr.",
       *     "OfficeCode": "123",
       *     "OfficeCode2": "456",
       *     "PosCode
       */
      public function getEmployeeLeaveRecords(string $employeeID, $status = 'approved')
      {
            return Employee::has('leave_files')->with(['forwarded_leave_records', 'leave_files' => function ($query) use($status) {
                $query->where('status', $status);
            }])->find($employeeID, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'OfficeCode2', 'PosCode']);
      }

      public function records(Employee $employee): Collection
      {
            return $employee->leave_records->groupBy('leave_type.name');
      }

      public function getAsOfDate(string $employeeID): string
      {
            return EmployeeLeaveRecord::with('type')
                  ->where('employee_id', $employeeID)
                  ->whereNotNull('fb_as_of')
                  ->where('record_type', 'F')
                  ->first()['fb_as_of'] ?? '';
      }


      public function getForwardedRecord(string $employeeID)
      {
            return EmployeeLeaveForwardedBalance::where('Employee_id', $employeeID)->first();
      }

      public function getForwardedRecordWithRange(string $employeeID, string $fromDate, string $toDate): Collection
      {
            $fromDate = Carbon::parse($fromDate);
            $toDate  = Carbon::parse($toDate);

            return $this->getForwardedRecord($employeeID)
                  ->filter(function ($record) use ($fromDate, $toDate) {
                        return Carbon::parse($record->fb_as_of)->between($fromDate, $toDate) or Carbon::parse($record->fb_as_of)->between($fromDate, $toDate);
                  });
      }

      public function getRecordsWithoutForwarded(string $employeeID): Collection
      {
            return EmployeeLeaveRecord::whereHas('employee', function ($query) use ($employeeID) {
                  return $query->where('employee_id', $employeeID);
            })->with(['type', 'undertime', 'leave_file_application' => function ($query) {
                  $query->where('approved_status', 'approved');
            }])->orderBy('date_record', 'ASC')
                  ->get()
                  ->filter(function ($query) {
                        return $query->record_type === 'I' || $query->record_type === 'D';
                  });
      }

      public function getRecordsWithoutForwardedByRange(string $employeeID, string $fromDate, string $toDate): Collection
      {
            $fromDate = Carbon::parse($fromDate);
            $toDate  = Carbon::parse($toDate);

            return $this->getRecordsWithoutForwarded($employeeID)->filter(function ($record) use ($fromDate, $toDate) {
                  return Carbon::parse($record->date_record)->between($fromDate, $toDate) or Carbon::parse($record->date_record)->between($fromDate, $toDate);
            });
      }

      private function getRecordByLeaveCode(int $codeNumber, string $employeeID): Collection
      {
            return EmployeeLeaveRecord::whereHas('type', function ($query) use ($codeNumber) {
                  return $query->where('code_number', $codeNumber);
            })->where('employee_id', $employeeID)->get();
      }


      public static function employeesWithRecord(array $columns = ['*']): Collection
      {
            return Employee::has('leave_records')
                  ->whereHas('leave_records', function ($query) {
                        $query->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonthsNoOverflow()->format('m'));
                  })->get($columns);
      }

      public function increment(array $data = [])
      {
            try {
                  EmployeeLeaveRecord::create($data);
            } catch (\Exception $exception) {
                  dd($exception->getMessage());
            }
      }
}
