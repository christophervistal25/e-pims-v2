<?php
namespace App\Http\Repositories;
use App\Employee;
use Error;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

class EmployeePersonalDataSheetPrintRepository
{
    protected $sheet;
    protected $reader;
    protected $spreadsheet;
    protected $writer;

    public function __construct()
    {
        $this->reader = new Reader();
    }

    /**
     * Setting a base template with blank fields.
     * @param string $path
     * @return void
     */
    public function setBaseFileTemplate(string $path)
    {
        $this->spreadsheet = $this->reader->load($path);
        $this->sheet = $this->spreadsheet->getActiveSheet();
    }

    /**
     * Checking if there's an active spreadsheet this will throw an error if user forgot to assign a base template.
     * @return boolean
     */
    private function hasActiveSheet()
    {
        if(is_null($this->sheet)) {
            throw new Error('No active sheet please set an base file template first.');
        }
    }

    /**
     * Writing value by cell
     * @param string $cell
     * @param string $value
     * @return void
     */
    public function write(string $cell, $value)
    {
        $this->hasActiveSheet();
        $this->sheet->setCellValue($cell, $value);
        $this->writer = new Writer($this->spreadsheet);
        return $this;
    }

    public function writeAll(array $cells = [], Employee $model)
    {
        $this->hasActiveSheet();
            $objRichText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
        
        // checked checkbox
        foreach($cells as $cell => $column) {
            // $checkbox = $objRichText->createTextRun('R');
            // $checkbox->getFont()->setName('Wingdings 2');
            // $this->sheet->getCell($cell)->setValue($checkbox);
        }

        $this->writer = new Writer($this->spreadsheet);
        return $this;
    }

    /**
     * Generated new PDS file with employee information 
     * @param string $location
     * @param string $fileName
     * @return void
     */
    public function save(string $location, string $fileName = null)
    {
        return $this->writer->save($location . $fileName);
    }

}
