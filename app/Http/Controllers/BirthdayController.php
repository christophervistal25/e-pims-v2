<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\BirthdayRepository;
use App\Services\EmployeeBirthdayService;

class BirthdayController extends Controller
{
    public function __construct(public EmployeeBirthdayService $birthdayService)
    {
    }

    /**
     * Get all employees birthdays by range
     *
     * @param string $from
     * @param string $to
     * @return void
     */
    public function range(string $from, string $to, Request $request)
    {
        // Merge query params into request for validation.
        $request->merge([
            'from' => $from,
            'to' => $to
        ]);

        $this->validate($request, [
            'from' => ['date', 'required', 'before_or_equal:to'],
            'to' => ['date', 'required', 'after_or_equal:from']
        ], [], ['from' => 'Start Date', 'to' => 'End Date']);

        return $this->birthdayService->getByRange($from, $to);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = Carbon::now();

        return view('employee.birthdays', [
            'currentDate' => $currentDate,
            'class' => 'mini-sidebar'
        ]);
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
