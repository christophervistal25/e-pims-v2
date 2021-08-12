<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\C3\LearningRequest;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Requests\C2\CivilServiceRequest;
use App\Http\Requests\C3\VoluntaryWorkRequest;
use App\Http\Requests\C2\WorkExperienceRequest;
use App\Http\Requests\C4\RelevantQueriesRequest;
use App\Http\Requests\C1\FamilyBackgroundRequest;
use App\Http\Requests\C4\GovernmentIssuedIDRequest;
use App\Http\Requests\C1\PersonalInformationRequest;
use App\Http\Requests\C1\EducationalBackgroundRequest;

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
            'extension'            => ['nullable'],
            'date_birth'           => 'required',
            'place_birth'          => 'required',
            'sex'                  => 'required|in:' . implode(',', $sex),
            'civil_status'         => 'required|in:'  . implode(',', $status),
            'civil_status_others' => ['nullable', 'required_if:civil_status,OTHERS'],
            'height'               => ['required','between:0,99.99'],
            'weight'               => ['required', 'between:0,99.99'],
            'blood_type'           => ['required', 'max:3'],
            'gsis_id_no'           => ['nullable', 'unique:employees,gsis_id_no,'. $request->employee_id . ',employee_id'],
            'pag_ibig_no'          => ['nullable', 'unique:employees,pag_ibig_no,'. $request->employee_id . ',employee_id'],
            'philhealth_no'        => ['nullable', 'unique:employees,philhealth_no,'. $request->employee_id . ',employee_id'],
            'sss_no'               => ['nullable', 'unique:employees,sss_no,'. $request->employee_id . ',employee_id'],
            'tin_no'               => ['nullable', 'unique:employees,tin_no,'. $request->employee_id . ',employee_id'],
            'agency_employee_no'   => 'nullable|exclude_if:agency_employee_no,*|unique:employees,agency_employee_no,'. $request->employee_id . ',employee_id',
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
        $this->validate($request, [
            'elementary_name'                                    => [],
            'elementary_education'                               => [],
            'elementary_period_from'                             => ['nullable', 'required_with:elementary_name', 'date', 'before:elementary_period_to'],
            'elementary_period_to'                               => ['nullable', 'required_with:elementary_period_from', 'date', 'after:elementary_period_from'],
            'elementary_highest_level_units_earned'              => [],
            'elementary_year_graduated'                          => ['required_with:elementary_highest_level_units_earned'],
            'elementary_scholarship'                             => [],
            'secondary_name'                                     => [],
            'secondary_education'                                => [],
            'secondary_period_from'                              => ['nullable','required_with:secondary_name', 'date', 'before:secondary_period_to'],
            'secondary_period_to'                                => ['nullable','required_with:secondary_period_from', 'date', 'after:secondary_period_from'],
            'secondary_highest_level_units_earned'               => [],
            'secondary_year_graduated'                           => ['required_with:secondary_highest_level_units_earned'],
            'secondary_scholarship'                              => [],
            'vocational_trade_course_name'                       => [],
            'vocational_education'                               => [],
            'vocational_trade_course_period_from'                => ['nullable','required_with:vocational_education', 'date', 'before:vocational_trade_course_period_to'],
            'vocational_trade_course_period_to'                  => ['nullable','required_with:vocational_trade_course_period_from', 'date', 'after:vocational_trade_course_period_from'],
            'vocational_trade_course_highest_level_units_earned' => [],
            'vocational_trade_course_year_graduated'             => ['required_with:vocational_trade_course_highest_level_units_earned'],
            'vocational_trade_course_scholarship'                => [],
            'college_name'                                       => [],
            'college_education'                                  => [],
            'college_period_from'                                => ['nullable','required_with:college_name', 'date',  'before:college_period_to'],
            'college_period_to'                                  => ['nullable','required_with:college_period_from', 'date', 'after:college_period_from'],
            'college_highest_level_units_earned'                 => [],
            'college_year_graduated'                             => ['required_with:college_highest_level_units_earned'],
            'college_scholarship'                                => [],
            'graduate_studies_name'                              => [],
            'graduate_studies_education'                         => [],
            'graduate_studies_period_from'                       => ['nullable','required_with:graduate_studies_name', 'date', 'before:graduate_studies_period_to'],
            'graduate_studies_period_to'                         => ['nullable','required_with:graduate_studies_period_from', 'date', 'after:graduate_studies_period_from'],
            'graduate_studies_highest_level_units_earned'        => [],
            'graduate_studies_year_graduated'                    => ['required_with:graduate_studies_highest_level_units_earned'],
            'graduate_studies_scholarship'                       => []
        ]);

        return $this->employeeRepository->existingEmployeeAddEducationalBackground($request->all());
    }

    public function storeCivilService(CivilServiceRequest $request)
    {
        return $this->employeeRepository->addCivilService($request->all());
    }

    public function existingEmployeeStoreCivilService(Request $request, string $employee_id)
    {
        $this->validate($request, [
            '*.career_service'       => ['required'],
            '*.date_of_examination'  => ['nullable', 'required_with:*.career_service', 'date'],
            '*.place_of_examination' => ['required_with:*.career_service'],
            '*.rating'               => ['nullable', 'numeric', 'between:0,99.99'],
            '*.license_number'       => ['nullable'],
            '*.date_of_validitiy'    => ['nullable', 'date'],
        ],[], ['*.career_service' => 'career service',       '*.careerServ' => 'career service',
            '*.date_of_examination' => 'Date of examination',
            '*.place_of_examination' => 'Place of examination',
            '*.dateOfdate_of_validitiyValid' => 'Date of validity',]);

        
        return $this->employeeRepository->existingEmployeeAddCivilService($request->all(), $employee_id);
    }

    public function storeWorkExperience(WorkExperienceRequest $request)
    {
        return $this->employeeRepository->addWorkExperience($request->all());
    }

    public function existingEmployeeStoreWorkExperience(Request $request, $employeeId)
    {
        $this->validate($request, [
            '*.from'                  => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.to', 'date', 'before:*.to'],
            '*.to'                    => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.from', 'date', 'after:*.from'],
            '*.position_title'        => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.from', 'required_with:*.to'],
            '*.office'                => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service', 'required_with:*.position_title', 'string'],
            '*.monthly_salary'        => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service'],
            '*.salary_job_pay_grade'  => ['nullable', 'required_with:*.status_of_appointment', 'required_with:*.government_service'],
            '*.status_of_appointment' => ['required'],
            '*.government_service'    => ['required', 'in:Y,N,y,n'],
        ],[
            '*.government_service.in' => 'You can only type (Y,N) in goverment service.'
        ], [
            '*.from'=> 'Inclusive date from',
            '*.to'        => 'Inclusive date to',
            '*.status_of_appointment' => 'Status of appointment',
            '*.government_service'   => 'Government Service',
            '*.dept'      => 'Department',
            '*.position_title'  => 'Position',
            '*.monthly_salary' => 'Monthly Salary',
            '*.salary_job_pay_grade'  => 'Pay Grade',
        ]);
        return $this->employeeRepository->existingEmployeeAddWorkExperience($request->all(), $employeeId);
    }

    public function storeVoluntary(VoluntaryWorkRequest $request)
    {
        return $this->employeeRepository->addVoluntary($request->all());
    }

    public function existingEmployeeStoreVoluntary(Request $request, $employeeId)
    {
        $this->validate($request, [
               '*.name_and_address'    => ['required'],
               '*.inclusive_date_from' => ['nullable', 'required_with:*.name_and_address', 'date', 'before:*.inclusive_date_to'],
               '*.inclusive_date_to'   => ['nullable', 'required_with:*.name_and_address', 'date', 'after:*.inclusive_date_from'],
               '*.no_of_hours'         => ['nullable', 'required_with:*.name_and_address'],
               '*.position'            => ['nullable', 'required_with:*.name_and_address'],
        ], [], [
            '*.name_and_address'    => 'Name & Address Organization',
            '*.inclusive_date_from' => 'Inclusive Date FROM',
            '*.inclusive_date_to'   => 'Inclusive Date TO',
            '*.no_of_hours'         => 'Number of Hours',
            '*.position'            => 'Position',
        ]);
        return $this->employeeRepository->existingEmployeeAddVoluntaryWork($request->all(), $employeeId);
    }

    public function storeLearning(LearningRequest $request)
    {
        return $this->employeeRepository->addLearning($request->all());
    }

    public function existingEmployeeStoreLearning(Request $request, $employeeID)
    {
        $this->validate($request, [
             '*.title'                   => ['required'],
             '*.date_of_attendance_from' => ['nullable', 'required_with:*.title', 'date', 'before:*.date_of_attendance_to'],
             '*.date_of_attendance_to'   => ['nullable', 'required_with:*.title', 'date', 'after:*.date_of_attendance_from'],
             '*.number_of_hours'         => ['nullable', 'required_with:*.title', 'numeric'],
             '*.type_of_id'              => ['nullable', 'required_with:*.title'],
             '*.sponsored_by'            => ['nullable', 'required_with:*.title'],
        ], [], [
            '*.title'                   => 'Name of training',
            '*.date_of_attendance_from' => 'Inclusive date FROM',
            '*.date_of_attendance_to'   => 'Inclusive date TO',
            '*.number_of_hours'         => 'No. of hours',
            '*.type_of_id'              => 'type of LD',
            '*.sponsored_by'            => 'Conducted/Sponsored',
        ]);

        return $this->employeeRepository->existingEmployeeAddLearning($request->all(), $employeeID);
    }

    public function storeOtherInformation(Request $request)
    {
        $this->validate($request, [
            '*.skill'          => 'required',
            '*.recog'          => 'required',
            '*.memAssociation' => 'required',
        ],[] , ['*.skill' => 'Special Skill', '*.recog' => 'Non-academic', '*.memAssociation' => 'Organization']);
        return $this->employeeRepository->addOtherInformation($request->all());
    }

    public function existingEmployeeStoreOtherInformation(Request $request, $employeeId)
    {
        $this->validate($request, [
            '*.special_skill' => 'required',
            '*.non_academic'  => 'required',
            '*.organization'  => 'required',
        ],[] , ['*.special_skill' => 'Special Skill', '*.non_academic' => 'Non-academic', '*.organization' => 'Organization']);

        return $this->employeeRepository->existingEmployeeAddOtherInformation($request->all(), $employeeId);
    }

    public function storeRelevantQueries(RelevantQueriesRequest $request)
    {
        return $this->employeeRepository->addRelevantQueries($request->all());
    }

    public function existingEmployeeStoreRelevantQueries(Request $request)
    {
        $this->validate($request, [
            'question_34_a_answer'          => ['required'],
            'question_34_a_details'         => ['required_if:question_34_a_answer,yes'],
            'question_34_b_answer'          => ['required'],
            'question_34_b_details'         => ['required_if:question_34_b_answer,yes'],
            'question_35_a_answer'          => ['required'],
            'question_35_a_details'         => ['required_if:question_35_a_answer,yes'],
            'question_35_b_answer'          => ['required'],
            'question_35_b_details'         => ['required_if:question_35_b_answer,yes'],
            'question_35_b_date_filled'     => ['nullable', 'required_if:question_35_b_answer,yes', 'date', 'before:today', 'after:1900-01-01'],
            'question_35_b_status_of_cases' => ['required_if:question_35_b_answer,yes'],
            'question_36_a_answer'          => ['required'],
            'question_36_a_details'         => ['required_if:question_36_a_answer,yes'],
            'question_37_a_answer'          => ['required'],
            'question_37_a_details'         => ['required_if:question_37_a_answer,yes'],
            'question_38_a_answer'          => ['required'],
            'question_38_a_details'         => ['required_if:question_38_a_answer,yes'],
            'question_38_b_answer'          => ['required'],
            'question_38_b_details'         => ['required_if:question_38_b_answer,yes'],
            'question_39_a_answer'          => ['required'],
            'question_39_a_details'         => ['required_if:question_39_a_answer,yes'],
            'question_40_a_answer'          => ['required'],
            'question_40_a_details'         => ['required_if:question_40_a_answer,yes'],
            'question_40_b_answer'          => ['required'],
            'question_40_b_details'         => ['required_if:question_40_b_answer,yes'],
            'question_40_c_answer'          => ['required'],
            'question_40_c_details'         => ['required_if:question_40_c_answer,yes']
        ]);

        return $this->employeeRepository->existingEmployeeStoreRelevantQueries($request->all());
    }

    public function storeReferences(Request $request)
    {
        return $this->employeeRepository->addReferences($request->all());
    }

    public function existingEmployeeStoreReferences(Request $request, $employeeId)
    {
        return $this->employeeRepository->existingEmployeeAddReferences($request->all(), $employeeId);
    }

    public function storeIssuedID(GovernmentIssuedIDRequest $request)
    {
        return $this->employeeRepository->addIssuedID($request->all());
    }

    public function existingEmployeeStoreIssuedID(Request $request)
    {
        $this->validate($request, [
            "id_type" => 'required',
            "id_no"   => ['required', 'unique:employee_issued_i_d_s,id_no'],
            "date"    => 'required',
        ], [], [
            'id_type' => 'Government Issued ID',
            'id_no' => 'ID/License/Passport No.',
            'date' => 'Date/Place of Issuance'
        ]);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('PersonalData.create', compact('employee'));
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
