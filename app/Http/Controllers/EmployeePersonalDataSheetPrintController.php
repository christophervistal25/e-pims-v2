<?php

namespace App\Http\Controllers;

use App\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Repositories\EmployeePersonalDataSheetPrintRepository;

class EmployeePersonalDataSheetPrintController extends Controller
{
    protected const PERSONAL_INFORMATION_CELLS = [
            'D10' => 'lastname',
            'D11' => 'firstname',
            'D12' => 'middlename',
            'L11' => 'extension',
            'D13' => 'date_birth',
            'J13' => 'citizenship',
            'D15' => 'place_birth',
            'D17' => 'civil_satus',
            'D16' => 'sex',
            'D22' => 'height',
            'D24' => 'weight',
            'D25' => 'bloodtype',
            'D27' => 'gsis_id_no',
            'D29' => 'pag_ibig_no',
            'D31' => 'philhealth_no',
            'D32' => 'sss_no',
            'D33' => 'tin_no',
            'D34' => 'agency_employee_no',
            'I32' => 'telephone_no',
            'I33' => 'mobile_no',
            'I34' => 'email_address',
            'I17' => 'residential_house_no',
            'L17' => 'residential_street',
            'I19' => 'residential_village',
            'L19' => 'residential_barangay_text',
            'I22' => 'residential_city_text',
            'L22' => 'residential_province_text',
            'I24' => 'residential_zip_code',
            'I25' => 'permanent_house_no',
            'L25' => 'permanent_street',
            'I27' => 'permanent_village',
            'L27' => 'permanent_barangay_text',
            'I29' => 'permanent_city_text',
            'L29' => 'permanent_province_text',
            'I31' => 'permanent_zip_code'
    ];

    public function __construct(EmployeePersonalDataSheetPrintRepository $printRepo)
    {
        $this->printRepository = $printRepo;
    }

    public function  __invoke(string $employeeId)
    {
        $employee = Employee::fetchWithFullInformation($employeeId);
        $fileName = $employee->employee_id . '_PDS.xlsx'; 
        $base     = public_path() . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'CS_FORM.xlsx';
        $location = public_path() . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'generated' . DIRECTORY_SEPARATOR;
        
        $this->printRepository->setBaseFileTemplate($base);
        $this->printRepository->writeAll(self::PERSONAL_INFORMATION_CELLS, $employee);
        $this->printRepository->save($location, $fileName);
    }
}
