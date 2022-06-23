<?php

namespace App\Http\Controllers;

use App\Contracts\IDownloadType;
use App\Contracts\IPDSDownloadType;
use Carbon\Carbon;
use App\Employee;
use Illuminate\Support\Str;
use App\EmployeeIssuedID;
use App\EmployeeReference;
use App\EmployeeCivilService;
use App\EmployeeRelevantQuery;
use App\EmployeeVoluntaryWork;
use App\EmployeeSpouseChildren;
use App\EmployeeWorkExperience;
use App\EmployeeFamilyBackground;
use App\EmployeeOtherInformation;
use App\EmployeeTrainingAttained;
use App\EmployeeEducationalBackground;

class DownloadPersonalDataSheetController extends Controller implements IDownloadType
{
          public const C1 = 0;
          public const C2 = 1;
          public const C3 = 2;
          public const C4 = 3;

          public const CELLS = [
                    'C1' => [
                              'LASTNAME' => 'D8',
                              'FIRSTNAME' => 'D9',
                              'MIDDLENAME' => 'D10',
                              'NAME_EXTENSION' => 'L9',
                              'BIRTHDATE' => 'D11',
                              'BIRTHPLACE' => 'D13',
                              'CIVIL_STATUS_SINGLE'      => 'D15',
                              'CIVIL_STATUS_MARRIED'     => 'E15',
                              'CIVIL_STATUS_WIDOWED'     => 'D16',
                              'CIVIL_STATUS_SEPARATED'   => 'E16',
                              'CIVIL_STATUS_OTHERS'      => 'D17',
                              'CIVIL_STATUS_OTHERS_DATA' => 'E17',
                    ],
          ];

          public function __construct()
          {
                  // $this->middleware(['auth']);
          }

          private function generatePDS(string $id)
          {
                    $employee = Employee::with(['province_residential', 'city_residential', 'barangay_residential', 'province_permanent', 'city_permanent', 'barangay_permanent'])
                              ->where('Employee_id', $id)
                              ->first();
                    $familyBackground = EmployeeFamilyBackground::where('employee_id', $id)->first();
                    $children = EmployeeSpouseChildren::where('employee_id', $id)->get();
                    $educational = EmployeeEducationalBackground::where('employee_id', $id)->first();
                    $eligibilities = EmployeeCivilService::where('employee_id', $id)->get();
                    $workExperiences = EmployeeWorkExperience::where('employee_id', $id)->get();
                    $voluntaryWorks = EmployeeVoluntaryWork::where('employee_id', $id)->get();
                    $trainings = EmployeeTrainingAttained::where('employee_id', $id)->get();
                    $otherInformations = EmployeeOtherInformation::where('employee_id', $id)->get();
                    $relevantQueries = EmployeeRelevantQuery::where('employee_id', $id)->first();
                    $references = EmployeeReference::where('employee_id', $id)->get();
                    $issuedID = EmployeeIssuedID::where('employee_id', $id)->first();


                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path() . '\\PDS-TEMPLATE.xlsx');

                    $worksheet = $spreadsheet->getSheet(self::C1);

                    $worksheet
                              ->getStyle("A10")
                              ->getFill()
                              ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                              ->getStartColor()
                              ->setARGB('#eaeaea');


                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('CS FORM No. 212');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setItalic(true);
                    $richText->createTextRun("\nRevised 2017")->getFont()->setName("Calibri")->setSize(9)->setItalic(true)->setBold(true);
                    $spreadsheet->getActiveSheet()->getCell('A2')->setValue($richText);

                    $worksheet->getCell(self::CELLS['C1']['LASTNAME'])->setValue($employee->LastName);
                    $worksheet->getCell(self::CELLS['C1']['FIRSTNAME'])->setValue($employee->FirstName);
                    $worksheet->getCell(self::CELLS['C1']['MIDDLENAME'])->setValue($employee->MiddleName);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $spreadsheet->getActiveSheet()->getStyle(self::CELLS['C1']['NAME_EXTENSION'])->getAlignment()->setWrapText(true);
                    $richText->createTextRun("NAME EXTENSION (JR., SR) \n{$employee->extension}")->getFont()->setName("Arial Narrow")->setSize(7);
                    $spreadsheet->getActiveSheet()->getCell(self::CELLS['C1']['NAME_EXTENSION'])->setValue($richText);

