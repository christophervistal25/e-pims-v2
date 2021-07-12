<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BirthdayRepository;

class DashboardController extends Controller
{
    public function __construct(BirthdayRepository $birthdayRepository)
    {
        $this->birthdayRepository = $birthdayRepository;
    }
    public function index()
    {
        $today = $this->birthdayRepository->birthdaysToday();
        $tomorrow = $this->birthdayRepository->birthdaysTomorrow();
        $oneWeekBeforeBirthdays = $this->birthdayRepository->oneWeekBeforeBirthdays();

        return view('blank-page', compact('today', 'tomorrow', 'oneWeekBeforeBirthdays'));   
    }
    

}
