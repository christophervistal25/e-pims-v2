<?php
namespace App\Pipes;
use Yajra\DataTables\DataTables;

class PromotedListByDatatables
{
    public function handle($records)
    {
        return $this->make($records);
    }

    private function make($promotions)
    {
        return DataTables::of($promotions->get())
                ->addColumn('promotion_date', fn ($record) => date('F d, Y', strtotime($record->promotion_date)))
                ->addColumn('office', fn ($record) => $record->new_plantilla_position->office->office_name)
                ->addColumn('employee', fn ($record) => $record->employee->fullname)
                ->addColumn('old_plantilla_position', fn ($record) => $record->old_plantilla_position->position->Description)
                ->addColumn('new_plantilla_position', fn ($record) => $record->new_plantilla_position->position->Description)
                ->make(true);
    }
}
