<?php

namespace App\Http\Controllers\Account\Employee;

use Carbon\Carbon;
use App\Payslip\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaySlipController extends Controller
{
    public function index()
    {
        // Get the all payrolls of the current user
        $payrolls = Payroll::with(['details' => function ($query) {
            $query->where('employee_id', auth()->user()->Employee_id);
        }, 'personal_deductions' => function ($query) {
            $query->where('employee_id', auth()->user()->Employee_id);
        }, 'mandatory_deductions' => function ($query) {
            $query->where('employee_id', auth()->user()->Employee_id);
        }, 'compensations' => function ($query) {
            $query->where('employee_id', auth()->user()->Employee_id);
        }, 'mandatory_deductions.description', 'mandatory_deductions.description.account_chart', 'personal_deductions.description', 'personal_deductions.description.account_chart', 'compensations.description', 'compensations.description.account_chart'])->whereHas('details', function ($query) {
            $query->where('employee_id', auth()->user()->Employee_id);
        })->orderBy('created_at')->get();

        $months = array_map(function ($payroll_no) {
            list($month, $sequenceNo) = explode("-", $payroll_no);
            return $month;
        }, $payrolls->pluck('payroll_no')->toArray());


        $months = array_unique($months);

        return view('accounts.employee.payslip.index', compact('payrolls', 'months'));
    }

}
