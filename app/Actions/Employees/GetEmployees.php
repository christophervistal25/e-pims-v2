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
                    <img src='/assets/img/thumbnail/{$employeeID}.jpg' alt='NO IMAGE' class='img-fluid rounded-circle' width='35px'>
                </a>
            ";
        }

        return "<img src='/assets/img/province.png' alt='NO IMAGE' class='img-fluid rounded-circle' width='35px'>";
    }

    private function renderButtons(Employee $record)
    {
        $btn = "<div class='btn-group'>
            <button type='button' class='btn btn-primary text-white btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Actions</button>
                <div class='dropdown-menu' x-placement='bottom-start' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);'>
                    <a class='dropdown-item btn-add-file' href='#' data-fullname='{$record->fullname}' data-id='{$record->Employee_id}'>Add Personnel File</a>
                    <a class='dropdown-item btn-view-file' href='#' data-id='{$record->Employee_id}'>View Personnel Files</a>
                </div>
            </div>";

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
