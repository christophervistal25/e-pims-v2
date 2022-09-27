<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Office;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DBMPlantillaReportController extends Controller
{
    public const ROMAN_NUMERALS = [
        'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI',
        'XII', 'XIII',
    ];

    public function __construct()
    {
        $this->plantillaPositionService = app()->make('App\Services\PlantillaPositionService');
    }

    public function setHeader(array $data, &$worksheet)
    {
        foreach ($data as $cell => $value) {
        }
    }

    public function generate(string $office, string $year)
    {
        $officeData = Office::where('office_code', $office)->first();

        $currentYear = $year;

        $previousYear = $year - 1;

        $positions = $this->plantillaPositionService->positionsWithPlantillasByOfficeAndYear($office, $year)
                    ->groupBy(function ($record) {
                        return $record?->office_code.' - '.$record?->plantillas?->division?->division_name;
                    })->sortKeys();

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path().'\\DBM_PLANTILLA.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

        // $this->setHeader([
        //     'C3' => Str::upper('PLANTILLA OF LGU PERSONNEL FY' . $currentYear),
        //     'C7' => Str::upper($officeData->office_name),
        //     'G13' => "FY {$previousYear} Amount (LBC 121) 01-24-{$previousYear}",
        //     'J13' => "FY {$currentYear} Amount",
        // ], $worksheet);

        $worksheet->getCell('C3')->setValue(Str::upper('PLANTILLA OF LGU PERSONNEL FY '.$currentYear));
        $worksheet->getCell('C7')->setValue(Str::upper($officeData->office_name));
        $worksheet->getCell('G13')->setValue("FY {$previousYear} Amount (LBC 121) 01-24-".$previousYear);
        $worksheet->getCell('J13')->setValue("FY {$currentYear} Amount");

        $lastIndex = 0;
        $index = 18;
        foreach ($positions as $officeAndDivision => $p) {
            [$office, $division] = explode(' - ', $officeAndDivision);

            foreach ($p as $position) {
                $previousSalamaryAmount = 0;
                $currentSalaryAmount = 0;
                $range = $index;
                $lastIndex = $range;
                $employee = 'Vacant';

                $description = explode(' ', $position?->position->Description);
                $stringLastPart = array_pop($description);

                if (in_array($stringLastPart, self::ROMAN_NUMERALS)) {
                    $positionTitle = Str::title(implode(' ', $description)).' '.$stringLastPart;
                } else {
                    $positionTitle = $position?->position->Description;
                }

                if ($position->plantillas) {
                    $employee = Str::title($position->plantillas->employee->FirstName).' '.Str::title($position->plantillas->employee->MiddleName[0] ?? '').'. '.Str::title($position->plantillas->employee->LastName);
                }

                $worksheet->insertNewRowBefore($range);

                if ($division) {
                    // $firstCell = 'A'.$range - 1;
                    // $secondCell = ':M'.$range - 1;
                    $worksheet->getCell('C'.$range - 1)->setValue(Str::upper($division));
                    $worksheet->getStyle('C'.$range - 1)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                    $worksheet->getStyle('C'.$range - 1)->getFont()->setBold(true);
                    $range = ++$index;
                    $lastIndex = $lastIndex + 1;
                    $worksheet->insertNewRowBefore($range);
                }

                $worksheet->getCell('A'.$range - 1)->setValue($position->item_no);
                $worksheet->getCell('B'.$range - 1)->setValue($position->plantillas?->old_item_no);
                $worksheet->getCell('C'.$range - 1)->setValue($positionTitle);
                $worksheet->getCell('D'.$range - 1)->setValue($employee);
                $worksheet->getCell('E'.$range - 1)->setValue($position->sg_no);
                $worksheet->getCell('F'.$range - 1)->setValue($position->plantillas?->step_no ?? 1);

                if ($position->plantillas) {
                    $step = 'sg_step'.$position->plantillas->step_no;
                    $previousSalamaryAmount = $position->salary_grade?->where('sg_year', $previousYear)?->first()->$step * 12;
                    $worksheet->getCell('G'.$range - 1)->setValue($previousSalamaryAmount);
                } else {
                    $previousSalamaryAmount = $position->salary_grade?->where('sg_year', $previousYear)?->first()->sg_step1;
                    $worksheet->getCell('G'.$range - 1)->setValue($previousSalamaryAmount * 12);
                }

                $worksheet->getCell('H'.$range - 1)->setValue($position->sg_no);
                $worksheet->getCell('I'.$range - 1)->setValue($position->plantillas?->step_no ?? 1);

                if ($position->plantillas) {
                    $step = 'sg_step'.$position->plantillas->step_no;
                    $currentSalaryAmount = $position->salary_grade?->where('sg_year', $year)?->first()->$step * 12;
                    $worksheet->getCell('J'.$range - 1)->setValue($currentSalaryAmount);
                } else {
                    $currentSalaryAmount = $position->salary_grade?->where('sg_year', $year)?->first()->sg_step1;
                    $worksheet->getCell('J'.$range - 1)->setValue($currentSalaryAmount * 12);
                }

                $currentRange = ($range) - 1;
                $worksheet->getCell('M'.$range - 1)->setValue("=J{$currentRange}-G{$currentRange}");
                $index++;
            }
        }

        // Remove the last row

        $firstIndex = 17;
        $lastIndex = $lastIndex - 1;

        $spreadsheet->getActiveSheet()->removeRow($index - 1);

        $worksheet->getCell('G'.$lastIndex + 1)->setValue("=SUM(G{$firstIndex}:G{$lastIndex})");
        $worksheet->getCell('J'.$lastIndex + 1)->setValue("=SUM(J{$firstIndex}:J{$lastIndex})");
        $worksheet->getCell('M'.$lastIndex + 1)->setValue("=SUM(M{$firstIndex}:M{$lastIndex})");
        $worksheet->getPageSetup()->setFitToWidth(1);
        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');

        $destination = storage_path().'\\files\\';
        $writer->save($destination.'DBM_PLANTILLA_'.$officeData->office_short_name.'_'.$year.'.xls');

        return response()->json(['filename' => 'DBM_PLANTILLA_'.$officeData->office_short_name.'_'.$year.'.xls', 'success' => true]);
    }

    public function download(string $fileName)
    {
        $file = storage_path().'\\files\\'.$fileName;

        return response()->download($file);
    }
}
