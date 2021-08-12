<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BirthdayRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function __construct(BirthdayRepository $birthdayRepo)
    {
        $this->birthdayRepository = $birthdayRepo;
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
            'from' => ['date', 'required', 'before:to'],
            'to' => ['date', 'required', 'after:from']
        ], [], ['from' => 'Start Date', 'to' => 'End Date']);

        return $this->birthdayRepository->range($from, $to);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = Carbon::now();
        $currentDatePlusOneWeek = ($currentDate->copy())->addDay(7);
        $birthdates = $this->birthdayRepository->weekBeforeBirthdays();
        return view('employee.birthdays', compact('currentDate', 'currentDatePlusOneWeek', 'birthdates'));
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
