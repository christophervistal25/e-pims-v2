<?php

namespace App\Http\Controllers\Account\Employee;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\EmployeeLeaveApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ProfileController extends Controller
{

    public function list()
    {
        if(request()->ajax()) {
            $applications = EmployeeLeaveApplication::where('status', 'approved')
                                                ->with('type')
                                                ->whereDate('date_to', '<', date('Y-m-d'))
                                                ->select(['date_applied', 'leave_type_id', 'no_of_days', 'date_from', 'date_to']);
            
            return (new Datatables)->eloquent($applications)
                            ->make(true);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $account = User::with(['employee'])->find(Auth::user()->Employee_id);

      $noOfLeaveHistory = EmployeeLeaveApplication::where('status', 'approved')
                                          ->with('type')
                                          ->whereDate('date_to', '<', date('Y-m-d'))
                                          ->get()->count();
            
                                                
            return view('accounts.employee.profile', compact('account', 'noOfLeaveHistory'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:EPIMS_Users,username,'. Auth::user()->Employee_id . ',Employee_id',
            'password' => 'nullable|min:6|max:16|same:retypePassword',
        ], [], ['retypePassword' => 'password confirmation']);

        $id = Auth::user()->Employee_id;
        $user = User::find($id);
        $user->username = $request->username;
        $user->password = is_null($request->password) ? $user->password : bcrypt($request->password);
        $user->save();

        return response()->json(['success' => true]);
    }
}
