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
        // $stepIncrement = StepIncrement::with(['employee:employee_id,firstname,middlename,lastname,extension', 'employee.information:EmpIDNo,office_code,pos_code', 'employee.information.office', 'employee.information.position'])->find($id);
        $stepIncrement = StepIncrement::find($id);

        return view('stepIncrement.print.previewed', compact('stepIncrement'));
        // return view('stepIncrement.print.printIncrement', compact('stepIncrement'));
    }

    
    public function printList($id)
    {

        // $stepIncrement = StepIncrement::with(['plantilla', 'plantilla.position', 'plantilla.office', 'plantilla.employee'])->find($id);
        // $stepIncrement = StepIncrement::has('plantilla')->with(['plantilla'])->without('office_charging')->find($id);
        $data = StepIncrement::with(['office:office_code,office_name'])->find($id);
        // $position = $stepIncrement->position;
        $office = $data->office;

        // dd($data);

        return view('stepIncrement.print.printIncrement', compact('stepIncrement', 'office', 'id'));

    }

  
}
