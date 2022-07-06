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

    public static function laratablesCustomImage($employee)
    {
        $employeeImage = file_exists(public_path('/assets/img/thumbnail/' . $employee->Employee_id . '.jpg')) ? asset('/assets/img/thumbnail/' . $employee->Employee_id . '.jpg') : asset('/assets/img/profiles/no_image.png');
        return "<a href=" . asset('/assets/img/profiles/' . $employee->Employee_id . '.jpg') . " data-lightbox='image-1' data-title=" . $employee->LastName . ">
            <img width='80px;' class='img-fluid rounded-circle' alt='NO IMAGE' src=" . $employeeImage . ">
        </a>";
    }

    public static function laratablesCustomAction($user)
    {
        $id = (new HashIds)->encode($user->Employee_id);
        $employee_id = $user->Employee_id;
        return view('employee.actions', compact('id', 'employee_id'))->render();
    }
}
