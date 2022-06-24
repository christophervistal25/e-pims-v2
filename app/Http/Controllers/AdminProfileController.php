<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\EnsureNewPassword;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();
        $account = User::find($admin->Employee_id);
        $this->validate($request, [
            'username' => ['required', 'unique:EPIMS_Users,username,' . $admin->Employee_id . ',Employee_id'],
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['nullable', 'min:8', 'confirmed', new EnsureNewPassword],
        ], [], [
            'old_password' => 'password'
        ]);

        $account->username = $request->username;
        $account->password = bcrypt($request->password);
        $account->save();
        return back()->with('success', 'You successfully update your login credentials.');
    }
}
