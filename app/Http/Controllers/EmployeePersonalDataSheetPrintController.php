<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeIssuedID;
use App\EmployeeReference;
use App\Services\MSAccess;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\EmployeeInformation;
use App\EmployeeCivilService;
use App\EmployeeRelevantQuery;
use App\EmployeeVoluntaryWork;
use App\EmployeeSpouseChildren;
use App\EmployeeWorkExperience;
use App\EmployeeFamilyBackground;
use App\EmployeeOtherInformation;
use App\EmployeeTrainingAttained;
use App\EmployeeEducationalBackground;
use CreateEmployeeEducationalBackgroundsTable;

// use App\Http\Traits\PersonalDataSheetCellPrint;


class EmployeePersonalDataSheetPrintController extends Controller
{

    // use PersonalDataSheetCellPrint;
    public function __construct(MSAccess $database)
    {
        $this->database = new MSAccess();
    }

    private function insertEmployeeBasicInformation(Employee $employee)
    {
        $fieldsWithPostFix = [
            'residential_barangay',
            'residential_city',
            'residential_province',

            'permanent_barangay',
            'permanent_city',
            'permanent_province',
        ];

        $columns = implode(',', $employee->getFillable());

        $items = explode(',', $columns);
        
        $key = array_search('first_day_of_service', $items);

        unset($items[$key]);
        
        $values = "";
        

        foreach($items as $column) {
            
            if(Str::contains($column, 'first_day_of_service')) {
                continue;
            }

            if(in_array($column, $fieldsWithPostFix)) {
                $column .= '_text';
            }

            $data = ($employee->$column !== '*' ? $employee->$column : '');
            $values .=  "'" . ($data  ?? '') . "',";
        }

        $values = rtrim($values, ',');
        
        $sql = "INSERT INTO employees (" . implode(',', $items) . ") VALUES ($values)";

        $this->database->execute($sql);
    }

    private function oneToOneInsertion(array $data = [])
    {
        $model    = $data['model'];
        $relation = $data['relation'];
        $except   = $data['except'];
        $table    = $data['table'];
        $alias    = $data['alias'];
        $modelName = $data['model_name'];

        if(!is_null($model->$relation)) {
            // Get the relation information record.
            $record = Arr::except($model->$relation->toArray(), $except);


            // Seperate the keys and values of the employee relation record.
            [$columns, $values] = Arr::divide($record);

            foreach($alias as $currentColumn => $replace) {
                $index =  array_search($currentColumn, $columns);
                if($index) {
                    $columns[$index] = $replace;                
                }
            }
            
            // Format the columns
            $columns = implode(',', $columns);

            // Format the values
            $formattedValues = "";

            foreach($values as $value) {
                $data = ($value !== '*' ? $value : '');
                $formattedValues .=  "'" . ($data) . "',";
            }

            $formattedValues = rtrim($formattedValues, ',');
            

            // Insert into MS Access table.
            $this->database->execute("INSERT INTO $table ($columns) VALUES ($formattedValues)");
        } else {
            $columns = (new $modelName)->getFillable();

            
            foreach($alias as $currentColumn => $replace) {
                $index =  array_search($currentColumn, $columns);
                if($index) {
                    $columns[$index] = $replace;                
                }
            }

            foreach($columns as $index => $column) {
                if(in_array($column, $except)) {
                    unset($columns[$index]);
                }
            }

            $formattedValues = null;

            for($iteration = 0; $iteration<count($columns); $iteration++) {
                $formattedValues .= "' ',";
            }

            $formattedValues = rtrim($formattedValues, ',');

            $columns = implode(',', $columns);

            $this->database->execute("INSERT INTO $table ($columns) VALUES ($formattedValues)");
        }
        

    }

