<?php

namespace App\Http\Controllers;

use App\Contracts\IDownloadType;
use App\Employee;
use App\service_record as ServiceRecord;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PrintServiceRecordController extends Controller implements IDownloadType
{
    private function generate(string $employeeID)
    {
        $inputFileName = public_path().'\\SERVICE_RECORD.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);

        $TITLE = new RichText();
        $spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setWrapText(true);
        $TITLE->createTextRun('S E R V I C E  R E C O R D')->getFont()->setName('Times New Roman')->setSize(15)->setBold(true);
        $spreadsheet->getActiveSheet()->getCell('A3')->setValue($TITLE);

        $employee = Employee::exclude(['ImagePhoto'])->find($employeeID);

        $spreadsheet->getActiveSheet()->setCellValue('B6', $employee->LastName);
        $spreadsheet->getActiveSheet()->setCellValue('C6', $employee->FirstName);
        $spreadsheet->getActiveSheet()->setCellValue('D6', $employee->MiddleName[0] ?? '');
        $spreadsheet->getActiveSheet()->setCellValue('C9', date('F d, Y', strtotime($employee->Birthdate)));
        $spreadsheet->getActiveSheet()->setCellValue('C12', $employee->BirthPlace);
        $spreadsheet->getActiveSheet()->setCellValue('C70', date('F d, Y'));

        $row = 22;
        ServiceRecord::with(['position', 'office'])->where('employee_id', $employeeID)->orderBy('service_to_date', 'DESC')
            ->get()
            ->each(function ($record) use (&$spreadsheet, &$row) {
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A'.$row, $record->service_from_date);
                $sheet->setCellValue('B'.$row, $record->service_to_date ?? 'PRESENT');
                $sheet->setCellValue('C'.$row, Str::upper($record->position?->Description));
                $sheet->setCellValue('D'.$row, $record->status);
                $sheet->setCellValue('E'.$row, number_format($record->salary, 2, '.', ','));
                $sheet->setCellValue('F'.$row, $record->office->office_name);
                $sheet->setCellValue('G'.$row, $record->leave_without_pay ?? 0);
                $sheet->setCellValue('H'.$row, $record->separation_date);
                $sheet->setCellValue('I'.$row, $record->separation_cause);
                $row++;
            });

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $fileName = $employeeID.'_'.'SERVICE_RECORD';
        $extension = '.xls';
        $generatedFile = storage_path().'\\files\\'.$fileName.$extension;
        $writer->save($generatedFile);

        return $fileName.$extension;
    }

    public function pdf(string $employeeID)
    {
        $fileName = $this->generate($employeeID);

        return response()->json(['success' => true, 'file' => $fileName]);
    }

    public function excel(string $employeeID)
    {
        $this->generate($employeeID);
    }

    public function download(string $employeeID, string $type)
    {
        return response()->download(storage_path().'\\files\\'.$employeeID.'_'.'SERVICE_RECORD.'.$type);
    }
}
