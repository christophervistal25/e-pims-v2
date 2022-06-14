<?php

namespace App\Http\Middleware;

use App\EmployeeLeaveApplication;
use App\EmployeeLeaveRecord;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyApplicationSubmit
{
      /**
       * Handle an incoming request.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \Closure  $next
       * @return mixed
       */
      public function handle($request, Closure $next)
      {
            // $loggedInUser = Auth::user()->employee_id;

            // Has pending application
            //   if(EmployeeLeaveApplication::where(['employee_id' => $loggedInUser, 'approved_status' => 'pending'])->count() > 0) {
            // return redirect()->route('423-leave-application');
            // return redirect()->route('employee.dashboard')->with('message', 'You already filled an leave application please wait for the review of Administrator or Office Head.');
            //   }

            return $next($request);
      }
}