                    $worksheet->getCell(self::CELLS['C1']['BIRTHDATE'])->setValue(Carbon::parse($employee->date_birth)->format('m/d/Y'));
                    $worksheet->getCell(self::CELLS['C1']['BIRTHPLACE'])->setValue(Str::upper($employee->BirthPlace));

                    $maleText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $maleText->createTextRun('R');
                    $payable->getFont()->setName('Wingdings 2');
                    $maleText->createTextRun(' MALE')->getFont()->setName("Arial Narrow")->setSize(8);

                    $femaleText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $femaleText->createTextRun('0');
                    $payable->getFont()->setName('Wingdings 2');
                    $femaleText->createTextRun(' FEMALE')->getFont()->setName("Arial Narrow")->setSize(8);

                    $singleText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $singleText->createTextRun(Str::upper($employee->CivilStatus) == 'SINGLE' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $singleText->createTextRun(' SINGLE')->getFont()->setName("Arial Narrow")->setSize(8);


                    $marriedText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $marriedText->createTextRun(Str::upper($employee->CivilStatus) == 'MARRIED' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $marriedText->createTextRun(' MARRIED')->getFont()->setName("Arial Narrow")->setSize(8);

                    $widowedText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $widowedText->createTextRun(Str::upper($employee->CivilStatus) == 'WIDOWED' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $widowedText->createTextRun(' WIDOWED')->getFont()->setName("Arial Narrow")->setSize(8);

                    $separatedText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $separatedText->createTextRun(Str::upper($employee->CivilStatus) == 'SEPARATEED' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $separatedText->createTextRun(' SEPARATED')->getFont()->setName("Arial Narrow")->setSize(8);

                    $othersText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $othersText->createTextRun(Str::upper($employee->CivilStatus) == 'OTHERS' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $othersText->createTextRun(' OTHER/S')->getFont()->setName("Arial Narrow")->setSize(8);

                    $worksheet->setCellValue(self::CELLS['C1']['CIVIL_STATUS_SINGLE'], $singleText);
                    $worksheet->setCellValue(self::CELLS['C1']['CIVIL_STATUS_MARRIED'], $marriedText);
                    $worksheet->setCellValue(self::CELLS['C1']['CIVIL_STATUS_WIDOWED'], $widowedText);
                    $worksheet->setCellValue(self::CELLS['C1']['CIVIL_STATUS_SEPARATED'], $separatedText);
                    $worksheet->setCellValue(self::CELLS['C1']['CIVIL_STATUS_OTHERS'], $othersText);
                    $worksheet->setCellValue(self::CELLS['C1']['CIVIL_STATUS_OTHERS_DATA'], $employee->civil_status_others);

                    $filipinoText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $filipinoText->createTextRun(Str::upper($employee->citizenship) == 'FILIPINO' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $filipinoText->createTextRun(' Filipino')->getFont()->setName("Calibri")->setSize(8);

                    $dualCitizenText =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $dualCitizenText->createTextRun(Str::upper($employee->citizenship) == 'DUAL CITIZEN' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $dualCitizenText->createTextRun(' Dual Citizenship')->getFont()->setName("Calibri")->setSize(8);

                    $worksheet->setCellValue("J11", $filipinoText);
                    $worksheet->setCellValue("L11", $dualCitizenText);

                    $byBirth =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $byBirth->createTextRun(Str::upper($employee->citizenship_by) == 'BY BIRTH' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $byBirth->createTextRun(' By Birth')->getFont()->setName("Calibri")->setSize(8);

                    $byNaturalization =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $byNaturalization->createTextRun(Str::upper($employee->citizenship_by) == 'BY NATURALIZATION' ? 'R' : 0);
                    $payable->getFont()->setName('Wingdings 2');
                    $byNaturalization->createTextRun(' By Naturalization')->getFont()->setName("Calibri")->setSize(8);

                    $worksheet->setCellValue("K12", $byBirth);
                    $worksheet->setCellValue("M12", $byNaturalization);

                    $worksheet->setCellValue("J14", $employee->indicate_country);

                    $worksheet->setCellValue("D14", $maleText);
                    $worksheet->setCellValue("E14", $femaleText);

                    $worksheet->setCellValue("D20", $employee->height);
                    $worksheet->setCellValue("D22", $employee->weight);
                    $worksheet->setCellValue("D23", $employee->blood_type);
                    $worksheet->setCellValue("D25", $employee->gsis_id_no);
                    $worksheet->setCellValue("D27", $employee->pag_ibig_no);
                    $worksheet->setCellValue("D29", $employee->philhealth_no);
                    $worksheet->setCellValue("D30", $employee->sss_no);
                    $worksheet->setCellValue("D31", $employee->tin_no);
                    $worksheet->setCellValue("D32", $employee->agency_employee_no);
                    $worksheet->setCellValue("I30", $employee->telephone_no);
                    $worksheet->setCellValue("I31", $employee->ContactNumber);
                    $worksheet->setCellValue("I32", $employee->Email_address);

                    $worksheet->setCellValue("I15", Str::upper($employee->residential_house_no));
                    $worksheet->setCellValue("L15", Str::upper($employee->residential_street));
                    $worksheet->setCellValue("I17", Str::upper($employee->residential_village));
                    $worksheet->setCellValue("L17", Str::upper($employee->barangay_residential?->name));
                    $worksheet->setCellValue("I20", Str::upper($employee->city_residential?->name));
                    $worksheet->setCellValue("L20", Str::upper($employee->province_residential?->name));
                    $worksheet->setCellValue("I22", $employee->residential_zip_code);

                    $worksheet->setCellValue("I23", Str::upper($employee->permanent_house_no));
                    $worksheet->setCellValue("L23", Str::upper($employee->permanent_street));
                    $worksheet->setCellValue("I25", Str::upper($employee->permanent_village));
                    $worksheet->setCellValue("L25", Str::upper($employee->barangay_permanent?->name));
                    $worksheet->setCellValue("I27", Str::upper($employee->city_permanent?->name));
                    $worksheet->setCellValue("L27", Str::upper($employee->province_permanent?->name));
                    $worksheet->setCellValue("I29", $employee->permanent_zip_code);

                    $worksheet->setCellValue("D41", $familyBackground?->father_lastname);
                    $worksheet->setCellValue("D42", $familyBackground?->father_firstname);
                    $worksheet->setCellValue("D43", $familyBackground?->father_middlename);

                    $fatherExtension = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $spreadsheet->getActiveSheet()->getStyle('G44')->getAlignment()->setWrapText(true);
                    $fatherExtension->createTextRun("NAME EXTENSION (JR., SR) \n{$familyBackground?->father_extension}")->getFont()->setName("Arial Narrow")->setSize(7);
                    $spreadsheet->getActiveSheet()->getCell('G42')->setValue($fatherExtension);


                    $worksheet->setCellValue("D45", $familyBackground?->mother_lastname);
                    $worksheet->setCellValue("D46", $familyBackground?->mother_firstname);
                    $worksheet->setCellValue("D47", $familyBackground?->mother_middlename);

                    $worksheet->setCellValue("D34", $familyBackground?->spouse_lastname);
                    $worksheet->setCellValue("D35", $familyBackground?->spouse_firstname);
                    $worksheet->setCellValue("D36", $familyBackground?->spouse_middlename);
                    $worksheet->setCellValue("D37", $familyBackground?->spouse_occupation);
                    $worksheet->setCellValue("D38", $familyBackground?->spouse_employer_business_name);
                    $worksheet->setCellValue("D39", $familyBackground?->spouse_business_address);
                    $worksheet->setCellValue("D40", $familyBackground?->spouse_telephone_number);

                    $spouseExtension = new \PhpOffice\PhpSpreadsheet\RichText\RichText();

                    $spreadsheet->getActiveSheet()->getStyle('G37')->getAlignment()->setWrapText(true);
                    $spouseExtension->createTextRun("NAME EXTENSION (JR., SR) \n{$familyBackground?->spouse_extension}")->getFont()->setName("Arial Narrow")->setSize(7);
                    $spreadsheet->getActiveSheet()->getCell('G35')->setValue($spouseExtension);

                    $index = 35;
                    $children->take(12)->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("i" . $index, Str::upper($row->name));
                              $worksheet->setCellValue("m" . $index, $row->date_of_birth);
                              $index++;
                    });


                    $worksheet->setCellValue("D52", Str::upper($educational?->elementary_name));
                    $worksheet->setCellValue("G52", Str::upper($educational?->elementary_education));
                    $worksheet->setCellValue("J52", empty($educational?->elementary_name) ?  '' : $educational?->elementary_period_from);
                    $worksheet->setCellValue("K52", empty($educational?->elementary_name) ?  '' : $educational?->elementary_period_to);
                    $worksheet->setCellValue("L52", $educational?->elementary_highest_level_units_earned);
                    $worksheet->setCellValue("M52", $educational?->elementary_year_graduated);
                    $worksheet->setCellValue("N52", $educational?->elementary_scholarship);

                    $worksheet->setCellValue("D53", Str::upper($educational?->secondary_name));
                    $worksheet->setCellValue("G53", Str::upper($educational?->secondary_education));
                    $worksheet->setCellValue("J53", empty($educational?->secondary_name) ?  '' : $educational?->secondary_period_from);
                    $worksheet->setCellValue("K53", empty($educational?->secondary_name) ?  '' : $educational?->secondary_period_to);
                    $worksheet->setCellValue("L53", $educational?->secondary_highest_level_units_earned);
                    $worksheet->setCellValue("M53", $educational?->secondary_year_graduated);
                    $worksheet->setCellValue("N53", $educational?->secondary_scholarship);

                    $worksheet->setCellValue("D54", Str::upper($educational?->vocational_trade_course_name));
                    $worksheet->setCellValue("G54", Str::upper($educational?->vocational_education));
                    $worksheet->setCellValue("J54", empty($educational?->vocational_trade_course_name) ? '' : $educational?->vocational_trade_course_period_from);
                    $worksheet->setCellValue("K54", empty($educational?->vocational_trade_course_name) ? '' : $educational?->vocational_trade_course_period_to);
                    $worksheet->setCellValue("L54", $educational?->vocational_trade_course_highest_level_units_earned);
                    $worksheet->setCellValue("M54", $educational?->vocational_trade_course_year_graduated);
                    $worksheet->setCellValue("N54", $educational?->vocational_trade_course_scholarship);

                    $worksheet->setCellValue("D55", Str::Upper($educational?->college_name));
                    $worksheet->setCellValue("G55", Str::upper($educational?->college_education));
                    $worksheet->setCellValue("J55", empty($educational?->college_name) ? '' : $educational->college_period_from);
                    $worksheet->setCellValue("K55", empty($educational?->college_name) ? '' : $educational->college_period_to);
                    $worksheet->setCellValue("L55", $educational?->college_highest_level_units_earned);
                    $worksheet->setCellValue("M55", $educational?->college_year_graduated);
                    $worksheet->setCellValue("N55", $educational?->college_scholarship);

                    $worksheet->setCellValue("D56", Str::upper($educational?->graduate_studies_name));
                    $worksheet->setCellValue("G56", Str::upper($educational?->graduate_studies_education));
                    $worksheet->setCellValue("J56", empty($educational?->graduate_studies_name) ? '' : $educational?->graduate_studies_period_from);
                    $worksheet->setCellValue("K56", empty($educational?->graduate_studies_name) ? '' : $educational?->graduate_studies_period_to);
                    $worksheet->setCellValue("L56", $educational?->graduate_studies_highest_level_units_earned);
                    $worksheet->setCellValue("M56", $educational?->graduate_studies_year_graduated);
                    $worksheet->setCellValue("N56", $educational?->graduate_studies_scholarship);

                    $worksheet = $spreadsheet->getSheet(self::C2);
                    $index = 4;
                    $eligibilities->take(6)->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("A" . $index, Str::upper($row->career_service));
                              $worksheet->setCellValue("F" . $index, $row->rating);
                              $worksheet->setCellValue("G" . $index, $row->date_of_examination);
                              $worksheet->setCellValue("I" . $index, Str::upper($row->place_of_examination));
                              $worksheet->setCellValue("L" . $index, $row->license_number);
                              $worksheet->setCellValue("M" . $index, $row->date_of_validitiy);
                              $index++;
                    });

                    $index = 17;
                    $workExperiences->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("A" . $index, Carbon::parse($row->from)->format('m/d/Y'));
                              if ($index == 17) {
                                        $worksheet->setCellValue("C" . $index, "PRESENT");
                              } else {
                                        $worksheet->setCellValue("C" . $index, Carbon::parse($row->to)->format('m/d/Y'));
                              }
                              $worksheet->setCellValue("D" . $index, Str::upper($row->position_title));
                              $worksheet->setCellValue("G" . $index, Str::upper($row->office));
                              $worksheet->setCellValue("J" . $index, $row->monthly_salary);
                              $worksheet->setCellValue("K" . $index, ' ' . $row->salary_job_pay_grade);
                              $worksheet->setCellValue("L" . $index, Str::upper($row->status_of_appointment));
                              $worksheet->setCellValue("M" . $index, Str::upper($row->government_service));
                              $index++;
                    });

                    $worksheet = $spreadsheet->getSheet(self::C3);

                    $index = 5;
                    $voluntaryWorks->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("a" . $index, $row->name_and_address);
                              $worksheet->setCellValue("e" . $index, Carbon::parse($row->inclusive_date_from)->format('m/d/Y'));
                              $worksheet->setCellValue("f" . $index, Carbon::parse($row->inclusive_date_to)->format('m/d/Y'));
                              $worksheet->setCellValue("G" . $index, $row->no_of_hours);
                              $worksheet->setCellValue("h" . $index, $row->position);
                              $index++;
                    });

