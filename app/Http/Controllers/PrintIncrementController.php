<?php

namespace App\Http\Controllers;

use App\Office;
use App\Employee;
use App\Plantilla;
use App\StepIncrement;
use App\PrintIncrement;
use Illuminate\Http\Request;

class PrintIncrementController extends Controller
{
   
    public function index()
    {
        return view('stepIncrement.print.printIncrement');
    }


    public function print($id)
    {
       
        $stepIncrement = StepIncrement::with(['employee:Employee_id,FirstName,MiddleName,LastName,OfficeCode'])->find($id);
        // $office = $stepIncrement->employee->office_charging->Description;
        // dd($office);


        return view('stepIncrement.print.previewed', compact('stepIncrement', 'id'));
    }

    
    public function printList($id)
    {

        $stepIncrement = StepIncrement::with(['employee:Employee_id,FirstName,MiddleName,LastName,OfficeCode'])->find($id);

        // $office = $stepIncrement->employee->office_charging->Description;
        // dd($stepIncrement);


        return view('stepIncrement.print.printIncrement', compact('stepIncrement', 'id'));

    }

  
}
