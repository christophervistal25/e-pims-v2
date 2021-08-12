<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Cache;

class EmployeeController extends Controller
{
    public function list()
    {
        return Cache::rememberForever('employees', function () {
            return Employee::with(['information:EmpIDNo,pos_code,office_code,photo', 'information.office:office_code,office_name', 'information.position:position_code,position_name', 'status'])
                            ->get();
        });
    }


    public function search(string $key)
    {
        return Employee::where('firstname', 'like', "%" . $key . "%")
                        ->orWhere('middlename', 'like', "%" . $key . "%")
                        ->orWhere('lastname', 'like', "%" . $key . "%")
                        ->orWhere('extension', 'like', "%" . $key . "%")
                        ->get();
    }


    public function show(string $employeeIdNumber) :Employee
    {
        return Employee::fetchWithFullInformation($employeeIdNumber);
    }

    public function find(string $employeeIdNumber) :Employee
    {
        return Employee::with(['information:EmpIDNo,pos_code,office_code,photo',
                                'information.position:position_id,position_code,position_name',
                                'information.office:office_code,office_name', 'status', 'step:employee_id,step_no_to,salary_amount_to', 'loginAccount'])
                                    ->find($employeeIdNumber);
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

        if($request->has('image')) {

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('/public/employee_images', $imageName);

            return $imageName;
        }
    }


}
