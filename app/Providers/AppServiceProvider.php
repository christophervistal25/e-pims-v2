<?php

namespace App\Providers;

use App\Employee;
use App\EmployeeLeaveForwardedBalance;
use App\Http\Repositories\LeaveRecordRepository;
use App\Observers\EmployeeLeaveForwardedBalanceObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function __construct()
    {
        $this->leaveRecordRepository = new LeaveRecordRepository();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Model::preventLazyLoading(!app()->isProduction());

        EmployeeLeaveForwardedBalance::observe(EmployeeLeaveForwardedBalanceObserver::class);

        View::composer(['accounts.employee.layouts.app'], function ($view) {
            $view->with('notifications', Auth::user()->notifications);
        });

        View::composer(['layouts.app', 'layouts.app-vue'], function ($view) {
            $currentYear = date('Y');
            $fetchedYear = date('Y') - 1;

            $employeeForPlantillaSchedule = Employee::whereHas('plantilla', function ($query) use ($fetchedYear) {
                $query->where('year', $fetchedYear);
            })->whereDoesntHave('plantilla', function ($query) use ($currentYear) {
                $query->where('year', $currentYear);
            })->count();

            $view->with('no_of_employees_for_plantilla_schedule', $employeeForPlantillaSchedule);
            $view->with('no_of_pending_leave_list', 0);
        });
    }
}
