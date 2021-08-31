<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Notification;
use App\LeaveIncrement;
use App\EmployeeLeaveRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\LeaveRecordRepository;

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
        View::composer(['accounts.employee.layouts.app'], function ($view) {
            $view->with('notifications', Auth::user()->notifications);
        });
    }
}
