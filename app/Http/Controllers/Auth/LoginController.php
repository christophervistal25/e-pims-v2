<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
            return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                  $type = Auth::user()->user_type;

                  if($type == User::USER_TYPES['ADMINISTRATOR']) {
                        // Redirect to admin dashboard
                        return redirect()->to(route('administrator.dashboard'));
                  } else if($type == User::USER_TYPES['USER']) {
                        // Redirect to user dashboard
                        return redirect()->intended(route('employee.dashboard'));
                  }
            } else {
                  return back()->withErrors(['message' => 'Please check your username/password'])->withInput();
            }
    }
}
