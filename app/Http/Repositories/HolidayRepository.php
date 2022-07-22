<?php

namespace App\Http\Repositories;

use App\Holiday;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HolidayRepository
{
    /**
     * Holiday for this month
     *
     * @return void
     */
    public function thisMonth()
    {
        // Get the end of this month and start of this month.
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $period = CarbonPeriod::create($start, $end);
        $dates = [];
        // Iterate over the period
        foreach ($period as $date) {
            $dates[] = $date->format('m-d');
        }

        return Holiday::whereIn('date', $dates)->get();
    }
}
