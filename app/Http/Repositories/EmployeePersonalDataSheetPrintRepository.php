<?php
namespace App\Http\Repositories;
use Error;
use App\Employee;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;
use PhpOffice\PhpSpreadsheet\RichText\RichText as RichText;

class EmployeePersonalDataSheetPrintRepository
{
    protected $sheet;
    protected $reader;
    protected $spreadsheet;
    protected $writer;

    public const RELATION      = 'relation';
    public const RELATION_TYPE = 'relation_type';
    public const ONE_TO_ONE    = 'one_to_one';
    public const ONE_TO_MANY   = 'one_to_many';
    public const OPTIONS       = 'options';

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
        return $this;
    }
    

    /**
     * Checking if there's an active spreadsheet this will throw an error if user forgot to assign a base template.
     * @return boolean
     */
    private function hasActiveSheet()
    {
        if(is_null($this->sheet)) {
            throw new Error('Can\'t find any active sheet please set an base file template first.');
        }
    }

    /**
     * Checker if relation name passed is available in model.
     *
     * @param string $relationName
     * @param Model $model
     * @return boolean
     */
    private function isRelationAvailable(string $relationName, Model $model)
    {
        [$relations] = Arr::divide($model->getRelations());

        if(!in_array(trim($relationName), $relations)) {
            throw new Error("Can't find {$relationName} relation in " . get_class($model) . ' model.');    
        }

        return true;
    }

    /**
     * Check if user declare a relation key in array
     *
     * @param array $data
     * @return boolean
     */
    private function hasRelationKey(array $data = []) :bool
    {
        return array_key_exists(self::RELATION, $data);
    }

    public function writeImage(string $stylesheet = 'C4', Model $model)
    {
        $path = storage_path() . '\\app\\public\\employee_images\\' . $model->employee_id . '_' . strtolower(ucfirst(($model->lastname))) . '.jpg';
        $this->sheet = $this->spreadsheet->setActiveSheetIndexByName($stylesheet);
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setCoordinates('J50');
        $drawing->setPath($path);
        $drawing->setHeight(250);
        $drawing->setWidth(180);
        $drawing->setOffsetX(110);
        $drawing->setOffsetY(2);
        $drawing->setWorksheet($this->sheet);

        return $this;
    }
    
    /**
     * Writing value by cell
     * @param string $cell
     * @param string $value
     * @return void
     */
    public function write(string $cell, $value, string $stylesheet = 'C1')
    {
        $this->sheet = $this->spreadsheet->setActiveSheetIndexByName($stylesheet);
        
        $this->hasActiveSheet();
        
        $this->sheet->setCellValue($cell, $value);
        $this->writer = new Writer($this->spreadsheet);
        return $this;
    }


    public function writeAll(array $data = [], Employee $model, string $stylesheet = 'C1')
    {
        $this->sheet = $this->spreadsheet->setActiveSheetIndexByName($stylesheet);

        $this->hasActiveSheet();

        if($this->hasRelationKey($data)) {
            if($this->isRelationAvailable($data[self::RELATION], $model) && trim($data[self::RELATION_TYPE]) === self::ONE_TO_ONE) {
                $this->writerForOnetoOneCellValue($data, $model);
            } else {
                $this->writerForOneToManyCellValue($data, $model);
            }
        } else {
            $this->writerForNoRelationCellValue($data, $model);
        }
        $this->writer = new Writer($this->spreadsheet);
        return $this;
    }

    private function writerForOnetoOneCellValue(array $data = [], Model $model)
    {
        $relationName = $data[self::RELATION];
        foreach($data['cells'] as $cell => $columnNameInTable) {
            $this->sheet->setCellValue($cell, $model->$relationName->$columnNameInTable);
        }
    }

    private function isMaxRowLengthInvalid(array $data = [])
    {
        if(count($data['cells']['from']) > $data['options']['max_row']) {
            throw new Error( "from => ['" . implode("','", $data['cells']['from']) . "'] cells must be not be greater than max row.");
        }
    }

    private function isMaxColumnLengthInvalid(array $data = [])
    {
        if(count($data['cells']['to']) > $data['options']['max_column']) {
            throw new Error( "to => ['" . implode("','", $data['cells']['to']) . "'] cells must be not be greater than max column.");
        }
    }

    private function writerForOneToManyCellValue(array $data = [], Model $model)
    {
        // $this->isMaxRowLengthInvalid($data);
        // $this->isMaxColumnLengthInvalid($data);

        // Get the starting
        $startNumber = $data['cells']['from'];

        $relationName = $data[self::RELATION];
        // $model->$relationName->count() > $data['options']['max_column']

        foreach($model->$relationName as $relation) {
                foreach($data['cells']['columns'] as $key => $keyValue) {
                    $cell = $data['cells']['letters'][$key] . $startNumber;
                    $this->sheet->setCellValue($cell, $relation->$keyValue);
                }
            $startNumber++;
        }

    }

    /**
     * Writer for PDS section does not have a relation.
     *
     * @param array $data
     * @param Model $model
     * @return void
     */
    private function writerForNoRelationCellValue(array $data = [], Model $model)
    {
        foreach($data as $cell => $column) {
            // if($column === 'sex') {
                $objRichText = new RichText();
                $checkbox = $objRichText->createTextRun('R');
                $checkbox->getFont()->setName('Wingdings 2');
                // $model->$column = '☑ Male ☐ Female';
            // }

            $this->sheet->setCellValue($cell, $model->$column);
        }
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
