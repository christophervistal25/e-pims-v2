<?php

namespace App\Services\Reports;

use Illuminate\Support\Facades\DB;

final class PlantillaPositionService
{
    private function query()
    {
        return DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
                    ->join('EPims.dbo.Positions', 'plantilla_positions.PosCode', '=', 'Positions.PosCode')
                    ->join('EPims.dbo.plantillas', 'plantilla_positions.pp_id', '=', 'plantillas.pp_id')
                    ->leftJoin('DTRPayroll.dbo.Employees', 'plantillas.employee_id', '=', 'Employees.Employee_id')
                    ->join('EPims.dbo.Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
                    ->leftJoin('EPims.dbo.Sections', 'plantilla_positions.section_id', '=', 'Sections.section_id')
                    ->leftJoin('EPims.dbo.Divisions', 'plantilla_positions.division_id', '=', 'Divisions.division_id')
                    ->select(
                        'plantilla_positions.*',
                        'plantillas.plantilla_id', 'plantillas.old_item_no', 'plantillas.item_no', 'plantillas.pp_id', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', 'plantillas.salary_amount_yearly', 'plantillas.sg_no_previous', 'plantillas.step_no_previous', 'plantillas.salary_amount_previous',
                        'plantillas.salary_amount_previous_yearly', 'plantillas.employee_id', 'plantillas.date_original_appointment', 'plantillas.date_last_promotion', 'plantillas.status', 'plantillas.year',
                        DB::raw("CONCAT(FirstName, ', ' , MiddleName , ' ' , LastName, ' ' , Suffix) AS fullname"),
                        'office_name', 'office_short_name',
                        'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate',
                        'Divisions.division_id', 'Divisions.division_name',
                        'Sections.section_id', 'Sections.section_name'
                    );
    }

    private function base()
    {
        return DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
                    ->join('EPims.dbo.plantillas', 'plantilla_positions.pp_id', '=', 'plantillas.pp_id')
                    ->leftJoin('DTRPayroll.dbo.Employees', 'plantillas.employee_id', '=', 'Employees.Employee_id')
                    ->join('EPims.dbo.Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
                    ->leftJoin('EPims.dbo.Sections', 'plantilla_positions.section_id', '=', 'Sections.section_id')
                    ->leftJoin('EPims.dbo.Divisions', 'plantilla_positions.division_id', '=', 'Divisions.division_id')
                    ->select(
                        'plantilla_positions.item_no', 'plantilla_positions.sg_no', 'plantilla_positions.office_code',
                        'plantillas.plantilla_id', 'plantillas.old_item_no', 'plantillas.item_no', 'plantillas.pp_id', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', 'plantillas.salary_amount_yearly', 'plantillas.sg_no_previous', 'plantillas.step_no_previous', 'plantillas.salary_amount_previous',
                        'plantillas.salary_amount_previous_yearly', 'plantillas.employee_id', 'plantillas.date_original_appointment', 'plantillas.date_last_promotion', 'plantillas.status', 'plantillas.year',
                    );
    }

    private function dbm()
    {
        return DB::connection('E_PIMS_CONNECTION')->table('plantilla_positions')
                    ->join('EPims.dbo.plantillas', 'plantilla_positions.pp_id', '=', 'plantillas.pp_id')
                    ->leftJoin('DTRPayroll.dbo.Employees', 'plantillas.employee_id', '=', 'Employees.Employee_id')
                    ->join('EPims.dbo.Offices', 'plantilla_positions.office_code', '=', 'Offices.office_code')
                    ->leftJoin('EPims.dbo.Sections', 'plantilla_positions.section_id', '=', 'Sections.section_id')
                    ->leftJoin('EPims.dbo.Divisions', 'plantilla_positions.division_id', '=', 'Divisions.division_id')
                    ->select(
                        'plantilla_positions.item_no', 'plantilla_positions.sg_no', 'plantilla_positions.office_code',
                        'plantillas.plantilla_id', 'plantillas.old_item_no', 'plantillas.item_no', 'plantillas.pp_id', 'plantillas.sg_no', 'plantillas.step_no', 'plantillas.salary_amount', 'plantillas.salary_amount_yearly', 'plantillas.sg_no_previous', 'plantillas.step_no_previous',
                        'plantillas.salary_amount as salary_amount_previous',
                        'plantillas.salary_amount_yearly as salary_amount_previous_yearly',
                        'plantillas.employee_id', 'plantillas.date_original_appointment', 'plantillas.date_last_promotion', 'plantillas.date_last_increment', 'plantillas.status', 'plantillas.year',
                    );
    }
    /**
     * It gets all the data from the `plantilla_positions` table, joins the `Positions` table, joins
     * the `plantillas` table, left joins the `Employees` table, joins the `Offices` table, and selects
     * the columns from the `plantilla_positions` table, the `Positions` table, the `plantillas` table,
     * the `Employees` table, and the `Offices` table
     *
     * @param string office The office code of the office you want to get the plantilla positions from.
     */
    public function getByOfficeAndYear(string $office = '', int  $year)
    {
        return $this->query()->where('plantilla_positions.office_code', $office)->where('year', $year)->get();

    }

    /**
     * It gets all the data from the table plantilla_positions and joins it with the table Positions,
     * plantillas, Employees, and Offices
     */
    public function getByYear(int $year)
    {
        return $this->base()->where('year', $year)->get();
    }

    public function getByYearForDBM(int $year)
    {
        return $this->dbm()->where('year', $year)->get();
    }

    public function getByYearAndGroupByOffice(int $year)
    {
        return $this->query()->where('year', $year)->get()->groupBy('office_name');
    }

    public function getAvailableYears()
    {
        return DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->get()->pluck('Year')->toArray();
    }

    public function getReports()
    {
        return DB::connection('E_PIMS_CONNECTION')->table('Plantilla_Reports')->orderBy('Year', 'DESC')->get();
    }
}
