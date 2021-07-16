<?php

namespace App\Http\Controllers\Account\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\HolidayRepository;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct(HolidayRepository $holidayRepository)
    {
        $this->holidayRepository = $holidayRepository;
    }

    public function __invoke()
    {
        $user = Auth::user();
        $holidays = $this->holidayRepository->upcoming();
        return view('accounts.employee.dashboard', compact('user', 'holidays'));
    }
}
