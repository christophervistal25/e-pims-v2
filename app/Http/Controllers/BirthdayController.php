<?php

namespace App\Http\Controllers;

use App\Services\EmployeeBirthdayService;
use Carbon\Carbon;

class BirthdayController extends Controller
{
    public function __construct(private readonly EmployeeBirthdayService $birthdayService)
    {
    }

    /**
     * Get all employees birthdays by range
     *
     * @param  string  $from
     * @param  string  $to
     * @return void
     */
    public function range(string $from, string $to)
    {
        return $this->birthdayService->getByRange($from, $to);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.birthdays', [
            'currentDate' => Carbon::now(),
            'style' => 'overflow-y:hidden',
        ]);
    }
}
