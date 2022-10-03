<?php

namespace App\Actions;

use App\PersonnelFile;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\Datatables\Datatables;


class GetPersonnelFile
{
    use AsAction;

    private function handle()
    {
        return PersonnelFile::orderBy('created_at', 'ASC')->get();
    }

    private function renderButtons($record)
    {
        return "
            <a title='Edit' class='text-white border-0 btn btn-success btn-edit-file mr-2' style='cursor:pointer' data-name='{$record->name}' data-id='{$record->id}'>
                    <i class='la la-pencil'></i>
            </a>
        ";
    }

    public function asApi()
    {
        return Datatables::of($this->handle())
                ->addColumn('action', fn ($record) => $this->renderButtons($record))
                ->rawColumns(['action'])
                ->make(true);
    }
}
