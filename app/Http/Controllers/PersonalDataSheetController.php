<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Repositories\EmployeeRepository;

class PersonalDataSheetController extends Controller
{
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('PersonalData.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PersonalData.create');
    }

    /**
     * Store person information in storage.
     */
    public function storePersonInformation(Request $request)
    {
        return $this->employeeRepository->addPersonInformation($request->all());
    }

    public function storePersonFamilyBackground(Request $request)
    {
        return $this->employeeRepository->addPersonFamilybackground($request->all());
    }

    public function storeEducationalBackground(Request $request)
    {
        return $this->employeeRepository->addEducationalBackground($request->all());
    }

    public function storeCivilService(Request $request)
    {
        return $this->employeeRepository->addCivilService($request->all());
    }

    public function storeWorkExperience(Request $request)
    {
        return $this->employeeRepository->addWorkExperience($request->all());
    }

    public function storeVoluntary(Request $request)
    {
        return $this->employeeRepository->addVoluntary($request->all());
    }

    public function storeLearning(Request $request)
    {
        return $this->employeeRepository->addLearning($request->all());
    }

    public function storeOtherInformation(Request $request)
    {
        return $this->employeeRepository->addOtherInformation($request->all());
    }

    public function storeRelevantQueries(Request $request)
    {
        return $this->employeeRepository->addRelevantQueries($request->all());
    }

    public function storeReferences(Request $request)
    {
        return $this->employeeRepository->addReferences($request->all());
    }

    public function validatePersonInformation(Request $request)
    {
        $this->validate($request, [
            'personalInformation.*' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
