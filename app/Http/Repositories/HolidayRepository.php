<?php
namespace App\Http\Repositories;

use App\Holiday;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class HolidayRepository
{

    /**
     * Holiday for this month
     *
     * @return void
     */
    public function upcoming()
    {
        $month = Carbon::now()->get('month');
        $monthWithPrefixZero = $month <= 9 ? '0' . $month : $month;
        return Holiday::whereMonth('date',  $monthWithPrefixZero)->get();
    }
}