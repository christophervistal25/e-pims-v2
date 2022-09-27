<?php

namespace App\Traits;

use Carbon\Carbon;
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
        return ['PosCode', 'OfficeCode', 'OfficeCode2', 'isActive', 'Birthdate', 'Work_Status'];
    }

    public static function laratablesCustomImage($employee)
    {
        $employeeImage = file_exists(public_path('/assets/img/thumbnail/'.$employee->Employee_id.'.jpg')) ? asset('/assets/img/thumbnail/'.$employee->Employee_id.'.jpg') : asset('/assets/img/profiles/no_image.png');

        return '<a href='.asset('/assets/img/profiles/'.$employee->Employee_id.'.jpg')." data-lightbox='image-1' data-title=".$employee->LastName.">
            <img width='80px;' class='img-fluid rounded-circle' alt='NO IMAGE' src=".$employeeImage.'>
        </a>';
    }

    public static function laratablesCustomAge($employee)
    {
        return Carbon::parse($employee->Birthdate)->age;
    }

    public static function laratablesCustomAction($user)
    {
        $id = (new HashIds())->encode($user->Employee_id);
        $employee_id = $user->Employee_id;
        $isActive = $user->isActive;

        return view('employee.actions', compact('id', 'employee_id', 'isActive'))->render();
    }
}
