<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Employee;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Freshbitsweb\Laratables\Laratables;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct(public EmployeeService $employeeService)
    {
    }

    public function list(string $charging = '*', string $assignment = '*', $status = '*', $active = '*')
    {
        return Laratables::recordsOf(Employee::class, function ($filter) use ($charging, $assignment, $status, $active) {
            $query = $filter->query();
            $active === '*' ?: $query->where('isActive', $active);
            $charging === '*' ?: $query->where('OfficeCode', $charging);
            $assignment === '*' ?: $query->where('OfficeCode2', $assignment);
            $status === '*' ?: $query->where('Work_Status', 'like', '%'.$status.'%');
            return $query;
        });
    }

    public function store(StoreEmployeeRequest $request)
    {
        // Store new employee
        return $this->employeeService->addNewEmployee($request->all());
    }

    public function update(UpdateEmployeeRequest $request, string $employeeID): Employee
    {
        return $this->employeeService->updateInformation($request->all(), Employee::find($employeeID));
    }

    public function show(string $employeeID): Employee
    {
        $employeeID = (new Hashids())->decode($employeeID)[0];

        return $this->employeeService->findByEmployeeID($employeeID);
    }

    public function search(string $key)
    {
        return Employee::where('firstname', 'like', '%'.$key.'%')
            ->orWhere('middlename', 'like', '%'.$key.'%')
            ->orWhere('lastname', 'like', '%'.$key.'%')
            ->orWhere('extension', 'like', '%'.$key.'%')
            ->get();
    }

    public function ids(string $employee_id = null)
    {
        return Employee::where('employee_id', $employee_id)->get(['employee_id', 'firstname', 'middlename', 'lastname', 'extension']);
    }

    public function records()
    {
        return Employee::select(['employee_id', 'lastname', 'firstname', 'middlename', 'extension'])->paginate(10);
    }

    public function onUploadImage(Request $request)
    {
        if ($request->has('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('/public/employee_images', $imageName);

            return $imageName;
        }
    }

    public function retire(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if($user && Hash::check($request->password, $user->password)) {
            $employee = Employee::find($request->employeeID);
            $employee->isActive = $employee->isActive == Employee::ACTIVE ? Employee::IN_ACTIVE : Employee::ACTIVE;
            $employee->notes = $request->remarks ?? '';
            $employee->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Sorry but you can\'t perform this action.'], 422);
        }
        
    }
}
