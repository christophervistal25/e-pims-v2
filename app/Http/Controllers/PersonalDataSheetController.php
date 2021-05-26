<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Requests\C1\PersonalInformationRequest;
use App\Http\Requests\C1\FamilyBackgroundRequest;
use App\Http\Requests\C1\EducationalBackgroundRequest;
use App\Http\Requests\C2\CivilServiceRequest;
use App\Http\Requests\C2\WorkExperienceRequest;
use App\Http\Requests\C3\VoluntaryWorkRequest;
use App\Http\Requests\C3\LearningRequest;
use App\Http\Requests\C4\RelevantQueriesRequest;
use App\Http\Requests\C4\GovernmentIssuedIDRequest;

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

    public function createWithEmployee(string $employeeIdNumber)
    {
        $employee = Employee::fetchWithFullInformation($employeeIdNumber);
        return view('PersonalData.create-with-employee', compact('employee'));
    }

    /**
     * Store person information in storage.
     */
    public function storePersonInformation(PersonalInformationRequest $request)
    {
        return $this->employeeRepository->addPersonInformation($request->all());
    }
    
    public function existingEmployeeStoreInformation(Request $request)
    {
        $sex = ['male', 'female'];
        $status = ['SINGLE', 'MARRIED', 'WIDOWED', 'SEPARATED', 'OTHERS'];

        $this->validate($request, [
            'lastname'             => 'required|regex:/^[a-zA-Z ].+$/u',
            'firstname'            => 'required|regex:/^[a-zA-Z ].+$/u',
            'middlename'           => ['nullable', 'regex:/^[a-zA-Z].+$/u', 'min:2'],
            'extension'            => ['nullable', 'max:3' , 'regex:/^[a-zA-Z].+$/u'],
            'date_birth'           => 'required',
            'place_birth'          => 'required',
            'sex'                  => 'required|in:' . implode(',', $sex),
            'civil_status'         => 'required|in:'  . implode(',', $status),
            'height'               => ['required','between:0,99.99'],
            'weight'               => ['required', 'between:0,99.99'],
            'blood_type'           => ['required', 'max:3'],
            'gsis_id_no'           => ['nullable', 'unique:employees,gsis_id_no,'. $request->employee_id . ',employee_id'],
            'pag_ibig_no'          => ['nullable', 'unique:employees,pag_ibig_no,'. $request->employee_id . ',employee_id'],
            'philhealth_no'        => ['nullable', 'unique:employees,philhealth_no,'. $request->employee_id . ',employee_id'],
            'sss_no'               => ['nullable', 'unique:employees,sss_no,'. $request->employee_id . ',employee_id'],
            'tin_no'               => ['nullable', 'unique:employees,tin_no,'. $request->employee_id . ',employee_id'],
            'agency_employee_no'   => 'nullable|unique:employees,agency_employee_no,'. $request->employee_id . ',employee_id',
            'citizenship'          => ['required'],
            'citizenship_by'       => ['required_if:citizenship,DUAL CITIZEN'],
            'indicate_country'     => ['required_if:citizenship,DUAL CITIZEN'],
            'telephone_no'         => [],
            'mobile_no'            => ['required', 'max:13', 'min:11', 'unique:employees,mobile_no,'. $request->employee_id . ',employee_id'],
            'email_address'        => ['nullable', 'email', 'unique:employees,email_address,' . $request->employee_id . ',employee_id'],
            'residential_house_no' => ['nullable'],
            'residential_street'   => ['nullable'],
            'residential_village'  => ['nullable'],
            'residential_barangay' => ['required', 'exists:barangays,code'],
            'residential_city'     => ['required', 'exists:cities,code'],
            'residential_province' => ['required', 'exists:provinces,code'],
            'residential_zip_code' => ['required', 'min:4', 'max:4'],
            'permanent_house_no'   => [],
            'permanent_street'     => [],
            'permanent_village'    => [],
            'permanent_barangay'   => ['required', 'exists:barangays,code'],
            'permanent_city'       => ['required', 'exists:cities,code'],
            'permanent_province'   => ['required', 'exists:provinces,code'],
            'permanent_zip_code'   => ['required', 'min:4', 'max:4']
        ]);

        return $this->employeeRepository->existEmployeeAddInformation($request->all());
    }

    public function storePersonFamilyBackground(FamilyBackgroundRequest $request)
    {
        return $this->employeeRepository->addPersonFamilybackground($request->all());
    }

    public function existingEmployeeStoreFamilyBackground(Request $request)
    {
        $this->validate($request, [
            'has_spouse'                    => ['nullable'],
            'spouse_lastname'               => ['required_if:has_spouse,true'],
            'spouse_firstname'              => ['required_if:has_spouse,true'],
            'spouse_middlename'             => [],
            'spouse_extension'              => [],
            'spouse_occupation'             => [],
            'spouse_employer_business_name' => [],
            'spouse_business_address'       => [],
            'spouse_telephone_number'       => [],
            'spouse.*.name'                 => ['nullable'],
            'spouse.*.date_of_birth'        => ['required_with:spouse.*.name'],
            'father_lastname'               => 'required|regex:/^[a-zA-Z ].+$/u',
            'father_firstname'              => 'required_with:father_lastname|regex:/^[a-zA-Z ].+$/u',
            'father_middlename'             => 'nullable|regex:/^[a-zA-Z ].+$/u',
            'father_extension'              => '',
            'mother_lastname'               => 'required|regex:/^[a-zA-Z ].+$/u',
            'mother_firstname'              => 'required_with:mother_lastname|regex:/^[a-zA-Z ].+$/u',
            'mother_middlename'             => 'nullable|regex:/^[a-zA-Z ].+$/u',
        ], [], ['spouse.*.name' => 'child fullname', 'spouse.*.date_of_birth' => 'date of birth']);
        return $this->employeeRepository->existEmployeeAddFamilybackground($request->all());
    }

    public function storeEducationalBackground(EducationalBackgroundRequest $request)
    {
        return $this->employeeRepository->addEducationalBackground($request->all());
    }

    public function existingEmployeeStoreEducationalBackground(Request $request)
    {
        $this->employeeRepository->existingEmployeeAddEducationalBackground($request->all());
    }

    public function storeCivilService(CivilServiceRequest $request)
    {
        return $this->employeeRepository->addCivilService($request->all());
    }

    public function existingEmployeeStoreCivilService(Request $request)
    {
        $this->employeeRepository->existingEmployeeAddCivilService($request->all());
    }

    public function storeWorkExperience(WorkExperienceRequest $request)
    {
        return $this->employeeRepository->addWorkExperience($request->all());
    }

    public function existingEmployeeStoreWorkExperience(Request $request)
    {
        return $this->employeeRepository->existingEmployeeAddWorkExperience($request->all());
    }

    public function storeVoluntary(VoluntaryWorkRequest $request)
    {
        return $this->employeeRepository->addVoluntary($request->all());
    }

    public function existingEmployeeStoreVoluntary(Request $request)
    {
        return $this->employeeRepository->existingEmployeeAddVoluntaryWork($request->all());
    }

    public function storeLearning(LearningRequest $request)
    {
        return $this->employeeRepository->addLearning($request->all());
    }

    public function existingEmployeeStoreLearning(Request $request)
    {
        return $this->employeeRepository->existingEmployeeAddLearning($request->all());
    }

    public function storeOtherInformation(Request $request)
    {
        return $this->employeeRepository->addOtherInformation($request->all());
    }

    public function existingEmployeeStoreOtherInformation(Request $request)
    {
        return $this->employeeRepository->existingEmployeeAddOtherInformation($request->all());
    }

    public function storeRelevantQueries(RelevantQueriesRequest $request)
    {
        return $this->employeeRepository->addRelevantQueries($request->all());
    }

    public function existingEmployeeStoreRelevantQueries(Request $request)
    {
        return $this->employeeRepository->existingEmployeeStoreRelevantQueries($request->all());
    }

    public function storeReferences(Request $request)
    {
        return $this->employeeRepository->addReferences($request->all());
    }

    public function existingEmployeeStoreReferences(Request $request)
    {
        return $this->employeeRepository->existingEmployeeAddReferences($request->all());
    }

    public function storeIssuedID(GovernmentIssuedIDRequest $request)
    {
        return $this->employeeRepository->addIssuedID($request->all());
    }

    public function existingEmployeeStoreIssuedID(Request $request)
    {
        return $this->employeeRepository->existingEmployeeAddIssuedID($request->all());
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
        $employee = Employee::find($id);
        return view('PersonalData.create', compact('employee'));
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
