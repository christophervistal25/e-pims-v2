<?php

namespace App\Observers;

use App\Setting;
use Carbon\Carbon;
use App\EmployeeLeaveTransaction;
use App\EmployeeLeaveForwardedBalance;

class EmployeeLeaveForwardedBalanceObserver
{
    /**
     * Handle the EmployeeLeaveForwardedBalance "created" event.
     *
     * @param  \App\EmployeeLeaveForwardedBalance  $employeeLeaveForwardedBalance
     * @return void
     */
    public function created(EmployeeLeaveForwardedBalance $employeeLeaveForwardedBalance)
    {
        
    }

    /**
     * Handle the EmployeeLeaveForwardedBalance "updated" event.
     *
     * @param  \App\EmployeeLeaveForwardedBalance  $employeeLeaveForwardedBalance
     * @return void
     */
    public function updated(EmployeeLeaveForwardedBalance $employeeLeaveForwardedBalance)
    {
        //
    }

    /**
     * Handle the EmployeeLeaveForwardedBalance "deleted" event.
     *
     * @param  \App\EmployeeLeaveForwardedBalance  $employeeLeaveForwardedBalance
     * @return void
     */
    public function deleted(EmployeeLeaveForwardedBalance $employeeLeaveForwardedBalance)
    {
        //
    }

    /**
     * Handle the EmployeeLeaveForwardedBalance "restored" event.
     *
     * @param  \App\EmployeeLeaveForwardedBalance  $employeeLeaveForwardedBalance
     * @return void
     */
    public function restored(EmployeeLeaveForwardedBalance $employeeLeaveForwardedBalance)
    {
        //
    }

    /**
     * Handle the EmployeeLeaveForwardedBalance "force deleted" event.
     *
     * @param  \App\EmployeeLeaveForwardedBalance  $employeeLeaveForwardedBalance
     * @return void
     */
    public function forceDeleted(EmployeeLeaveForwardedBalance $employeeLeaveForwardedBalance)
    {
        //
    }
}
