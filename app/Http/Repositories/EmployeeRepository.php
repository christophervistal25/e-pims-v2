<?php
namespace App\Http\Repositories;
use App\Employee;
use App\EmployeeFamilyBackground;
use App\EmployeeEducationalBackground;
use App\EmployeeCivilService;
use App\EmployeeWorkExperience;
use App\EmployeeVoluntaryWork;
use App\EmployeeTrainingAttained;
use App\EmployeeOtherInformation;
use App\EmployeeReference;
use App\EmployeeRelevantQuery;
use App\EmployeeSpouseChildren;
use App\EmployeeIssuedID;

class EmployeeRepository
{
    public const FIRST_INDEX = 0;
    /**
     * For development purpose randomly generate employee_id
     */
    public function addPersonInformation(array $data = []) :array
    {

        $employee =  Employee::create([

                'employee_id'          => mt_rand(100000, 999999),
                'lastname'             => $data['surname'],
                'firstname'            => $data['firstname'],
                'middlename'           => $data['middlename'],
                'extension'            => $data['nameExtension'],
                'date_birth'           => $data['dateOfBirth'],
                'place_birth'          => $data['placeOfBirth'],
                'sex'                  => $data['sex'],
                'civil_status'         => $data['status'],
                'height'               => $data['height'],
                'weight'               => $data['weight'],
                'blood_type'           => $data['bloodType'],
                'gsis_id_no'           => $data['gsisIdNo'],
                'pag_ibig_no'          => $data['pagibigIdNo'],
                'philhealth_no'        => $data['philHealthIdNo'],
                'sss_no'               => $data['sssIdNo'],
                'tin_no'               => $data['tinIdNo'],
                'agency_employee_no'   => $data['agencyEmpIdNo'],
                'citizenship'          => $data['citizenship'],
                'residential_house_no' => $data['residentialLotNo'],
                'residential_street'   => $data['residentialStreet'],
                'residential_village'  => $data['residentialSubdivision'],
                'residential_barangay' => $data['residentialBarangay'],
                'residential_city'     => $data['residentialCity'],
                'residential_province' => $data['residentialProvince'],
                'residential_zip_code' => $data['residentialZipCode'],
                'permanent_house_no'   => $data['permanentLotNo'],
                'permanent_street'     => $data['permanentStreet'],
                'permanent_village'    => $data['permanentSubdivision'],
                'permanent_barangay'   => $data['permanentBarangay'],
                'permanent_city'       => $data['permanentCity'],
                'permanent_province'   => $data['permanentProvince'],
                'permanent_zip_code'   => $data['permanentZipCode'],
                'telephone_no'         => $data['telephoneNumber'],
                'mobile_no'            => $data['mobileNumber'],
                'email_address'        => $data['emailAddress'],
                'status'               => '',
            ]);


            $data['employee_id'] = $employee->employee_id;
        return $data;
    }

    private function insertChilds(Employee $employee, array $childs = [])
    {
        $childrens = [];

        foreach($childs as $child) {
            if(!is_null($child['cname'])) {
                $childrens[] = new EmployeeSpouseChildren([
                    'name'          => $child['cname'],
                    'date_of_birth' => $child['cdateOfBirth'],
                ]);
            }
        }

        $employee->spouse_child()->saveMany($childrens);
    }

    public function addPersonFamilyBackground(array $data = []) :array
    {

        $employee = Employee::find($data['employee_id']);
        $this->insertChilds($employee, $data['spouse']);

        $employeeFamilyBackground = new EmployeeFamilyBackground();

        $employeeFamilyBackground->spouse_firstname              = $data['sfirstname'];
        $employeeFamilyBackground->spouse_lastname               = $data['ssurname'];
        $employeeFamilyBackground->spouse_middlename             = $data['smiddleame'];
        $employeeFamilyBackground->spouse_extension              = $data['snameexten'];
        $employeeFamilyBackground->spouse_occupation             = $data['soccupation'];
        $employeeFamilyBackground->spouse_employer_business_name = $data['sempname'];
        $employeeFamilyBackground->spouse_business_address       = $data['sbusadd'];
        $employeeFamilyBackground->spouse_telephone_number       = $data['stelno'];
        $employeeFamilyBackground->father_firstname              = $data['ffirstname'];
        $employeeFamilyBackground->father_lastname               = $data['fsurname'];
        $employeeFamilyBackground->father_middlename             = $data['fmiddlename'];
        $employeeFamilyBackground->father_extension              = $data['fnameexten'];
        $employeeFamilyBackground->mother_maidenname             = $data['msurname'];
        $employeeFamilyBackground->mother_lastname               = $data['msurname'];
        $employeeFamilyBackground->mother_firstname              = $data['mfirstname'];
        $employeeFamilyBackground->mother_middlename             = $data['mmiddlename'];


        $employee->family_background()->save($employeeFamilyBackground);

        return $data;

    }

