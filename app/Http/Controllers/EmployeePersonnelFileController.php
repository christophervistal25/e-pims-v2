<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeePersonnelFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeePersonnelFileController extends Controller
{
    /**
     * It validates the request, finds the employee, then uploads the files in a transaction
     *
     * @param Request request The request object.
     * @param string employeeID The ID of the employee
     */
    public function store(Request $request, string $employeeID)
    {
        // Filter associative array remove null values
        $request->merge(array_filter($request->all()));
        $this->validate($request, [
            'names.*' => ['required'],
            'types.*' => ['required'],
            'ids.*' => ['required'],
            'attachments.*' => ['required'],
        ]);

        $employee = Employee::findOrFail($employeeID, ['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix']);

        DB::transaction(function () use ($request, &$employeeID, &$employee) {
            $files = [];
            foreach ($request->attachments as $key => $attachment) {
                $fileName = $employeeID.'_'.time().'_'.$attachment->getClientOriginalName();

                $files[] = new EmployeePersonnelFile([
                    'date' => $request->dates[$key],
                    'file_id' => $request->ids[$key],
                    'file' => $fileName,
                    'file_size' => filesize($attachment),
                ]);

                // Upload the file in storage employees_file folder
                $attachment->storeAs('employees_file', $fileName);
            }

            $employee->file_records()->saveMany($files);
        });

        return back()->with('success', $employee->fullname.' files uploaded successfully.');
    }
}
