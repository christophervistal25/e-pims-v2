<?php
namespace App\Http\Repositories;
use App\Employee;
use App\EmployeeFamilyBackground;

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
}
