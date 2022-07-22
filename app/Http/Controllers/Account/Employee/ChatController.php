<?php

namespace App\Http\Controllers\Account\Employee;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $account = User::with(['employee', 'employee.information.position', 'employee.information.office'])->find(Auth::user()->id);

        return view('accounts.employee.chat.index', compact('account'));
    }
}
