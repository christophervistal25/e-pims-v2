<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\RefStatus;

class EmployeeController extends Controller
{
    // Method to display all employee in PDS
    public function list()
    {
        return Employee::with(['information:EmpIDNo,pos_code', 'information.position:position_code,position_name'])->select(['employee_id', 'lastname', 'firstname', 'middlename', 'extension'])->paginate(10);
    }


    public function show(string $employeeIdNumber) :Employee
    {
        return Employee::fetchWithFullInformation($employeeIdNumber);
    }

    public function find(string $employeeIdNumber) :Employee
    {
        return Employee::with(['information:EmpIDNo,pos_code,office_code,photo',
                                'information.position:position_id,position_code',
                                'information.office:office_code'])
                                    ->find($employeeIdNumber);
    }

    public function records()
    {
        return Employee::select(['employee_id', 'lastname', 'firstname', 'middlename', 'extension'])->paginate(10);
    }

    public function status()
    {
        return RefStatus::get(['id', 'stat_code', 'status_name']);
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
