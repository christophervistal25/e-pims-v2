<?php
namespace App\Http\Repositories;
use App\Employee;

class EmployeeRepository
{
    /**
     * For development purpose randomly generate employee_id
     */
    public function addPersonInformation(array $data = []) :Employee
    {
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
            'blood_type'           => $data['bloodtype'],
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
}