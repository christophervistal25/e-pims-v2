<?php

namespace App\Http\Controllers\Reports;

use App\Office;
use App\PlantillaPosition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DBMPlantillaReportController extends Controller
{
    public const ROMAN_NUMERALS = [
        'I', 'II', 'III','IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI',
        'XII', 'XIII',
    ];

    public function generate(string $office, string $year)
    {
        $officeData = Office::where('office_code', $office)->first();
        $positions = PlantillaPosition::with(['plantillas', 'position', 'plantillas.Employee', 'plantilla_history', 'plantilla_history.Employee', 'salary_grade' => function ($query) use ($year) {
            $query->where('sg_year', $year)->orWhere('sg_year', $year - 1);
        }])->where('office_code', $office)->get();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path().'\\DBM_PLANTILLA.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

        $previousYear = $year - 1;

        $worksheet->getCell('C3')->setValue(Str::upper("PLANTILLA OF LGU PERSONNEL FY " . $year));
        $worksheet->getCell('C7')->setValue(Str::upper($officeData->office_name));
        $worksheet->getCell('G13')->setValue("FY {$previousYear} Amount (LBC 121) 01-24-" . $previousYear);
        $worksheet->getCell('J13')->setValue("FY {$year} Amount");

        $lastIndex = 0;
        foreach($positions as $index => $position) {
            $previousSalamaryAmount = 0;
            $currentSalaryAmount =  0;
            $range = $index + 19;
            $lastIndex = $range;

            $employee = 'Vacant';

            $description = explode(' ', $position?->position->Description);
            $stringLastPart = array_pop($description);
            if(in_array($stringLastPart, self::ROMAN_NUMERALS)) {
                $positionTitle = Str::title(implode(' ', $description)) . ' ' . $stringLastPart;
            } else {
                $positionTitle = $position?->position->Description;
            }

            if($position->plantillas) {
                $employee = Str::title($position->plantillas->employee->FirstName) .  ' ' . Str::title($position->plantillas->employee->MiddleName[0] ?? '') . '. ' . Str::title($position->plantillas->employee->LastName);
            }

            $worksheet->insertNewRowBefore($range);
            $worksheet->getCell('A' . $range - 1)->setValue($position->item_no);
            $worksheet->getCell('B' . $range - 1)->setValue($position->plantillas?->old_item_no);
            $worksheet->getCell('C' . $range - 1)->setValue($positionTitle);
            $worksheet->getCell('D' . $range - 1)->setValue($employee);
            $worksheet->getCell('E' . $range - 1)->setValue($position->sg_no);
            $worksheet->getCell('F' . $range - 1)->setValue($position->plantillas?->step_no ?? 1);

            if($position->plantillas) {
                $step = 'sg_step' . $position->plantillas->step_no;
                $previousSalamaryAmount = $position->salary_grade?->where('sg_year', $previousYear)?->first()->$step * 12;
                $worksheet->getCell('G' . $range - 1)->setValue($previousSalamaryAmount);
            } else {
                $previousSalamaryAmount = $position->salary_grade?->where('sg_year', $previousYear)?->first()->sg_step1;
                $worksheet->getCell('G' . $range - 1)->setValue($previousSalamaryAmount * 12);
            }

            $worksheet->getCell('H' . $range - 1)->setValue($position->sg_no);
            $worksheet->getCell('I' . $range - 1)->setValue($position->plantillas?->step_no ?? 1);

            if($position->plantillas) {
                $step = 'sg_step' . $position->plantillas->step_no;
                $currentSalaryAmount = $position->salary_grade?->where('sg_year', $year)?->first()->$step * 12;
                $worksheet->getCell('J' . $range - 1)->setValue($currentSalaryAmount);
            } else {
                $currentSalaryAmount = $position->salary_grade?->where('sg_year', $year)?->first()->sg_step1;
                $worksheet->getCell('J' . $range - 1)->setValue($currentSalaryAmount * 12);
            }

            $currentRange = ($range) - 1;
            $worksheet->getCell('M' . $range - 1)->setValue("=J{$currentRange}-G{$currentRange}");
        }
        
        $firstIndex = 18;
        $lastIndex = $lastIndex - 1;;

        $worksheet->getCell('G' . $lastIndex + 2)->setValue("=SUM(G{$firstIndex}:G{$lastIndex})");
        $worksheet->getCell('J' . $lastIndex + 2)->setValue("=SUM(J{$firstIndex}:J{$lastIndex})");
        $worksheet->getCell('M' . $lastIndex + 2)->setValue("=SUM(M{$firstIndex}:M{$lastIndex})");
        $worksheet->getPageSetup()->setFitToWidth(1);

        
        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        
        $destination = storage_path().'\\files\\';
        $writer->save($destination . 'DBM_PLANTILLA_' . $officeData->office_short_name . '_' . $year . '.xls');
        return response()->json(['filename' =>  'DBM_PLANTILLA_' . $officeData->office_short_name . '_' . $year . '.xls', 'success' => true]);
    }

    public function download(string $fileName)
    {
        $file = storage_path().'\\files\\' . $fileName;
        return response()->download($file);
    }

}
