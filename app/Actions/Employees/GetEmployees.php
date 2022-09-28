<?php

namespace App\Actions\Employees;

use App\Employee;
use Yajra\Datatables\Datatables;

final class GetEmployees
{
    public function handle()
    {
        return Employee::without(['position', 'office_charging', 'office_assignment'])
                        ->get(['Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix']);
    }

    private function renderImage(string $employeeID)
    {
        if (file_exists(public_path("assets/img/thumbnail/{$employeeID}.jpg"))) {
            return "
                <a href='/assets/img/profiles/{$employeeID}.jpg' data-lightbox='image-1'>
                    <img src='/assets/img/thumbnail/{$employeeID}.jpg' alt='NO IMAGE' class='img-fluid rounded-circle' width='80px'>
                </a>
            ";
        }

        return "<img src='/assets/img/province.png' alt='NO IMAGE' class='img-fluid rounded-circle' width='80px'>";
    }

    private function renderButtons(Employee $record)
    {
        $btn = "
            <a title='Edit' class='shadow text-white btn-add-file btn btn-primary mr-1' data-fullname='{$record->fullname}' data-id='{$record->Employee_id}'>
                    <i class='fas fa-plus'></i>
            </a>
            ";

            $btn .= "
            <a title='View Records' class='shadow text-white btn-view-file btn btn-info mr-1' data-id='{$record->Employee_id}'>
                <i class='fas fa-eye'></i>
            </a>
        ";

        return $btn;
    }

    public function asApi()
    {
        $employees = $this->handle();
        return Datatables::of($employees)
                    ->addColumn('image', fn ($record) => $this->renderImage($record->Employee_id))
                    ->addColumn('action', fn ($record) => $this->renderButtons($record))
                    ->rawColumns(['action', 'image'])
                    ->make(true);
    }
}
