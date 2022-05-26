<?php

namespace App\Traits;

use Hashids\Hashids;

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
        $id = (new HashIds)->encode($user->Employee_id);
        $employee_id = $user->Employee_id;
        return view('employee.actions', compact('id', 'employee_id'))->render();
    }
}
