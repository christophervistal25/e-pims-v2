<?php

namespace App\Http\Controllers\Reports;

use ZipArchive;
use Illuminate\Support\Str;
use App\Services\OfficeService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Madnest\Madzipper\Facades\Madzipper;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


final class CSCPlantillaReportController extends Controller
{
    public const EMPTY = ',';

    public function export(int $id, string $type)
    {
        $report = DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->where(['Id' => $id])->first();
        $id = $report->Id;
        $year = $report->Year;
        $positions = DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
                        ->join('EPims.dbo.Plantilla_Reports_Details', 'plantilla_positions.pp_id', '=', 'Plantilla_Reports_Details.pp_id')
                        ->leftJoin('DTRPayroll.dbo.Employees', 'EPims.dbo.Plantilla_Reports_Details.employee_id', '=', 'DTRPayroll.dbo.Employees.Employee_id')
                        ->join('EPims.dbo.Positions', 'plantilla_positions.PosCode', '=', 'Positions.PosCode')
                        ->join('EPims.dbo.Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
                        ->leftJoin('EPims.dbo.Sections', 'plantilla_positions.section_id', '=', 'Sections.section_id')
                        ->leftJoin('EPims.dbo.Divisions', 'plantilla_positions.division_id', '=', 'Divisions.division_id')
                        ->select(
                            'plantilla_positions.item_no', 'plantilla_positions.area_code', 'plantilla_positions.area_type', 'plantilla_positions.area_level', 'plantilla_positions.sg_no', 'plantilla_positions.office_code', 'Offices.office_name', 'Offices.office_short_name',
                            'Plantilla_Reports_Details.employee_id', 'Positions.*',
                            'Plantilla_Reports_Details.plantilla_id', 'Plantilla_Reports_Details.old_item_no', 'Plantilla_Reports_Details.item_no', 'Plantilla_Reports_Details.pp_id',
                            'Plantilla_Reports_Details.sg_no', 'Plantilla_Reports_Details.step_no', 'Plantilla_Reports_Details.salary_amount', 'Plantilla_Reports_Details.salary_amount_yearly', 'Plantilla_Reports_Details.sg_no_previous', 'Plantilla_Reports_Details.step_no_previous', 'Plantilla_Reports_Details.salary_amount_previous',
                            'Plantilla_Reports_Details.salary_amount_previous_yearly', 'Plantilla_Reports_Details.employee_id', 'Plantilla_Reports_Details.date_original_appointment', 'Plantilla_Reports_Details.date_last_promotion', 'Plantilla_Reports_Details.status', 'Plantilla_Reports_Details.year',
                            DB::raw("CONCAT(FirstName, ', ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"),
                            'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate',
                            'Divisions.division_id', 'Divisions.division_name',
                            'Sections.section_id', 'Sections.section_name'
                        )->where('year', $year)->where('R_Id', $id)->get()->groupBy('office_name');

        if($type === 'DBM') {
            $zipName = $report->Plantilla_type . '_' . $report->Year . ".zip";
            $zipper = Madzipper::make(storage_path() . "\\files\\" . $zipName);
            $sectionCount = 0;
            $startingIndex = 17;
            foreach($positions as $records) {
                $data = $records->groupBy(fn ($record) => $record->division_name ?? $record->section_name ?? 'OFFICE_' . $record->office_name);

                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path() . '\\DBM_PLANTILLA.xlsx');
                $worksheet = $spreadsheet->getActiveSheet();
                $worksheet->setTitle($year);
                $worksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                foreach($data as $officeOrDivision => $positions) {
                    $worksheet->setCellValue('C3', 'PLANTILLA OF LGU PERSONNEL FY ' . $year);
                    $worksheet->setCellValue('C7', $positions->first()->office_name);
                    if( Str::contains($officeOrDivision, 'OFFICE_') ) {
                        foreach($positions as $record) {
                            $worksheet->insertNewRowBefore($startingIndex);

                            if(empty($record->FirstName)) {
                                $record->fullname = 'VACANT';
                            }

                            $worksheet->setCellValue('A' . $startingIndex, $record->old_item_no);
                            $worksheet->setCellValue('B' . $startingIndex, $record->item_no);
                            $worksheet->setCellValue('C' . $startingIndex, $record->Description);
                            $worksheet->getStyle('C' . $startingIndex)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT)->setWrapText(true);
                            $worksheet->setCellValue('D' . $startingIndex, $record->fullname);
                            $worksheet->getStyle('D' . $startingIndex)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT)->setWrapText(true);
                            $worksheet->setCellValue('E' . $startingIndex, $record->sg_no)->getStyle('E' . $startingIndex)->applyFromArray([
                                'borders' => [
                                    'outline' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    ],
                                ],
                            ]);;
                            $worksheet->setCellValue('F' . $startingIndex, $record->step_no);
                            $worksheet->setCellValue('G' . $startingIndex, $record->salary_amount_previous_yearly);
                            $worksheet->setCellValue('H' . $startingIndex, $record->sg_no)->getStyle('H' . $startingIndex)->applyFromArray([
                                'borders' => [
                                    'outline' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    ],
                                ],
                            ]);;
                            $worksheet->setCellValue('I' . $startingIndex, $record->step_no);
                            $worksheet->setCellValue('J' . $startingIndex, $record->salary_amount_yearly);
                            $worksheet->setCellValue('M' . $startingIndex, $record->salary_amount_yearly - $record->salary_amount_previous_yearly);

                            $startingIndex++;
                        }
                    } else if( Str::contains(Str::upper($officeOrDivision), 'SECTION')) {
                        $sectionCount++;
                        $worksheet->insertNewRowBefore($startingIndex);
                        $firstCell = "B" . $startingIndex;
                        $secondCell = ":M" . $startingIndex;
                        $worksheet->mergecells($firstCell . $secondCell)->getCell("B" . $startingIndex)->setValue('   ' . $officeOrDivision);
                        $worksheet->getStyle('B' . $startingIndex )->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                        $worksheet->getStyle('B' . $startingIndex)->getFont()->setBold(true);

                        foreach($positions as $record) {
                            $startingIndex++;

                            if(empty($record->FirstName)) {
                                $record->fullname = 'VACANT';
                            }

                            $worksheet->insertNewRowBefore($startingIndex);

                            $worksheet->setCellValue('A' . $startingIndex, $record->old_item_no);
                            $worksheet->setCellValue('B' . $startingIndex, $record->item_no);
                            $worksheet->setCellValue('C' . $startingIndex, $record->Description);
                            $worksheet->setCellValue('D' . $startingIndex, $record->fullname);
                            $worksheet->setCellValue('E' . $startingIndex, $record->sg_no)->getStyle('E' . $startingIndex)->applyFromArray([
                                'borders' => [
                                    'outline' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    ],
                                ],
                            ]);
                            $worksheet->setCellValue('F' . $startingIndex, $record->step_no);
                            $worksheet->setCellValue('G' . $startingIndex, $record->salary_amount_previous_yearly);
                            $worksheet->setCellValue('H' . $startingIndex, $record->sg_no)->getStyle('H' . $startingIndex)->applyFromArray([
                                'borders' => [
                                    'outline' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    ],
                                ],
                            ]);
                            $worksheet->setCellValue('I' . $startingIndex, $record->step_no);
                            $worksheet->setCellValue('J' . $startingIndex, $record->salary_amount_yearly);
                            $worksheet->setCellValue('M' . $startingIndex, $record->salary_amount_yearly - $record->salary_amount_previous_yearly);
                        }
                    } else { // Division
                        $sectionCount++;

                        $worksheet->insertNewRowBefore($startingIndex);
                        $firstCell = "B" . $startingIndex;
                        $secondCell = ":M" . $startingIndex;
                        $worksheet->mergecells($firstCell . $secondCell)->getCell("B" . $startingIndex)->setValue('   ' . $officeOrDivision);
                        $worksheet->getStyle('B' . $startingIndex )->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                        $worksheet->getStyle('B' . $startingIndex)->getFont()->setBold(true);

                        foreach($positions as $record) {
                            $startingIndex++;

                            if(empty($record->FirstName)) {
                                $record->fullname = 'VACANT';
                            }

                            $worksheet->insertNewRowBefore($startingIndex);

                            $worksheet->setCellValue('A' . $startingIndex, $record->old_item_no);
                            $worksheet->setCellValue('B' . $startingIndex, $record->item_no);
                            $worksheet->setCellValue('C' . $startingIndex, $record->Description);
                            $worksheet->setCellValue('D' . $startingIndex, $record->fullname);
                            $worksheet->setCellValue('E' . $startingIndex, $record->sg_no)->getStyle('E' . $startingIndex)->applyFromArray([
                                'borders' => [
                                    'outline' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    ],
                                ],
                            ]);
                            $worksheet->setCellValue('F' . $startingIndex, $record->step_no);
                            $worksheet->setCellValue('G' . $startingIndex, $record->salary_amount_previous_yearly);
                            $worksheet->setCellValue('H' . $startingIndex, $record->sg_no)->getStyle('H' . $startingIndex)->applyFromArray([
                                'borders' => [
                                    'outline' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    ],
                                ],
                            ]);
                            $worksheet->setCellValue('I' . $startingIndex, $record->step_no);
                            $worksheet->setCellValue('J' . $startingIndex, $record->salary_amount_yearly);
                            $worksheet->setCellValue('M' . $startingIndex, $record->salary_amount_yearly - $record->salary_amount_previous_yearly);
                        }
                    }
                }

                $previousRange = "G17" . ":" . "G" . ($startingIndex + $sectionCount);
                $currentRange = "J17" . ":" . "J" . ($startingIndex + $sectionCount);
                $increaseAndDecreaseRange = "M17" . ":" . "M" . ($startingIndex + $sectionCount);

                $worksheet->setCellValue('G' . ($startingIndex + $sectionCount + 1), "=SUM(" . $previousRange . ")");
                $worksheet->setCellValue('J' . ($startingIndex + $sectionCount + 1), "=SUM(" . $currentRange . ")");
                $worksheet->setCellValue('M' . ($startingIndex + $sectionCount + 1), "=SUM(" . $increaseAndDecreaseRange . ")");

                $startingIndex = 17;
                $sectionCount = 0;



                $writer = new Xlsx($spreadsheet);
                $writer = IOFactory::createWriter($spreadsheet, 'Xls');
                $extension = '.xls';
                $fileName =  $data->first()->first()->office_name . $extension;
                $destination = storage_path() . '\\files\\';
                $writer->save($destination . $fileName);
                $zipper->add($destination . $fileName);
            }
            $zipper->close();
            $files = storage_path() . "\\files\\" . $zipName;
        } else if($type === 'CSC') {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path() . '\\CSC_PLANTILLA.xlsx');

            $records = $positions->chunk(11);
            $sheetIndex = 1;
            $startingIndex = 15;
            foreach ($records as $record) {
                foreach ($record as $pos) {
                    $pos = $pos->chunk(11);
                    foreach($pos as $p) {
                        $sheetPageTitle = $pos->first()->first()->office_short_name ?? $pos->first()->first()->office_code;
                        $clonedWorksheet = clone $spreadsheet->getSheetByName('BLANK_TEMPLATE');
                        $clonedWorksheet->setTitle($sheetPageTitle . '(' . $sheetIndex . ')');
                        $spreadsheet->addSheet($clonedWorksheet);
                        $worksheet = $spreadsheet->getSheetByName($sheetPageTitle . '(' . $sheetIndex . ')');
                        $worksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
                        $worksheet->setCellValue('A4', "For the Fiscal Year {$year}");
                        $worksheet->setCellValue('A7', "(1) Department : {$pos->first()->first()->office_name}");
                        $worksheet->setCellValue('A26', "(19) Total Number of Personnel Items: " . $p->count());

                        $worksheet->setCellValue('K34', date('m/d/Y'));

                        $worksheet->setCellValue('Q34', 'ALEXANDER T. PIMENTEL');

                        $worksheet->setCellValue('A34', 'ACE R. ORCULLO');
                        foreach($p as $position) {
                            $worksheet->setCellValue('A' . $startingIndex, $position->item_no);
                            $worksheet->setCellValue('F' . $startingIndex, $position->Description);
                            $worksheet->setCellValue('G' . $startingIndex, $position->sg_no);
                            $worksheet->setCellValue('N' . $startingIndex, $position->area_type);
                            $worksheet->setCellValue('H' . $startingIndex, $position->salary_amount_previous_yearly);
                            $worksheet->setCellValue('I' . $startingIndex, $position->salary_amount_previous);
                            $worksheet->setCellValue('J' . $startingIndex, $position->salary_amount);
                            $worksheet->setCellValue('K' . $startingIndex, $position->salary_amount_yearly);
                            $worksheet->setCellValue('L' . $startingIndex, $position->step_no ?? 1);
                            $worksheet->setCellValue('M' . $startingIndex, $position->area_code ?? '');
                            $worksheet->setCellValue('O' . $startingIndex, $position->area_level ?? '');
                            $worksheet->setCellValue('P' . $startingIndex, $position->LastName ?? '');
                            $worksheet->setCellValue('Q' . $startingIndex, $position->FirstName ?? '');
                            $worksheet->setCellValue('R' . $startingIndex, $position->MiddleName ?? '');
                            $worksheet->setCellValue('S' . $startingIndex, $position->Birthdate ?? '');
                            $worksheet->setCellValue('Z' . $startingIndex, $position->date_original_appointment);
                            $worksheet->setCellValue('AA' . $startingIndex, $position->date_last_promotion);
                            $worksheet->setCellValue('AB' . $startingIndex, Str::upper($position->status));

                            if (trim($position->fullname) === self::EMPTY) {
                                $worksheet->setCellValue('M' . $startingIndex, $position->area_code)->getStyle('P' . $startingIndex)->applyFromArray([
                                    'fill' => [
                                        'fillType' => Fill::FILL_SOLID,
                                        'startColor' => [
                                            'rgb' => 'FFFF00',
                                        ],
                                    ],
                                ])->getFont()->setBold(true);
                                $worksheet->setCellValue('P' . $startingIndex, 'VACANT');
                            } else {
                                $worksheet->setCellValue('M' . $startingIndex, $position->area_code)->getStyle('P' . $startingIndex)->applyFromArray([
                                    'fill' => [
                                        'fillType' => Fill::FILL_SOLID,
                                        'startColor' => [
                                            'rgb' => '#FFFFFF',
                                        ],
                                    ],
                                ])->getFont()->setBold(true);
                            }
                            $startingIndex++;
                        }
                        $startingIndex = 15;
                        $sheetIndex++;
                    }
                }
            }
            // Remove the Blank Template
            $spreadsheet->removeSheetByIndex(0);

            $writer = new Xlsx($spreadsheet);
            $writer = IOFactory::createWriter($spreadsheet, 'Xls');
            $extension = '.xls';
            $fileName = 'GENERATED_PLANTILLA_CSC' . time() . $extension;
            $destination = storage_path() . '\\files\\';
            $writer->save($destination . $fileName);
            $files = str_replace('\\', '||', $destination . $fileName);
        }

        return response()->json(['success' => true, 'fileName' => str_replace("\\", "||", $files)]);
    }

    public function download(string $fileName)
    {
        $fileName = str_replace('||', '\\', $fileName);
        return response()->download($fileName);
    }
}
