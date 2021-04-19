<?php

namespace App\DataTables;

use App\App\StepIncrement;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StepIncrementDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'stepincrement.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\StepIncrement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StepIncrement $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('stepincrement-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
                    
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'date_step_increment',
            $employees['lastname, firstname, middlename'],
            $positions['position_name'],
            'item_no',
            'date_latest_appointment',
            'sg_no_from',
            'step_no_from',
            'sg_no_to',
            'step_no_to',
            'salary_diff',

            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'StepIncrement_' . date('YmdHis');
    }
}
