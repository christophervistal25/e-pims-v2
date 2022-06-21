<?php

namespace App\Http\Controllers\Account\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeePersonalDataSheetController extends Controller
{

      public function __construct()
      {
            $this->middleware('auth');
      }
      
      public function edit()
      {
                  $userID = Auth::user()->Employee_id;
                  return view('accounts.employee.personal-data-sheet.edit', [
                        'employeeID' => $userID,
                  ]);
      }
}