    private function oneToManyInsertion(array $data = [])
    {
        $model    = $data['model'];
        $relation = $data['relation'];
        $except   = $data['except'];
        $table    = $data['table'];
        $alias    = $data['alias'];
        $modelName = $data['model_name'];
        $max = $data['max'] ?? 99;
        $continue_table = $data['continue_table'] ?? '';


        // Get the relation information record.
        $records = $model->$relation->toArray();
        $columns = (new $modelName)->getFillable();

        if(count($records) >= 1) {
            // Get the first record of the relation in order to generate a columns.
            $columns = array_map(function ($column) use($except) {
                return !in_array($column, $except) ? $column : null;
            }, $columns);

            foreach($alias as $currentColumn => $replace) {
                
                $index =  array_search($currentColumn, $columns);
                
                if($index) {
                    $columns[$index] = $replace;                
                }

            }

            // Rebase the index of the array columns.
            $columns = array_values(array_filter($columns));
            

            // Format the columns
            $columns = implode(',', $columns);
            
            $index = 0;

            // Format for values
            foreach($records as $r) {
                $index++;
                $formattedValues = "";
                $formattedValues .= "(";

                foreach($r as $column => $record) {
                    if(!in_array($column, $except)) {
                        $data = ($record !== "*" ? $record : '');
                        $formattedValues .= "'" . ($data  ?? ' ') . "',";
                    }
                }
                
                $formattedValues  = rtrim($formattedValues, ',');
                $formattedValues .= "),";
                $formattedValues  = rtrim($formattedValues, ',');

                echo $index . ' => ' . $max;
                
                $table = ($index > $max ) ? $continue_table : $table;

                // Insert into MS Access table.
                $this->database->execute("INSERT INTO $table ($columns) VALUES $formattedValues");
            }
        } else {
            $formattedValues = null;

            
            
            $columns = array_filter(array_map(function ($column) use($except) {
                return !in_array($column, $except) ? $column : null;
            }, $columns));

            foreach($alias as $currentColumn => $replace) {
                
                $index =  array_search($currentColumn, $columns);
                
                if($index) {
                    $columns[$index] = $replace;                
                }
            }

            foreach($columns as $column) {
                $formattedValues .= "' '" . ',';
            }
            
            $columns = implode(',', $columns);
            $formattedValues = rtrim($formattedValues, ',');
            $this->database->execute("INSERT INTO $table ($columns) VALUES ($formattedValues)");
        }
    }


    public function  __invoke(string $employeeId)
    {
        $employee = Employee::find($employeeId);
        
        
        $this->database->deleteRecordsInTables([
            'employees',
            'employee_civil_services',
            'employee_family_backgrounds',
            'employee_educational_backgrounds',
            'employee_information',
            'employee_issued_i_d_s',
            'employee_other_information',
            'employee_references',
            'employee_relevant_queries',
            'employee_spouse_childrens',
            'employee_training_attaineds',
            'employee_voluntary_works',
            'employee_work_experiences',
            'spouse_childrens_continue',
            'civil_service_continue',
            'other_information_continue',
            'program_attained_continue',
            'voluntary_work_continue',
            'work_experience_continue',
        ]);

        
        // insertion of employee basic information.
        $this->insertEmployeeBasicInformation($employee);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'issued_id',
            'model_name' => EmployeeIssuedID::class,
            'table'    => 'employee_issued_i_d_s',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id', 'place_of_issuance'],
            'alias'    => ['id_no' => 'no', 'date' => '_date'],
        ]);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'information',
            'model_name' => EmployeeInformation::class,
            'table'    => 'employee_information',
            'except'   => ['EmpIDNo', 'created_at', 'updated_at', 'id', 'old_office_code', 'division_code' , 'first_of_service', 'basic_rate', 'salary_grade', 'step', 'skills', 'hobbies', 'religion', 'swipe_station_no', 'time_reference', 'exempted_swipe', 'active_inactive', 'new_employee', 'PNB_account_no', 'zip_code', 'shifting_employee', 'PHW', 'item_number', 'first_day_of_service'],
            'alias' => [],
        ]);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'model_name' => EmployeeEducationalBackground::class,
            'relation' => 'educational_background',
            'table'    => 'employee_educational_backgrounds',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeCivilService::class,
            'relation' => 'civil_service',
            'table'    => 'employee_civil_services',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias' => [],
            'max' => 8,
            'continue_table' => 'civil_service_continue',
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeSpouseChildren::class,
            'relation' => 'spouse_child',
            'table'    => 'employee_spouse_childrens',
            'continue_table' => 'spouse_childrens_continue',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias' => [],
            'max' => 12,
        ]);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'model_name' => EmployeeFamilyBackground::class,
            'relation' => 'family_background',
            'table'    => 'employee_family_backgrounds',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id', 'mother_extension'],
            'alias' => [],
        ]);
        

        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeOtherInformation::class,
            'relation' => 'other_information',
            'table'    => 'employee_other_information',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias'    => [],
            'max' => 7,
            'continue_table' => 'other_information_continue',
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeReference::class,
            'relation' => 'references',
            'table'    => 'employee_references',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias'    => [],
        ]);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'model_name' => EmployeeRelevantQuery::class,
            'relation' => 'relevant_queries',
            'table'    => 'employee_relevant_queries',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);


        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeTrainingAttained::class,
            'relation' => 'program_attained',
            'table'    => 'employee_training_attaineds',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias'    => [],
            'max' => 17,
            'continue_table' => 'program_attained_continue'
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeVoluntaryWork::class,
            'relation' => 'voluntary_work',
            'table'    => 'employee_voluntary_works',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias'    => [],
            'max' => 7,
            'continue_table' => 'voluntary_work_continue'
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'model_name' => EmployeeWorkExperience::class,
            'relation' => 'work_experience',
            'table'    => 'employee_work_experiences',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id', 'is_present'],
            'alias'    => ['from' => 'from_date', 'to' => 'to_date'],
            'max' => 21,
            'continue_table' => 'work_experience_continue'
        ]);
        
        return response()->json(['success' => true]);
    }
}