                    $index = 18;
                    $trainings->take(21)->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("a" . $index, Str::upper($row->title));
                              $worksheet->setCellValue("e" . $index, Carbon::parse($row->date_of_attendance_from)->format('m/d/Y'));
                              $worksheet->setCellValue("f" . $index, Carbon::parse($row->date_of_attendance_to)->format('m/d/Y'));
                              $worksheet->setCellValue("G" . $index, $row->number_of_hours);
                              $worksheet->setCellValue("i" . $index, Str::upper($row->sponsored_by));
                              $index++;
                    });

                    $index  = 42;
                    $otherInformations->take(7)->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("a" . $index, Str::upper($row->special_skill));
                              $worksheet->setCellValue("c" . $index, Str::upper($row->special_skill));
                              $worksheet->setCellValue("i" . $index, Str::upper($row->organization ?? "N/A"));
                              $index++;
                    });

                    $worksheet = $spreadsheet->getSheet(self::C4);


                    $worksheet->setCellValue("G5", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_34_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I5", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_34_a_answer == 'no' ? true : false));

                    $worksheet->setCellValue("G7", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_34_b_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I7", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_34_b_answer == 'no' ? true : false));
                    $worksheet->setCellValue("H10", $relevantQueries?->question_34_b_details);

                    $worksheet->setCellValue("G12", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_35_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I12", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_35_a_answer == 'no' ? true : false));
                    $worksheet->setCellValue("H14", $relevantQueries?->question_35_a_details);


                    $worksheet->setCellValue("G17", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_35_b_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I17", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_35_b_answer == 'no' ? true : false));

                    $worksheet->setCellValue("K19", $relevantQueries?->question_35_b_date_filled);
                    $worksheet->setCellValue("K20", $relevantQueries?->question_35_b_status_of_cases);

                    $worksheet->setCellValue("G22", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_36_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I22", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_36_a_answer == 'no' ? true : false));
                    $worksheet->setCellValue("H24", $relevantQueries?->question_36_a_details);


                    $worksheet->setCellValue("G26", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_37_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I26", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_37_a_answer == 'no' ? true : false));
                    $worksheet->setCellValue("H28", $relevantQueries?->question_37_a_details);

                    $worksheet->setCellValue("G30", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_38_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I30", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_38_a_answer == 'no' ? true : false));
                    $worksheet->setCellValue("K31", $relevantQueries?->question_38_a_details);
                    $worksheet->setCellValue("K34", $relevantQueries?->question_38_b_details);

                    $worksheet->setCellValue("G33", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_38_b_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I33", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_38_b_answer == 'no' ? true : false));

                    $worksheet->setCellValue("H38", $relevantQueries?->question_39_a_details);

                    $worksheet->setCellValue("G36", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_39_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I36", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_39_a_answer == 'no' ? true : false));

                    $worksheet->setCellValue("G42", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_40_a_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I42", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_40_a_answer == 'no' ? true : false));

                    $worksheet->setCellValue("G44", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_40_b_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I44", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_40_b_answer == 'no' ? true : false));

                    $worksheet->setCellValue("G46", $this->relevantQueriesCheckbox("YES", $relevantQueries?->question_40_c_answer == 'yes' ? true : false));
                    $worksheet->setCellValue("I46", $this->relevantQueriesCheckbox("NO", $relevantQueries?->question_40_c_answer == 'no' ? true : false));

                    $worksheet->setCellValue("L43", $relevantQueries?->question_40_a_details);
                    $worksheet->setCellValue("L45", $relevantQueries?->question_40_b_details);
                    $worksheet->setCellValue("L47", $relevantQueries?->question_40_c_details);


                    $index = 51;
                    $references->each(function ($row) use (&$worksheet, &$index) {
                              $worksheet->setCellValue("A" . $index, Str::upper($row->name));
                              $worksheet->setCellValue("F" . $index, Str::upper($row->address));
                              $worksheet->setCellValue("G" . $index, Str::upper($row->telephone_number ?? "N/A"));
                              $index++;
                    });

                    $spreadsheet->getActiveSheet()->getStyle('K51')->getAlignment()->setWrapText(true);
                    $worksheet->setCellValue('K51', 'ID picture taken within the last 6 months 3.5 cm x 4.5 cm (passport size) With full and handwritten name tag and signature over printeed name Computer generated or photocopied picture is not acceptable');

                    if (isset($issuedID->id_type)) {
                              $worksheet->setCellValue("D60", Str::upper($issuedID->id_type));
                              $worksheet->setCellValue("D61", Str::upper($issuedID->id_no));
                              $worksheet->setCellValue("D63", Str::upper($issuedID->date));
                    }

                    $spreadsheet->getSheet(self::C1)->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
                    $spreadsheet->getSheet(self::C2)->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
                    $spreadsheet->getSheet(self::C3)->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
                    $spreadsheet->getSheet(self::C4)->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);


                    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');

                    $fileName =  Str::upper(trim($employee->Employee_id)) . '-E-PDS';
                    $extension = '.xls';
                    $writer->save(storage_path() . '\\generated_pds\\' . $fileName . $extension);

                    return response()->json(['filename' => $fileName, 'success' => true]);
          }

          private function relevantQueriesCheckbox($text, $isCheck)
          {
                    $yesCheckbox =  new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $yesCheckbox->createTextRun($isCheck ? 'R' : '0');
                    $payable->getFont()->setName('Wingdings 2');
                    $yesCheckbox->createTextRun(' ' . $text)->getFont()->setName("Calibri");
                    return $yesCheckbox;
          }

          public function generate(string $id)
          {
                  return $this->generatePDS($id);
          }

          public function excel(string $id)
          {
                  $this->generate($id);
                  return response()->download(storage_path() . '\\generated_pds\\' . $id . '-E-PDS' . ".xls");
          }

          public function pdf(string $fileName)
          {
                  $file = storage_path() . '\\generated_pds\\' . $fileName . "-E-PDS.pdf";
                  return response()->download($file);
          }
}
