<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\NewEmployeeStoreRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Services\EmployeeService;
use App\Services\OfficeService;

class EmployeeController extends Controller
{
    public function __construct(public EmployeeService $employeeService, public OfficeService $officeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = $this->officeService->get();

        return view('employee.index', [
            'class' => 'mini-sidebar',
            'offices' => $offices,
            'lastEmployeeID' => $this->employeeService->getLastId(),
            'username' => auth()->user()->username
        ]);
    }

    public function profile()
    {
        return view('PersonalData.employee-profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewEmployeeStoreRequest $request)
    {
        $employee = $this->employeeRepository->addEmployee($request->all());

        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request)
    {
        return $this->employeeRepository->updateEmployee($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