    public function addEducationalBackground(array $data = []) :array
    {
        $employee = Employee::find($data['employee_id']);

        $employeeEducationalBackground                                                     = new EmployeeEducationalBackground();
        $employeeEducationalBackground->elementary_name                                    = $data['elementary'];
        $employeeEducationalBackground->elementary_education                               = $data['ebasicEduc'];
        $employeeEducationalBackground->elementary_period_from                             = $data['eperiodFrom'];
        $employeeEducationalBackground->elementary_period_to                               = $data['eperiodTo'];
        $employeeEducationalBackground->elementary_highest_level_units_earned              = $data['eunitEarned'];
        $employeeEducationalBackground->elementary_year_graduated                          = $data['eyrGrad'];
        $employeeEducationalBackground->elementary_scholarship                             = $data['escholarship'];
        $employeeEducationalBackground->secondary_name                                     = $data['snameOfSchool'];
        $employeeEducationalBackground->secondary_education                                = $data['sbasicEduc'];
        $employeeEducationalBackground->secondary_period_from                              = $data['speriodFrom'];
        $employeeEducationalBackground->secondary_period_to                                = $data['speriodTo'];
        $employeeEducationalBackground->secondary_highest_level_units_earned               = $data['sunitEarned'];
        $employeeEducationalBackground->secondary_year_graduated                           = $data['syrGrad'];
        $employeeEducationalBackground->secondary_scholarship                              = $data['sscholarship'];
        $employeeEducationalBackground->vocational_trade_course_name                       = $data['vnameOfVoc'];
        $employeeEducationalBackground->vocational_education                               = $data['vbasicEduc'];
        $employeeEducationalBackground->vocational_trade_course_period_from                = $data['vperiodFrom'];
        $employeeEducationalBackground->vocational_trade_course_period_to                  = $data['vperiodTo'];
        $employeeEducationalBackground->vocational_trade_course_highest_level_units_earned = $data['vunitEarned'];
        $employeeEducationalBackground->vocational_trade_course_year_graduated             = $data['vyrGrad'];
        $employeeEducationalBackground->vocational_trade_course_scholarship                = $data['vscholarship'];
        $employeeEducationalBackground->college_name                                       = $data['cnameOfSchool'];
        $employeeEducationalBackground->college_education                                  = $data['cbasicEduc'];
        $employeeEducationalBackground->college_period_from                                = $data['cperiodFrom'];
        $employeeEducationalBackground->college_period_to                                  = $data['cperiodTo'];
        $employeeEducationalBackground->college_highest_level_units_earned                 = $data['cunitEarned'];
        $employeeEducationalBackground->college_year_graduated                             = $data['cyrGrad'];
        $employeeEducationalBackground->college_scholarship                                = $data['cscholarship'];
        $employeeEducationalBackground->graduate_studies_name                              = $data['gnameOfSchool'];
        $employeeEducationalBackground->graduate_studies_education                         = $data['gbasicEduc'];
        $employeeEducationalBackground->graduate_studies_period_from                       = $data['gperiodFrom'];
        $employeeEducationalBackground->graduate_studies_period_to                         = $data['gperiodTo'];
        $employeeEducationalBackground->graduate_studies_highest_level_units_earned        = $data['gunitEarned'];
        $employeeEducationalBackground->graduate_studies_year_graduated                    = $data['gyrGrad'];
        $employeeEducationalBackground->graduate_studies_scholarship                       = $data['gscholarship'];

        $employee->educational_background()->save($employeeEducationalBackground);

        return $data;
    }

    public function addCivilService(array $civilRecords = []) :array
    {
        // Get the employee id of each record.
        $employeeId = $civilRecords[self::FIRST_INDEX]['employee_id'];
        $employee = Employee::find($employeeId);
        foreach($civilRecords as $record) {
            if(!is_null($record['rating'])) {
                $records[] = EmployeeCivilService::firstOrNew(
                    [

                        'license_number' => $record['number'],
                    ],
                    [
                        'career_service'       => $record['careerServ'],
                        'rating'               => $record['rating'],
                        'date_of_examination'  => $record['dateOfExam'],
                        'place_of_examination' => $record['placeOfExam'],
                        'license_number'       => $record['number'],
                        'date_of_validitiy'    => $record['dateOfValid'],
                    ]
                );
            }
        }

        $employee->civil_service()->saveMany($records);

        return $civilRecords;
    }

    public function addWorkExperience(array $workExperiences = []) :array
    {

        $employee = Employee::find($workExperiences[self::FIRST_INDEX]['employee_id']);

        foreach($workExperiences as $record) {
            if(!is_null($record['from'])) {
                $records[] = EmployeeWorkExperience::firstOrNew(
                    [
                        'from'                  => $record['from'],
                        'to'                    => $record['to'],
                        'position_title'        => $record['position'],
                        'office'                => $record['dept'],
                        'monthly_salary'        => $record['monSalary'],
                        'salary_job_pay_grade'  => $record['payGrade'],
                        'status_of_appointment' => $record['statOfApp'],
                        'government_service'    => $record['govServ'],
                    ]
                );
            }
        }

        $employee->civil_service()->saveMany($records);

        return $workExperiences;
    }

