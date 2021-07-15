<?php

namespace App\Http\Controllers\Maintenance;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class LeaveController extends Controller
{
    /**
     * Return list of all leave types in json format.
     *
     * @return void
     */
    public function list()
    {
        if (request()->ajax()) {
            
            $types = LeaveType::select('id', 'name', 'code', 'description', 'days_period', 'convertible_to_cash', 'applicable_gender', 'required_rendered_service', 'editable')
                    ->orderBy('created_at', 'DESC');

            return (new Datatables)->eloquent($types)
                    ->make(true);
                    
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = LeaveType::get();
        return view('maintenance.leave.index', compact('types'));
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
        if($request->ajax()) {
            $this->validate($request, [
                'name'                      => 'required',
                'code'                      => 'nullable|max:10',
                'description'               => 'nullable|string',
                'days_period'               => 'required',
                'convertible_to_cash'       => 'nullable',
                'applicable_gender'         => 'required|in:male,female,female/male',
                'required_rendered_service' => 'required',
                'editable'                  => 'nullable',
            ]);

            LeaveType::create([
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description,
                'days_period' => $request->days_period,
                'convertible_to_cash' => $request->has('convertible_to_cash') ? 'yes' : 'no',
                'applicable_gender' => $request->applicable_gender,
                'required_rendered_service' => $request->required_rendered_service,
                'editable' => $request->has('editable') ? 'yes' : 'no',
            ]);

            return response()->json(['success' => true], 201);
        }
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
    public function edit($id) : LeaveType
    {
        return LeaveType::findOrFail($id);
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
        if($request->ajax()) {
            $this->validate($request, [
                'edit_name'                      => 'required',
                'edit_code'                      => 'nullable|max:10',
                'edit_description'               => 'nullable|string',
                'edit_days_period'               => 'required',
                'edit_convertible_to_cash'       => 'nullable',
                'edit_applicable_gender'         => 'required|in:male,female,female/male',
                'edit_required_rendered_service' => 'required',
                'edit_editable'                  => 'nullable',
            ], [], [
                'edit_name'                      => 'name',
                'edit_code'                      => 'code',
                'edit_description'               => 'description',
                'days_period'                    => 'days_period',
                'edit_convertible_to_cash'       => 'convertible_to_cash',
                'edit_applicable_gender'         => 'applicable_gender',
                'edit_required_rendered_service' => 'required_rendered_service',
                'edit_editable'                  => 'editable',
            ]);

            $leaveType = LeaveType::findOrFail($id);
            
            $leaveType->name = $request->edit_name;
            $leaveType->code = $request->edit_code;
            $leaveType->description = $request->edit_description;
            $leaveType->days_period = $request->edit_days_period;
            $leaveType->convertible_to_cash = $request->has('edit_convertible_to_cash') ? 'yes' : 'no';
            $leaveType->applicable_gender = $request->edit_applicable_gender;
            $leaveType->required_rendered_service = $request->edit_required_rendered_service;
            $leaveType->editable = $request->has('edit_editable') ? 'yes' : 'no';

            $leaveType->save();

            return response()->json(['success' => $leaveType], 202);
        }

        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        return response()->json(['success' => $leaveType->delete()]);
    }
}
