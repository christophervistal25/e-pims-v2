<?php

namespace App\Http\Repositories;

use App\Setting;
use App\Employee;
use App\EmployeeIssuedID;
use App\EmployeeReference;
use Illuminate\Support\Str;
use App\EmployeeCivilService;
use App\EmployeeRelevantQuery;
use App\EmployeeVoluntaryWork;
use App\EmployeeSpouseChildren;
use App\EmployeeWorkExperience;
use App\EmployeeFamilyBackground;
use App\EmployeeOtherInformation;
use App\EmployeeTrainingAttained;
use Illuminate\Support\Facades\DB;
use App\Contracts\IPersonalDataSheet;
use App\EmployeeEducationalBackground;
use Illuminate\Database\Eloquent\Collection;

class PersonalDataSheetRepository implements IPersonalDataSheet
{

    /**
     * It gets the employee's personal information from the database
     * 
     * @param string employeeID The employee ID of the employee you want to get the information of.
     */
    public function getPersonalInformation(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return Employee::exclude(['ImagePhoto'])
            ->with(['province_residential', 'city_residential', 'barangay_residential', 'province_permanent', 'city_permanent', 'barangay_permanent'])
            ->find($employeeID);
    }

    /**
     * It updates the employee's personal information.
     * 
     * @param array data The data to be updated.
     * @param employeeID The employee ID of the employee you want to update.
     */
    public function updatePersonalInformation(array $data = [], $employeeID): Employee
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        $employee = Employee::find($employeeID);
        $employee->Employee_id = $data['Employee_id'];
        $employee->LastName =  $data['LastName'];
        $employee->FirstName =  $data['FirstName'];
        $employee->MiddleName =  $data['MiddleName'];
        $employee->Suffix =  $data['Suffix'];
        $employee->Birthdate =  $data['Birthdate'];
        $employee->BirthPlace =  @$data['BirthPlace'];
        $employee->Gender =  Str::upper($data['Gender']);
        $employee->CivilStatus =  $data['CivilStatus'];
        $employee->height =  @$data['height'];
        $employee->weight =  @$data['weight'];
        $employee->blood_type =  @$data['blood_type'];
        $employee->gsis_no =  @$data['gsis_id_no'];
        $employee->pagibig_no =  @$data['pagibig_no'];
        $employee->philhealth_no =  $data['philhealth_no'];
        $employee->sss_no =  $data['sss_no'];
        $employee->tin_no =  $data['tin_no'];
        $employee->agency_employee_no =  @$data['agency_employee_no'];
        $employee->citizenship =  $data['citizenship'];
        $employee->citizenship_by =  (Str::upper($data['citizenship']) === 'DUAL CITIZEN') ? $data['citizenship_by'] : '';
        $employee->indicate_country =  (Str::upper($data['citizenship']) === 'DUAL CITIZEN') ? $data['indicate_country'] : '';
        $employee->residential_house_no =  @$data['residentialLotNo'];
        $employee->residential_street =  @$data['residentialStreet'];
        $employee->residential_village =  @$data['residentialSubdivision'];
        $employee->residential_barangay =  $data['residentialBarangay']['barangay_code'];
        $employee->residential_city =  $data['residentialCity']['city_code'];
        $employee->residential_province =  $data['residentialProvince']['province_code'];
        $employee->residential_zip_code =  $data['residentialZipCode'];
        $employee->permanent_house_no =  @$data['permanentLotNo'];
        $employee->permanent_street =  @$data['permanentStreet'];
        $employee->permanent_village =  @$data['permanentSubdivision'];
        $employee->permanent_barangay =  $data['permanentBarangay']['barangay_code'];
        $employee->permanent_city =  $data['permanentCity']['city_code'];
        $employee->permanent_province =  $data['permanentProvince']['province_code'];
        $employee->permanent_zip_code =  $data['permanentZipCode'];
        $employee->telephone_no =  @$data['telephone_no'];
        $employee->ContactNumber =  $data['ContactNumber'];
        $employee->Email_address =  @$data['Email'];

