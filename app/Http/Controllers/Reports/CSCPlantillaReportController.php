<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Office;
use App\PlantillaPosition;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CSCPlantillaReportController extends Controller
{
    public function index()
    {
        $offices = Office::get();
        $years = range(2016, date('Y', strtotime('+1 year')));
        rsort($years);

        return view('reports.plantilla', [
            'offices' => $offices,
            'years' => $years,
            'class' => 'mini-sidebar',
        ]);
    }

    public function generate(string $office, string $year)
    {
        $data = PlantillaPosition::with(['plantillas', 'position', 'plantillas.Employee', 'plantillas.division', 'plantilla_history', 'plantilla_history.Employee', 'salary_grade' => function ($query) use ($year) {
                    $query->where('sg_year', $year)->orWhere('sg_year', $year - 1);
                }]);
                
        if($office != '*') {
            return $data->where('office_code', $office)->get();
        }  else {
            return $data->get();
        }

    }

    public function exportAll(int $year)
    {
        $previousYear = $year - 1;
        $currentYear = $year;
    
        $positions = PlantillaPosition::with([
            'office',
            'plantillas',
            'position',
            'plantillas.Employee',
            'plantillas.division',
            'plantilla_history',
            'plantilla_history.Employee',
            'salary_grade' => function ($query) use ($currentYear, $previousYear) {
                $query->where('sg_year', $currentYear)->orWhere('sg_year', $previousYear);
            }])->get();

        $positions = $positions->groupBy(function ($position) {
            return $position->office->office_short_name;
        });
        
        $sheetIndex = 1;

        $currentSheetIndex = 0;
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path().'\\CSC_PLANTILLA.xlsx');
        $startingIndex = 15;

        foreach($positions as $office => $positionGroup) {
            $records = $positionGroup->chunk(11);

            foreach($records as $record) {
                    $clonedWorksheet = clone $spreadsheet->getSheetByName('BLANK_TEMPLATE');
                    $clonedWorksheet->setTitle($office.'('.$sheetIndex.')');
                    $spreadsheet->addSheet($clonedWorksheet);
                    $worksheet = $spreadsheet->getSheetByName($office.'('.$sheetIndex.')');
                    $worksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                    $worksheet->setCellValue('A4', "For the Fiscal Year {$year}");
                    $worksheet->setCellValue('A7', "(1) Department : {$positionGroup?->first()?->office?->office_name}");
                    $worksheet->setCellValue('A26', "(19) Total Number of Personnel Items: {$positionGroup->count()}");
                    $worksheet->setCellValue('K34', date('m/d/Y')); 
                    $worksheet->setCellValue('Q34', 'ALEXANDER T. PIMENTEL');
                    $worksheet->setCellValue('A34', 'ACE R. ORCULLO');

                    foreach($positionGroup as $position) {
                        if($position->plantilla_history->isEmpty()) {
                            $grades = $position->salary_grade->filter(fn ($grade) => $grade->sg_year == $year || $grade->sg_year == ($currentYear - 1))->toArray();
                            [$current, $previous] = array_values($grades);

                            $worksheet->setCellValue('A'.$startingIndex, $position->item_no);
                            $worksheet->setCellValue('F'.$startingIndex, $position->position?->Description);
                            $worksheet->setCellValue('G'.$startingIndex, $position->sg_no);
                            $worksheet->setCellValue('N'.$startingIndex, 'P');
                            $worksheet->setCellValue('H'.$startingIndex, $previous['sg_step1'] * 12);
                            $worksheet->setCellValue('I'.$startingIndex, $previous['sg_step1']);
                            $worksheet->setCellValue('J'.$startingIndex, $current['sg_step1']);
                            $worksheet->setCellValue('K'.$startingIndex, $current['sg_step1'] * 12);
                            $worksheet->setCellValue('L'.$startingIndex, 1);
                            $worksheet->setCellValue('O'.$startingIndex, $position->plantillas?->area_level);
                            $worksheet->setCellValue('M'.$startingIndex, 15)->getStyle('P'.$startingIndex)->applyFromArray([
                                'fill' => [
                                    'fillType' => Fill::FILL_SOLID,
                                    'startColor' => [
                                        'rgb' => 'FFFF00',
                                    ],
                                ],
                            ])->getFont()->setBold(true);

                            $spreadsheet->getSheetByName($position?->office?->office_short_name.'('.$sheetIndex.')');
                            $worksheet->setCellValue('P'.$startingIndex, 'Vacant');
                        } else {
                            $worksheet->setCellValue('A'.$startingIndex, $position->item_no);
                            $worksheet->setCellValue('F'.$startingIndex, $position->position?->Description);
                            $worksheet->setCellValue('G'.$startingIndex, $position->sg_no);
                            $worksheet->setCellValue('H'.$startingIndex, isset($position->plantilla_history[1]) ? $position->plantilla_history[1]?->salary_amount * 12 : '');
                            $worksheet->setCellValue('I'.$startingIndex, isset($position->plantilla_history[1]) ? $position->plantilla_history[1]->salary_amount : '');
                            $worksheet->setCellValue('J'.$startingIndex, $position->plantilla_history[0]?->salary_amount);
                            $worksheet->setCellValue('K'.$startingIndex, $position->plantilla_history[0]?->salary_amount * 12);
                            $worksheet->setCellValue('L'.$startingIndex, $position->plantilla_history[0]?->step_no);
                            $worksheet->setCellValue('M'.$startingIndex, is_null($position->plantilla_history[0]) ? ' ' : 15);
                            $worksheet->setCellValue('N'.$startingIndex, 'P');
                            $worksheet->setCellValue('O'.$startingIndex, $position->plantillas?->area_level);
                            $worksheet->setCellValue('P'.$startingIndex, is_null($position->plantillas) ? 'Vacant' : $position->plantillas?->Employee?->LastName);
                        }
                        $worksheet->setCellValue('Q'.$startingIndex, $position->plantillas?->Employee?->FirstName);
                        $worksheet->setCellValue('R'.$startingIndex, $position->plantillas?->Employee?->MiddleName);
                        $worksheet->setCellValue('S'.$startingIndex, is_null($position->plantillas) ? ' ' : date('m/d/Y', strtotime($position->plantillas?->Employee?->Birthdate)));

                        $worksheet->setCellValue('Z'.$startingIndex, is_null($position->plantillas) ? ' ' : date('m/d/Y', strtotime($position->plantillas?->date_original_appointment)));
                        $worksheet->setCellValue('AA'.$startingIndex, is_null($position->plantillas) ? ' ' : date('m/d/Y', strtotime($position->plantillas?->date_last_promotion)));
                        $worksheet->setCellValue('AB'.$startingIndex, $position->plantillas?->Employee?->Work_Status);
                        $startingIndex++;
                    }

                    $startingIndex = 15;
                    $sheetIndex++;
                    $currentSheetIndex++;
                }
            }

            // Remove the Blank Template
            $spreadsheet->removeSheetByIndex(0);

            $writer = new Xlsx($spreadsheet);
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $extension = '.xls';
            $fileName = 'GENERATED_PLANTILLA'.$extension;
            $destination = storage_path().'\\files\\';
            $writer->save($destination.$fileName);
            $files = str_replace('\\', '||', $destination.$fileName);

            return response()->json(['success' => true, 'fileName' => $files]);
    }

    public function export(string $office, string $year)
    {
        $officeData = Office::where('office_code', $office)->first();

        $positions = PlantillaPosition::with(['plantillas', 'position', 'plantillas.Employee', 'plantilla_history', 'plantilla_history.Employee', 'salary_grade:sg_no,sg_year,sg_step1'])
            ->where('office_code', $office)
            ->get();

        $records = $positions->chunk(11);
        $sheetIndex = 1;

        $currentSheetIndex = 0;
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path().'\\CSC_PLANTILLA.xlsx');
        $startingIndex = 15;

        foreach ($records as $index => $plantillaPositions) {
            $clonedWorksheet = clone $spreadsheet->getSheetByName('BLANK_TEMPLATE');
            $clonedWorksheet->setTitle($officeData->office_short_name.'('.$sheetIndex.')');
            $spreadsheet->addSheet($clonedWorksheet);
            $worksheet = $spreadsheet->getSheetByName($officeData->office_short_name.'('.$sheetIndex.')');
            $worksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

            $worksheet->setCellValue('A4', "For the Fiscal Year {$year}");
            $worksheet->setCellValue('A7', "(1) Department : {$officeData->office_name}");
            $worksheet->setCellValue('A26', "(19) Total Number of Personnel Items: {$plantillaPositions->count()}");
            $worksheet->setCellValue('K34', date('m/d/Y'));
            $worksheet->setCellValue('Q34', 'ALEXANDER T. PIMENTEL');
            $worksheet->setCellValue('A34', 'ACE R. ORCULLO');

            foreach ($plantillaPositions as $data) {
                if ($data->plantilla_history->isEmpty()) {
                    $grades = $data->salary_grade->filter(fn ($grade) => $grade->sg_year == $year || $grade->sg_year == ($year - 1))->toArray();
                    [$current, $previous] = array_values($grades);

                    $worksheet->setCellValue('A'.$startingIndex, $data->item_no);
                    $worksheet->setCellValue('F'.$startingIndex, $data->position?->Description);
                    $worksheet->setCellValue('G'.$startingIndex, $data->sg_no);
                    $worksheet->setCellValue('N'.$startingIndex, 'P');
                    $worksheet->setCellValue('H'.$startingIndex, $previous['sg_step1'] * 12);
                    $worksheet->setCellValue('I'.$startingIndex, $previous['sg_step1']);
                    $worksheet->setCellValue('J'.$startingIndex, $current['sg_step1']);
                    $worksheet->setCellValue('K'.$startingIndex, $current['sg_step1'] * 12);
                    $worksheet->setCellValue('L'.$startingIndex, 1);
                    $worksheet->setCellValue('O'.$startingIndex, $data->plantillas?->area_level);
                    $worksheet->setCellValue('M'.$startingIndex, 15);
                    $spreadsheet->getSheetByName($officeData->office_short_name.'('.$sheetIndex.')')->getStyle('P'.$startingIndex)->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'FFFF00',
                            ],
                        ],
                    ])->getFont()->setBold(true);
                    $worksheet->setCellValue('P'.$startingIndex, 'Vacant');
                } else {
                    $worksheet->setCellValue('A'.$startingIndex, $data->item_no);
                    $worksheet->setCellValue('F'.$startingIndex, $data->position?->Description);
                    $worksheet->setCellValue('G'.$startingIndex, $data->sg_no);
                    $worksheet->setCellValue('H'.$startingIndex, isset($data->plantilla_history[1]) ? $data->plantilla_history[1]?->salary_amount * 12 : '');
                    $worksheet->setCellValue('I'.$startingIndex, isset($data->plantilla_history[1]) ? $data->plantilla_history[1]->salary_amount : '');
                    $worksheet->setCellValue('J'.$startingIndex, $data->plantilla_history[0]?->salary_amount);
                    $worksheet->setCellValue('K'.$startingIndex, $data->plantilla_history[0]?->salary_amount * 12);
                    $worksheet->setCellValue('L'.$startingIndex, $data->plantilla_history[0]?->step_no);
                    $worksheet->setCellValue('M'.$startingIndex, is_null($data->plantilla_history[0]) ? ' ' : 15);
                    $worksheet->setCellValue('N'.$startingIndex, 'P');
                    $worksheet->setCellValue('O'.$startingIndex, $data->plantillas?->area_level);
                    $worksheet->setCellValue('P'.$startingIndex, is_null($data->plantillas) ? 'Vacant' : $data->plantillas?->Employee?->LastName);
                }

                $worksheet->setCellValue('Q'.$startingIndex, $data->plantillas?->Employee?->FirstName);
                $worksheet->setCellValue('R'.$startingIndex, $data->plantillas?->Employee?->MiddleName);
                $worksheet->setCellValue('S'.$startingIndex, is_null($data->plantillas) ? ' ' : date('m/d/Y', strtotime($data->plantillas?->Employee?->Birthdate)));

                $worksheet->setCellValue('Z'.$startingIndex, is_null($data->plantillas) ? ' ' : date('m/d/Y', strtotime($data->plantillas?->date_original_appointment)));
                $worksheet->setCellValue('AA'.$startingIndex, is_null($data->plantillas) ? ' ' : date('m/d/Y', strtotime($data->plantillas?->date_last_promotion)));
                $worksheet->setCellValue('AB'.$startingIndex, $data->plantillas?->Employee?->Work_Status);
                $startingIndex++;
            }
            $startingIndex = 15;
            $sheetIndex++;
            $currentSheetIndex++;
        }

        // Remove the Blank Template
        $spreadsheet->removeSheetByIndex(0);

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $extension = '.xls';
        $fileName = 'GENERATED_PLANTILLA'.$extension;
        $destination = storage_path().'\\files\\';
        $writer->save($destination.$fileName);
        $files = str_replace('\\', '||', $destination.$fileName);

        return response()->json(['success' => true, 'fileName' => $files]);
    }

    public function download(string $fileName)
    {
        $fileName = str_replace('||', '\\', $fileName);

        return response()->download($fileName);
    }
}
