<?php
namespace App\Traits;

trait EmployeeLaraTablesAction
{
    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['PosCode', 'OfficeCode', 'OfficeCode2', 'isActive'];
    }

    public static function laratablesCustomAction($user)
    {
        return view('employee.actions', compact('user'))->render();
    }
}