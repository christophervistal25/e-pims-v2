<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryAdjustment;
use App\Setting;
use App\Employee;
use Illuminate\Support\Facades\App;
class PrintAdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salaryAdjustment.print.printAdjustment');
    }
    public function print($id)
    {
        $salaryAdjustment = SalaryAdjustment::find($id);
        $setting = Setting::find('SALARYADPRINT');
        // return view('salaryAdjustment.print.previewed', compact('salaryAdjustment', 'setting'));
        $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('salaryAdjustment.print.previewed', compact('salaryAdjustment', 'setting', 'space'))->setPaper('letter')->setOrientation('portrait');
        return $pdf->inline();
    }
    public function printList($id)
    {
        // $salaryAdjustment = SalaryAdjustment::with(['employee','plantilla', 'plantilla.plantilla_positions.position', 'plantilla.office'])->find($id);
        $salaryAdjustment = SalaryAdjustment::find($id);
        $setting = Setting::find('SALARYADPRINT');
        return view('salaryAdjustment.print.printAdjustment', compact('salaryAdjustment', 'id', 'setting'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
