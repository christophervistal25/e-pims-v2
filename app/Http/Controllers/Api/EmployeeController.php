<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\RefStatus;
use App\EmployeeInformation;
use Illuminate\Support\Facades\Cache;

class EmployeeController extends Controller
{
    // Method to display all employee in PDS
    public function list()
    {
        return Employee::with(['information:EmpIDNo,pos_code,office_code', 'information.office:office_code,office_name', 'information.position:position_code,position_name'])->orderBy('created_at', 'DESC')->select(['employee_id', 'lastname', 'firstname', 'middlename', 'extension'])->paginate(10);
       
    }

    public function search(string $key)
    {
        return Employee::where('firstname', 'like', "%$key%")
                        ->orWhere('middlename', 'like', "%$key%")
                        ->orWhere('lastname', 'like', "%$key%")
                        ->orWhere('extension', 'like', "%$key%")
                        ->get(['firstname', 'middlename', 'lastname', 'extension']);
    }


    public function show(string $employeeIdNumber) :Employee
    {
        return Employee::fetchWithFullInformation($employeeIdNumber);
    }

    public function find(string $employeeIdNumber) :Employee
    {
        return Employee::with(['information:EmpIDNo,pos_code,office_code,photo',
                                'information.position:position_id,position_code,position_name',
                                'information.office:office_code,office_name', 'status', 'step:employee_id,step_no_to,salary_amount_to'])
                                    ->find($employeeIdNumber);
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
