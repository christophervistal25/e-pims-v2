<?php

namespace App\Http\Middleware;

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
        // Has pending application
        if(Auth::user()->employee->leave_files->count() > 0) {
            return redirect()->route('404-leave-application');
        }

        return $next($request);
    }
}
