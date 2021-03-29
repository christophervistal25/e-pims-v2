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

class EmployeeRepository
{
    /**
     * For development purpose randomly generate employee_id
     */
    public function addPersonInformation(array $data = []) :Employee
    {
        $data = $data['personalInformation'];

        return Employee::create([
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
    }

    /**
     * Add Employee family background.
     */
    public function addPersonFamilyBackground(array $data = []) :EmployeeFamilyBackground
    {
        $employee = Employee::find($data['employee_id']);

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


        return $employee->family_background()->save($employeeFamilyBackground);

    }

    public function addEducationalBackground(array $data = []) :EmployeeEducationalBackground
    {
        // dd($data);
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

        return $employee->educational_background()->save($employeeEducationalBackground);
    }

    public function addCivilService(array $civilRecords = []) :array
    {

        $employee = Employee::find('988957');
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

        return $employee->civil_service()->saveMany($records);
    }

    public function addWorkExperience(array $workExperiences = []) :array
    {

        $employee = Employee::find('856194');

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

        return $employee->civil_service()->saveMany($records);
    }

    public function addVoluntary(array $voluntaryRecord = []) :array
    {
        $employee = Employee::find('856194');
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

        return $employee->voluntary_work()->saveMany($records);
    }

    public function addLearning(array $trainings = []) :array
    {
        $employee = Employee::find('856194');
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

        return $employee->program_attained()->saveMany($records);

    }

    public function addOtherInformation(array $informations = [])  :array
    {
        $employee = Employee::find('856194');
        $otherInformations = [];
        foreach($informations as $information) {
            $otherInformations[] = EmployeeOtherInformation::firstOrNew([
                'special_skill' => $information['skill'],
                'non_academic'  => $information['recog'],
                'organization'  => $information['memAssociation'],
            ]);
        }

       return $employee->other_information()->saveMany($otherInformations);
    }

    public function addRelevantQueries(array $queries = []) :array
    {
        dd($queries);
    }

    public function addReferences(array $references = []) : array
    {
        $employee = Employee::find('856194');
        foreach($references as $reference) {
            $records[] = EmployeeReference::firstOrNew([
                'name'             => $reference['refName'],
                'address'          => $reference['refAdd'],
                'telephone_number' => $reference['refTelNo']
            ]);
        }

        return $employee->references()->saveMany($records);
    }
}
