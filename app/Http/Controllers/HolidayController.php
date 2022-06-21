<?php

namespace App\Http\Controllers;

use App\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class HolidayController extends Controller
{

    /**
     * Return JSON list of holidays.
     *
     * @return void
     */

    public function list()
    {
        if (request()->ajax()) {
            $holidays = Holiday::select('id', 'name', 'date', 'type');
            return (new Datatables)->eloquent($holidays)
                ->make(true);
        }
    }
    /**
    pubic
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::get();
        return view('holiday.index', compact('holidays'));
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
        if ($request->ajax()) {
            $this->validate($request, [
                'name' => 'required',
                'date' => 'required|date|unique:holidays,date',
                'type' => 'required|in:' . implode(',', Holiday::TYPES),
            ]);

            Holiday::create([
                'name' => $request->name,
                'date' => date('m-d', strtotime($request->date)),
                'type' => $request->type,
            ]);

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
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
        if ($request->ajax()) {
            $this->validate($request, [
                'name' => 'required',
                'date' => 'required|date|unique:holidays,date,' . $id,
                'type' => 'required|in:' . implode(',', Holiday::TYPES),
            ]);

            $holiday = Holiday::find($id);
            $holiday->name = $request->name;
            $holiday->date = date('m-d', strtotime($request->date));
            $holiday->type = $request->type;
            $holiday->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holiday $holiday)
    {
        return response()->json(['success' => $holiday->delete()]);
    }
}