        $employee = tap($employee, function ($employee) {
            $employee->save();
        });
        return $employee->exclude(['ImagePhoto'])->first();
    }

    /**
     * It takes an array of children, and an employee ID, and updates the children for that employee
     * 
     * @param array children array of children
     * @param string employeeID The employee ID of the employee.
     * 
     */
    public function updateChildren(array $children = [], string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        $children = array_filter($children, 'array_filter');
        DB::transaction(function () use ($employeeID, $children) {
            EmployeeSpouseChildren::where('employee_id', $employeeID)->get()->each->delete();
            foreach ($children as $child) {
                if (!empty($child['name'])) {
                    EmployeeSpouseChildren::create([
                        'id'            => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                        'name'          => $child['name'],
                        'date_of_birth' => $child['date_of_birth'],
                        'employee_id'   => $employeeID,
                    ]);
                }
            }
        });

        return $this;
    }

    /**
     * It gets the family background of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the family background
     * of.
     * 
     */
    public function getFamilyBackground(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeFamilyBackground::with(['spouse'])->where('employee_id', $employeeID)->first();
    }

    /**
     * It updates or creates a new record in the database.
     * 
     * @param array data The data to be inserted or updated.
     * 
     * @return array The data is being returned.
     */
    public function updateFamilyBackground(array $data = []): array
    {
        $employeeID = $data['employee_id'];
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

        EmployeeFamilyBackground::updateOrCreate([
            'employee_id' => $employeeID,
        ], [
            'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'spouse_firstname'              => Str::upper($data['spouse_firstname']),
            'spouse_lastname'               => Str::upper($data['spouse_lastname']),
            'spouse_middlename'             => Str::upper($data['spouse_middlename']),
            'spouse_extension'              => Str::upper($data['spouse_extension']),
            'spouse_occupation'             => Str::upper($data['spouse_occupation']),
            'spouse_employer_business_name' => Str::upper($data['spouse_employer_business_name']),
            'spouse_business_address'       => Str::upper($data['spouse_business_address']),
            'spouse_telephone_number'       => $data['spouse_telephone_number'],
            'father_firstname'              => Str::upper($data['father_firstname']),
            'father_lastname'               => Str::upper($data['father_lastname']),
            'father_middlename'             => @Str::upper($data['father_middlename']),
            'father_extension'              => @Str::upper($data['father_extension']),
            'mother_lastname'               => Str::upper($data['mother_lastname']),
            'mother_firstname'              => Str::upper($data['mother_firstname']),
            'mother_middlename'             => @Str::upper($data['mother_middlename']),
            'employee_id' => $employeeID,
        ]);

        return $data;
    }

   /**
    * It gets the educational background of an employee
    * 
    * @param string employeeID The employee ID of the employee you want to get the educational
    * background of.
    * 
    * @return EmployeeEducationalBackground educational background of the employee.
    */
    public function getEducationalBackground(string $employeeID) :EmployeeEducationalBackground
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

        $educationalBackground = EmployeeEducationalBackground::where('employee_id', $employeeID)->first();

        $educationalBackground['additionals'] = [
            'vocational' => [],
            'college'    => [],
            'graduate'   => [],
        ];

        return $educationalBackground;
    }

   /**
    * It updates or creates a new record in the database
    * 
    * @param array data The array of data to be inserted or updated.
    * @param employeeID The employee ID of the employee.
    * 
    * @return array The data is being returned.
    */
    public function updateEducationalBackground(array $data = [], $employeeID): array
    {
        $employeeID = str_pad($data['employee_id'], 4, "0", STR_PAD_LEFT);

        EmployeeEducationalBackground::updateOrCreate([
            'employee_id' => $employeeID,
        ], [
            'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'elementary_name'                                    => $data['elementary_name'],
            'elementary_education'                               => $data['elementary_education'],
            'elementary_period_from'                             => $data['elementary_period_from'],
            'elementary_period_to'                               => $data['elementary_period_to'],
            'elementary_highest_level_units_earned'              => $data['elementary_highest_level_units_earned'],
            'elementary_year_graduated'                          => $data['elementary_year_graduated'],
            'elementary_scholarship'                             => $data['elementary_scholarship'],
            'secondary_name'                                     => $data['secondary_name'],
            'secondary_education'                                => $data['secondary_education'],
            'secondary_period_from'                              => $data['secondary_period_from'],
            'secondary_period_to'                                => $data['secondary_period_to'],
            'secondary_highest_level_units_earned'               => $data['secondary_highest_level_units_earned'],
            'secondary_year_graduated'                           => $data['secondary_year_graduated'],
            'secondary_scholarship'                              => $data['secondary_scholarship'],
            'vocational_trade_course_name'                       => $data['vocational_trade_course_name'],
            'vocational_education'                               => $data['vocational_education'],
            'vocational_trade_course_period_from'                => $data['vocational_trade_course_period_from'],
            'vocational_trade_course_period_to'                  => $data['vocational_trade_course_period_to'],
            'vocational_trade_course_highest_level_units_earned' => $data['vocational_trade_course_highest_level_units_earned'],
            'vocational_trade_course_year_graduated'             => $data['vocational_trade_course_year_graduated'],
            'vocational_trade_course_scholarship'                => $data['vocational_trade_course_scholarship'],
            'college_name'                                       => $data['college_name'],
            'college_education'                                  => $data['college_education'],
            'college_period_from'                                => $data['college_period_from'],
            'college_period_to'                                  => $data['college_period_to'],
            'college_highest_level_units_earned'                 => $data['college_highest_level_units_earned'],
            'college_year_graduated'                             => $data['college_year_graduated'],
            'college_scholarship'                                => $data['college_scholarship'],
            'graduate_studies_name'                              => $data['graduate_studies_name'],
            'graduate_studies_education'                         => $data['graduate_studies_education'],
            'graduate_studies_period_from'                       => $data['graduate_studies_period_from'],
            'graduate_studies_period_to'                         => $data['graduate_studies_period_to'],
            'graduate_studies_highest_level_units_earned'        => $data['graduate_studies_highest_level_units_earned'],
            'graduate_studies_year_graduated'                    => $data['graduate_studies_year_graduated'],
            'graduate_studies_scholarship'                       => $data['graduate_studies_scholarship'],
            'employee_id' => $employeeID,
        ]);

        return $data;
    }

   
    /**
     * > This function returns a collection of civil service eligibilities of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the civil service
     * eligibility of.
     * 
     * @return Collection|array A collection of EmployeeCivilService objects.
     */
    public function getCivilServiceEligibility(string $employeeID) :Collection|array
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeCivilService::where('employee_id', $employeeID)->get() ?? json_encode([]);
    }

    /**
     * It updates the employee civil service record.
     * 
     * @param array data The data to be inserted.
     * @param string employeeID The employee ID of the employee you want to update.
     * 
     * @return array The data that was passed in the function.
     */
    public function updateCivilService(array $data = [], string $employeeID): array
    {
        DB::transaction(function () use ($data, $employeeID) {
            $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

            EmployeeCivilService::where('employee_id', $employeeID)->get()->each->delete();
            collect($data)->each(function ($record) use ($employeeID) {
                EmployeeCivilService::create([
                    'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                    'employee_id'          => $employeeID,
                    'career_service'       => $record['career_service'] ?? '',
                    'rating'               => $record['rating'] ?? 0,
                    'date_of_examination'  => $record['date_of_examination'] ?? '',
                    'place_of_examination' => $record['place_of_examination'] ?? '',
                    'license_number'       => $record['license_number'] ?? '',
                    'date_of_validitiy'    => $record['date_of_validitiy'] ?? '',
                ]);
            });
        });

        return $data;
    }

    /**
     * > This function returns the work experience of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the work experience of.
     * 
     */
    public function getWorkExperience(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeWorkExperience::where('employee_id', $employeeID)->orderBy('to', 'DESC')->get() ?? json_encode([]);
    }

    /**
     * It deletes all the records in the database and then inserts the new records
     * 
     * @param array data array of data to be inserted
     * @param employeeID The employee ID of the employee you want to update.
     */
    public function updateWorkExperience(array $data = [], $employeeID): array
    {
        DB::transaction(function () use ($data, $employeeID) {
            $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

            EmployeeWorkExperience::where('employee_id', $employeeID)->get()->each->delete();

            collect($data)->each(function ($record) use ($employeeID) {
                EmployeeWorkExperience::create([
                    'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                    'from'                  => $record['from'],
                    'to'                    => $record['to'],
                    'position_title'        => $record['position_title'],
                    'office'                => $record['office'],
                    'monthly_salary'        => $record['monthly_salary'],
                    'salary_job_pay_grade'  => $record['salary_job_pay_grade'],
                    'status_of_appointment' => $record['status_of_appointment'],
                    'government_service'    => $record['government_service'],
                    'employee_id'       => $employeeID,
                ]);
            });
        });

        return $data;
    }

    /**
     * > This function returns the voluntary work of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the voluntary work of.
     */
    public function getVoluntaryWork(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeVoluntaryWork::where('employee_id', $employeeID)->get() ?? json_encode([]);
    }

    /**
     * It updates the voluntary work of an employee.
     * 
     * @param array data The data to be inserted.
     * @param employeeID The employee ID of the employee you want to update.
     * 
     * @return array The data is being returned.
     */
    public function updateVoluntary(array $data = [], $employeeID): array
    {
        DB::transaction(function () use ($data, $employeeID) {
            $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

            EmployeeVoluntaryWork::where('employee_id', $employeeID)->get()->each->delete();

            collect($data)->each(function ($record) use ($employeeID) {
                EmployeeVoluntaryWork::create([
                    'id'                  => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                    'name_and_address'    => $record['name_and_address'],
                    'inclusive_date_from' => $record['inclusive_date_from'],
                    'inclusive_date_to'   => $record['inclusive_date_to'],
                    'position'            => $record['position'],
                    'no_of_hours'         => $record['no_of_hours'],
                    'employee_id'         => $employeeID,
                ]);
            });
        });

        return $data;
    }

    /**
     * > This function returns all the training and development of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the learning and
     * development of.
     * 
     * @return It returns the employee's training and development.
     */
    public function getLearningAndDevelopment(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeTrainingAttained::where('employee_id', $employeeID)->get() ?? json_encode([]);
    }

    /**
     * It updates the employee's learning and development by deleting all the previous records and
     * inserting the new ones
     * 
     * @param array data The data to be saved.
     * @param employeeID The employee's ID
     */
    public function updateLearningAndDevelopment(array $data = [], $employeeID): array
    {
        DB::transaction(function () use ($data, $employeeID) {
            EmployeeTrainingAttained::where('employee_id', $employeeID)->get()->each->delete();

            collect($data)->each(function ($training) use ($employeeID) {
                $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

                EmployeeTrainingAttained::create([
                    'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                    'title'                   => $training['title'],
                    'date_of_attendance_from' => $training['date_of_attendance_from'],
                    'date_of_attendance_to'   => $training['date_of_attendance_to'],
                    'number_of_hours'         => $training['number_of_hours'],
                    'type_of_id'              => $training['type_of_id'],
                    'sponsored_by'            => $training['sponsored_by'],
                    'employee_id'             => $employeeID,
                ]);
            });
        });


        return $data;
    }

    /**
     * > This function returns the other information of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the other information
     * of.
     * 
     */
    public function getOtherInformation(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeOtherInformation::where('employee_id', $employeeID)->get() ?? json_encode([]);
    }

    /**
     * It updates the employee's other information
     * 
     * @param array data The data to be inserted
     * @param employeeID The employee ID of the employee you want to update.
     */
    public function updateOtherInformation(array $data = [], $employeeID): array
    {
        DB::transaction(function () use ($data, $employeeID) {
            $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
            EmployeeOtherInformation::where('employee_id', $employeeID)->get()->each->delete();
            collect($data)->each(function ($information) use ($employeeID) {

                if (!empty($information['special_skill'])) {
                    EmployeeOtherInformation::create([
                        'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                        'special_skill' => $information['special_skill'],
                        'non_academic'  => $information['non_academic'],
                        'organization'  => $information['organization'],
                        'employee_id'       => $employeeID,
                    ]);
                }
            });
        });

        return $data;
    }

    /**
     * It returns the relevant queries of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the relevant queries
     * of an object of the EmployeeRelevantQuery model
     * 
     */
    public function getRelevantQueries(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeRelevantQuery::where('employee_id', $employeeID)->first();
    }

    /**
     * It updates the relevant query table.
     * 
     * @param array data The data to be inserted or updated.
     * @param employeeID The employee ID of the employee.
     * 
     * @return array The data is being returned.
     */
    public function updateRelevantQuery(array $data = [], $employeeID): array
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        EmployeeRelevantQuery::updateOrCreate([
            'employee_id' => $employeeID,
        ], [
            'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'question_34_a_answer'          => $data['question_34_a_answer'],
            'question_34_a_details'         => $data['question_34_a_details'],
            'question_34_b_answer'          => $data['question_34_b_answer'],
            'question_34_b_details'         => $data['question_34_b_details'],
            'question_35_a_answer'          => $data['question_35_a_answer'],
            'question_35_a_details'         => $data['question_35_a_details'],
            'question_35_b_answer'          => $data['question_35_b_answer'],
            'question_35_b_details'         => $data['question_35_b_details'],
            'question_35_b_date_filled'     => $data['question_35_b_date_filled'],
            'question_35_b_status_of_cases' => $data['question_35_b_status_of_cases'],
            'question_36_a_answer'          => $data['question_36_a_answer'],
            'question_36_a_details'         => $data['question_36_a_details'],
            'question_37_a_answer'          => $data['question_37_a_answer'],
            'question_37_a_details'         => $data['question_37_a_details'],
            'question_38_a_answer'          => $data['question_38_a_answer'],
            'question_38_a_details'         => $data['question_38_a_details'],
            'question_38_b_answer'          => $data['question_38_b_answer'],
            'question_38_b_details'         => $data['question_38_b_details'],
            'question_39_a_answer'          => $data['question_39_a_answer'],
            'question_39_a_details'         => $data['question_39_a_details'],
            'question_40_a_answer'          => $data['question_40_a_answer'],
            'question_40_a_details'         => $data['question_40_a_details'],
            'question_40_b_answer'          => $data['question_40_b_answer'],
            'question_40_b_details'         => $data['question_40_b_details'],
            'question_40_c_answer'          => $data['question_40_c_answer'],
            'question_40_c_details'         => $data['question_40_c_details'],
            'employee_id'                       => $employeeID,
        ]);


        return $data;
    }

    /**
     * It returns all the references of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the references of.
     * 
     */
    public function getReferences(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeReference::where('employee_id', $employeeID)->get();
    }

    /**
     * It updates the employee references by deleting all the existing references and then inserting
     * the new references
     * 
     * @param array data the array of data to be inserted
     * @param employeeID The employee ID of the employee you want to update the references of.
     * 
     * @return array The data that was passed in.
     */
    public function updateReferences(array $data = [], $employeeID): array
    {
        DB::transaction(function () use ($data, $employeeID) {
            $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);

            EmployeeReference::where('employee_id', $employeeID)->get()->each->delete();
            $data = array_filter($data, 'array_filter');
            foreach ($data as $reference) {
                EmployeeReference::create([
                    'id'               => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                    'name'             => $reference['name'],
                    'address'          => $reference['address'],
                    'telephone_number' => $reference['telephone_number'],
                    'employee_id'      => $employeeID,
                ]);
            }
        });

        return $data;
    }

    /**
     * It gets the government issued ID of an employee
     * 
     * @param string employeeID The employee ID of the employee you want to get the government issued
     * ID of.
     * 
     */
    public function getGovernmentIssuedID(string $employeeID)
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        return EmployeeIssuedID::where('employee_id', $employeeID)->first();
    }

    /**
     * It updates or creates a new record in the database.
     * 
     * @param array data The data to be inserted into the database.
     * @param employeeID The employee ID of the employee you want to update.
     * 
     * @return array The data is being returned.
     */
    public function updateGovernmentIssuedID(array $data = [], $employeeID): array
    {
        $employeeID = str_pad($employeeID, 4, "0", STR_PAD_LEFT);
        EmployeeIssuedID::updateOrCreate(['employee_id' => $employeeID], [
            'id'            => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'id_type'     => $data['id_type'],
            'id_no'       => $data['id_no'],
            'date'        => $data['date'],
            'employee_id'       => $employeeID,
        ]);

        return $data;
    }
}
