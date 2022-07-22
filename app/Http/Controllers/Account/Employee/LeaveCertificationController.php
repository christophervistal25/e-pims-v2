<?php

namespace App\Http\Controllers\Account\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Repositories\LeaveRecordRepository;
use App\Services\MSAccess;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveCertificationController extends Controller
{
    public function __construct(MSAccess $database, LeaveRecordRepository $leaveRecordRepository)
    {
        $this->database = $database;
        $this->leaveRecordRepository = $leaveRecordRepository;
    }

    public function index()
    {
        $employee = Employee::with(['information', 'information.office', 'information.position'])->find(Auth::user()->employee_id, [
            'employee_id', 'firstname', 'middlename', 'lastname', 'extension',
        ]);

        ['vacation_leave_earned' => $vacationLeave] = $this->leaveRecordRepository->getVacationLeave($employee->employee_id);
        ['sick_leave_earned' => $sickLeave] = $this->leaveRecordRepository->getSickLeave($employee->employee_id);

        $total = number_format($vacationLeave + $sickLeave, 3, '.', '');

        $forwardedBalanceAsOf = $this->leaveRecordRepository->getAsOfDate($employee->employee_id);
        $office = $employee->information->office;

        $columns = ['head', 'vl_balance', 'sl_valance', 'total', 'cert_day', 'lastname', 'position', 'office', 'fullname', 'fb_as_of'];

        $values = [
            $office->office_head, number_format($vacationLeave, 3, '.', ''), number_format($sickLeave, 3, '.', ''), $total, Carbon::now()->format('jS \d\a\y \o\f F, Y \a\t \T\a\n\d\a\g \C\i\t\y'), $employee->lastname,
            $employee->information->position->position_name.', ', $office->office_name.', ', $employee->fullname.' ,', $forwardedBalanceAsOf,
        ];

        $columns = '('.implode(',', $columns).')';

        $values = "('".implode("','", $values)."')";

        $this->database->execute('DELETE * FROM leave_certification');
        $this->database->execute("INSERT INTO leave_certification ${columns} VALUES ${values}");

        return response()->json(['success' => true]);
    }
}
