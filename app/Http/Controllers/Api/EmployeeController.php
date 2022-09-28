<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Employee;
use Hashids\Hashids;
use App\Pipes\EditEmployee;
use Illuminate\Http\Request;
use App\Pipes\CreateEmployee;
use App\Pipes\RegisterEmployee;
use App\Services\EmployeeService;
use Chefhasteeth\Pipeline\Pipeline;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Pipes\EmployeeLoginCredentials;
use Freshbitsweb\Laratables\Laratables;
use App\Pipes\EditEmployeeSocialInsurance;
use App\Http\Requests\StoreEmployeeRequest;
use App\Pipes\CreateEmployeeSocialInsurance;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

final class EmployeeController extends Controller
{
    public function list(string $charging = '*', string $assignment = '*', $status = '*', $active = '*')
    {
        return Laratables::recordsOf(Employee::class, function ($filter) use ($charging, $assignment, $status, $active) {
            $query = $filter->query();
            $active === '*' ?: $query->where('isActive', $active);
            $charging === '*' ?: $query->where('OfficeCode', $charging);
            $assignment === '*' ?: $query->where('OfficeCode2', $assignment);
            $status == '*' ?: $query->where('Work_Status', $status);
            return $query;
        });
    }

    public function store(StoreEmployeeRequest $request)
    {
        return Pipeline::make()
            ->withTransaction()
            ->send($request->all())
            ->through([
                CreateEmployee::class,
                CreateEmployeeSocialInsurance::class,
                RegisterEmployee::class,
                EmployeeLoginCredentials::class,
            ])->then(fn() => response()->json(['success' => true]));
    }

    public function update(UpdateEmployeeRequest $request)
    {
        return Pipeline::make()
            ->withTransaction()
            ->send($request->all())
            ->through([
                EditEmployee::class,
                EditEmployeeSocialInsurance::class,
                RegisterEmployee::class,
                EmployeeLoginCredentials::class,
            ])->then(fn() => response()->json(['success' => true]));
    }

    public function show(string $employeeID, EmployeeService $employeeService): Employee
    {
        return $employeeService->findByEmployeeID((new Hashids())->decode($employeeID)[0]);
    }

    public function search(string $key)
    {
        return Employee::where('firstname', 'like', '%'.$key.'%')
            ->orWhere('middlename', 'like', '%'.$key.'%')
            ->orWhere('lastname', 'like', '%'.$key.'%')
            ->orWhere('extension', 'like', '%'.$key.'%')
            ->get();
    }

    public function retire(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
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
