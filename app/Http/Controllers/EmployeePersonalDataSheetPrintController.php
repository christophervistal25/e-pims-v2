<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Services\MSAccess;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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

        $excludeToUppercase = [
            'email',
        ];

        $columns = implode(',', $employee->getFillable());
    
        $values = "";

        foreach($employee->getFillable() as $column) {
            if(in_array($column, $fieldsWithPostFix)) {
                $column .= '_text';
            }

          
                $values .=  "'" . ($employee->$column  ?? '') . "',";
        }

        $values = rtrim($values, ',');
        
        $sql = "INSERT INTO employees ($columns) VALUES ($values)";

        $this->database->execute($sql);
    }

    private function oneToOneInsertion(array $data = [])
    {
        $model    = $data['model'];
        $relation = $data['relation'];
        $except   = $data['except'];
        $table    = $data['table'];
        $alias    = $data['alias'];

        if(is_null($model->$relation)) {
            return false;
        }


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
            $formattedValues .=  "'" . ($value  ?? '') . "',";
        }

        $formattedValues = rtrim($formattedValues, ',');
        

        // Insert into MS Access table.
        $this->database->execute("INSERT INTO $table ($columns) VALUES ($formattedValues)");
    }

    private function oneToManyInsertion(array $data = [])
    {
        $model    = $data['model'];
        $relation = $data['relation'];
        $except   = $data['except'];
        $table    = $data['table'];
        $alias = $data['alias'];

        if(is_null($model->$relation)) {
            return false;
        }

        // Get the relation information record.
        $records = $model->$relation->toArray();

        // Get the first record of the relation in order to generate a columns.
        $columns = array_keys($records[0]);
        
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

        
        // Format for values

        foreach($records as $civilService) {
            $formattedValues = "";
            $formattedValues .= "(";
            foreach($civilService as $column => $record) {
                if(!in_array($column, $except)) {
                    $formattedValues .= "'" . ($record  ?? ' ') . "',";
                }
            }
            
            $formattedValues  = rtrim($formattedValues, ',');
            $formattedValues .= "),";
            $formattedValues  = rtrim($formattedValues, ',');

            // Insert into MS Access table.
            $this->database->execute("INSERT INTO $table ($columns) VALUES $formattedValues");
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
        ]);

        
        // insertion of employee basic information.
        $this->insertEmployeeBasicInformation($employee);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'information',
            'table'    => 'employee_information',
            'except'   => ['created_at', 'updated_at', 'id', 'old_office_code', 'division_code' , 'first_of_service', 'basic_rate', 'salary_grade', 'step', 'skills', 'hobbies', 'religion', 'swipe_station_no', 'time_reference', 'exempted_swipe', 'active_inactive', 'new_employee', 'PNB_account_no', 'zip_code', 'shifting_employee', 'PHW', 'item_number', 'first_day_of_service'],
            'alias' => ['EmpIDNo' => 'employee_id'],
        ]);

        // Insertion of employee educational background
        $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'educational_background',
            'table'    => 'employee_educational_backgrounds',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);

         $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'civil_service',
            'table'    => 'employee_civil_services',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'spouse_child',
            'table'    => 'employee_spouse_childrens',
            'except'   => ['employee_id', 'created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'family_background',
            'table'    => 'employee_family_backgrounds',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);
        
         $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'issued_id',
            'table'    => 'employee_issued_i_d_s',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias'    => ['id_type' => 'type', 'id_no' => 'no', 'date' => '_date'],
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'other_information',
            'table'    => 'employee_other_information',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias'    => [],
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'references',
            'table'    => 'employee_references',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias'    => [],
        ]);

        $this->oneToOneInsertion([
            'model'    => $employee,
            'relation' => 'relevant_queries',
            'table'    => 'employee_relevant_queries',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias' => [],
        ]);


        $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'program_attained',
            'table'    => 'employee_training_attaineds',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias'    => [],
        ]);

        $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'voluntary_work',
            'table'    => 'employee_voluntary_works',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias'    => [],
        ]);

         $this->oneToManyInsertion([
            'model'    => $employee,
            'relation' => 'work_experience',
            'table'    => 'employee_work_experiences',
            'except'   => ['created_at', 'updated_at', 'id'],
            'alias' => ['from' => 'from_date', 'to' => 'to_date'],
        ]);

        $windowExeLocation = config('window.base_path') . config('window.app_name');

        shell_exec($windowExeLocation);

        return response()->json(['success' => true]);
    }
}
