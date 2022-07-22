<?php

namespace App\Http\Controllers\Prints;

use App\Http\Controllers\Controller;
use App\SalaryGrade;

class SalaryGradePrintController extends Controller
{
    public function index(string $year)
    {
        $grades = SalaryGrade::where('sg_year', $year)->get();
        $pdf = \App::make('snappy.pdf.wrapper');
        // $pdf->setOption('header-html', base_path('views/reports/header.blade.php'));
        $pdf->loadView('SalaryGrade.print', compact('grades', 'year'))->setPaper('letter')->setOrientation('portrait');

        return $pdf->inline();
    }
}
