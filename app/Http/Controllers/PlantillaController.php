<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Plantilla;
use App\Employee;
use App\SalaryGrade;
use App\Office;
use App\Position;
class PlantillaController extends Controller
{

    public function employee()
    {
        return Employe::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $employee = Employee::get();
        $office = Office::get();
        $position = Position::get();
        $salarygrade = SalaryGrade::get(['sg_no']);
        $status = ['Please Select', 'Casual', 'Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        count($status) - 1;
        $areacode = ['Please Select', 'Region 1', 'Region 2','Region 3','Region 4','Region 5', 'Region 6', 'Region 7',  'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12','NCR', 'CAR', 'CARAGA', 'ARMM'];
        count($areacode) - 1;
        $areatype = ['Please Select','Region','Province','District','Municipality','Foreign Post'];
        count($areatype) - 1;
        $arealevel = ['Please Select','K','T','S','A'];
        count($arealevel) - 1;
        // $sg_no = 1;
        // $selected_step = 2;
        // $currentSalaryamount = SalaryGrade::where('sg_no', $sg_no)->first(['sg_year', 'sg_step' . $selected_step ]);
        // dd($currentSalaryamount);
        return view('Plantilla.Plantilla', compact('employee', 'status', 'position', 'areacode', 'areatype', 'office', 'arealevel', 'salarygrade'));
    }
    // }
    public function list()
    {
        return Datatables::of(Plantilla::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'itemNo'                        => 'required',
            'oldItemNo'                     => 'required',
            'positionTitle'                 => 'required',
            'employeeName'                  => 'required',
            'salaryGrade'                   => 'required|in:' . implode(',',range(1, 33)),
            'stepNo'                        => 'required|in:' . implode(',',range(1, 8)),
            'salaryAmount'                  => 'required',
            'officeCode'                    => 'required|in:' . implode(',',range(10001, 10025)),
            'divisionId'                    => 'required|in:' . implode(',',range(10001, 10025)),
            'originalAppointment'           => 'required',
            'lastPromotion'                 => 'required',
            'status'                        => 'required|in:Casual,Contractual,Coterminous,Coterminous-Temporary
                                                ,Permanent,Provisional,Regular Permanent,Substitute,Temporary,Elected',
            'areaCode'                      => 'required|in: Region 1,Region 2,Region 3,Region 4,Region 5,Region 6,Region 7,Region 8,Region 9,Region 10,Region 11,  Region 12,NCR,CAR,CARAGA, ARMM',
            'areaType'                      => 'required|in:Region,Province,District,Municipality,Foreign Post',
            'areaLevel'                     => 'required|in:K,T,S,A',
        ]);
        $plantilla = new Plantilla;
        $plantilla->item_no                = $request['itemNo'];
        $plantilla->old_item_no            = $request['oldItemNo'];
        $plantilla->position_id            = $request['positionTitle'];
        $plantilla->position_ext           = $request['positionTitleExt'];
        $plantilla->employee_id            = $request['employeeName'];
        $plantilla->sg_no                  = $request['salaryGrade'];
        $plantilla->step_no                = $request['stepNo'];
        $plantilla->salary_amount          = $request['salaryAmount'];
        $plantilla->office_code            = $request['officeCode'];
        $plantilla->division_id            = $request['divisionId'];
        $plantilla->date_original_appointment = $request['originalAppointment'];
        $plantilla->date_last_promotion    = $request['lastPromotion'];
        $plantilla->status                 = $request['status'];
        $plantilla->area_code              = $request['areaCode'];
        $plantilla->area_type              = $request['areaType'];
        $plantilla->area_level             = $request['areaLevel'];
        $plantilla->save();
        return redirect('/plantilla')->with('success','Added Successfully');
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
