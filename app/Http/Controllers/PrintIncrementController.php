<?php

namespace App\Http\Controllers;

use App\Office;
use App\Employee;
use App\Plantilla;
use App\StepIncrement;
use App\PrintIncrement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PrintIncrementController extends Controller
{
   
    public function index()
    {

        return view('stepIncrement.print.printIncrement');

    }


    public function print($id)
    {
        $stepIncrement = StepIncrement::with(['employee:Employee_id,FirstName,MiddleName,LastName,OfficeCode'])->find($id);
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('stepIncrement.print.previewed', compact('stepIncrement', 'id'))->setPaper('letter')->setOrientation('portrait');
        
        return $pdf->inline();
    }

    // PREVIEW //
    public function printList($id)
    {

        $stepIncrement = StepIncrement::with(['employee:Employee_id,FirstName,MiddleName,LastName,OfficeCode'])->find($id);

        return view('stepIncrement.print.printIncrement', compact('stepIncrement', 'id'));

    }

  
}
