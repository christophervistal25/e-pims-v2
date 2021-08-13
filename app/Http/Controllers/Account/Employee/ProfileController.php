<?php

namespace App\Http\Controllers\Account\Employee;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = User::with([
                'employee',
                'employee.information',
                'employee.information.office',
                'employee.information.position',
                'employee.loginAccount'
            ])->where('employee_id', Auth::user()->employee_id)->first();

        return view('accounts.employee.profile', compact('account'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username,'. Auth::user()->id,
            'password' => 'nullable|min:6|max:16|same:retypePassword',
        ], [], ['retypePassword' => 'password confirmation']);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->username = $request->username;
        $user->password = is_null($request->password) ? $user->password : bcrypt($request->password);
        $user->save();

        return response()->json(['success' => true]);
    }
}