    public function addVoluntary(array $voluntaryRecord = []) :array
    {
        $employee = Employee::find($voluntaryRecord[self::FIRST_INDEX]['employee_id']);
        $records = [];

        foreach($voluntaryRecord as $record) {
            if(!is_null($record['nameOfOrg'])) {
                $records[] =  EmployeeVoluntaryWork::firstOrNew(
                    [
                        'name_and_address'    => $record['nameOfOrg'],
                        'inclusive_date_from' => $record['from'],
                        'inclusive_date_to'   => $record['to'],
                        'position'            => $record['position'],
                        'no_of_hours'         => $record['noOfHrs']
                    ]
                );
            }
        }

       $employee->voluntary_work()->saveMany($records);
       return $voluntaryRecord;
    }

    public function addLearning(array $trainings = []) :array
    {
        $employeeId = $trainings[self::FIRST_INDEX]['employee_id'];

        $employee = Employee::find($employeeId);

        $records = [];

        foreach($trainings as $training) {
            if(!is_null($training['noOfHours'])) {
                $records[] = EmployeeTrainingAttained::firstOrNew([
                    'title'                   => $training['nameOfTraining'],
                    'date_of_attendance_from' => $training['from'],
                    'date_of_attendance_to'   => $training['to'],
                ],[
                    'title'                   => $training['nameOfTraining'],
                    'date_of_attendance_from' => $training['from'],
                    'date_of_attendance_to'   => $training['to'],
                    'number_of_hours'         => $training['noOfHours'],
                    'type_of_id'              => $training['typeOfLD'],
                    'sponsored_by'            => $training['conducted'],
                ]);
            }
        }

        $employee->program_attained()->saveMany($records);
        return $trainings;
    }

    public function addOtherInformation(array $informations = [])  :array
    {
        $employeeId = $informations[self::FIRST_INDEX]['employee_id'];

        $employee = Employee::find($employeeId);
        $otherInformations = [];
        foreach($informations as $information) {
            $otherInformations[] = EmployeeOtherInformation::firstOrNew([
                'special_skill' => $information['skill'],
                'non_academic'  => $information['recog'],
                'organization'  => $information['memAssociation'],
            ]);
        }

        $employee->other_information()->saveMany($otherInformations);
        return $informations;
    }

    public function addRelevantQueries(array $queries = []) :array
    {
        $employee = Employee::find($queries['employee_id']);
        $relevantQuery = new EmployeeRelevantQuery();
        $relevantQuery->question_34_a_answer =  $queries['no_34_a'];
        $relevantQuery->question_34_a_details = $queries['no_34_a_details'];
        $relevantQuery->question_34_b_answer =  $queries['no_34_b'];
        $relevantQuery->question_34_b_details = $queries['no_34_b_details'];
        $relevantQuery->question_35_a_answer =  $queries['no_35_a'];
        $relevantQuery->question_35_a_details = $queries['no_35_a_details'];
        $relevantQuery->question_35_b_answer =  $queries['no_35_b'];
        $relevantQuery->question_35_b_details = $queries['no_35_b_details'];
        $relevantQuery->question_36_a_answer =  $queries['no_36'];
        $relevantQuery->question_36_a_details = $queries['no_36_details'];
        $relevantQuery->question_37_a_answer =  $queries['no_37'];
        $relevantQuery->question_37_a_details = $queries['no_37_details'];
        $relevantQuery->question_38_a_answer =  $queries['no_38_a'];
        $relevantQuery->question_38_a_details = $queries['no_38_a_details'];
        $relevantQuery->question_38_b_answer =  $queries['no_38_b'];
        $relevantQuery->question_38_b_details = $queries['no_38_b_details'];
        $relevantQuery->question_39_a_answer =  $queries['no_39'];
        $relevantQuery->question_39_a_details = $queries['no_39_details'];
        $relevantQuery->question_40_a_answer =  $queries['no_40_a'];
        $relevantQuery->question_40_a_details = $queries['no_40_a_details'];
        $relevantQuery->question_40_b_answer =  $queries['no_40_b'];
        $relevantQuery->question_40_b_details = $queries['no_40_b_details'];
        $relevantQuery->question_40_c_answer =  $queries['no_40_c'];
        $relevantQuery->question_40_c_details = $queries['no_40_c_details'];

        $employee->relevant_queries()->save($relevantQuery);

        return $queries;
    }

    public function addReferences(array $references = []) : array
    {
        $employeeId = $references[self::FIRST_INDEX]['employee_id'];

        $employee = Employee::find($employeeId);

        foreach($references as $reference) {
            $records[] = EmployeeReference::firstOrNew([
                'name'             => $reference['refName'],
                'address'          => $reference['refAdd'],
                'telephone_number' => $reference['refTelNo']
            ]);
        }

        $employee->references()->saveMany($records);
        return $references;
    }

    public function addIssuedID(array $data = [])
    {
        $employee = Employee::find($data['employee_id']);

        $employeeIssuedId = new EmployeeIssuedID();
        $employeeIssuedId->id_type = $data['nameOfGovId'];
        $employeeIssuedId->id_no = $data['idNo'];
        $employeeIssuedId->date = $data['dateOfIssuance'];

        return $employee->issued_id()->save($employeeIssuedId);
    }
}
