<?php

namespace App\Http\Controllers\Reports;

use App\Office;
use App\Employee;
use Illuminate\Http\Request;
use App\EmployeeTrainingAttained;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeTrainingController extends Controller
{
    public function index()
    {
        $offices = DB::connection('DTR_PAYROLL_CONNECTION')->table('Office')->where('Description', '!=', 'TEMP')->get();
        $years = range(2016, date('Y', strtotime('+1 year')));
        rsort($years);
        
        return view('reports.training.index', [
            'offices' => $offices,
            'years' => $years,
        ]);
    }

    public function generate(string $office = '*', string $month = '*')
    {
        return Employee::without(['position', 'office_assignment'])
                        ->with('program_attained')
                        ->where('OfficeCode', $office)
                        ->find(4994, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode']);
                        
    }
}
