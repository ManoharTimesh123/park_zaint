<?php

namespace App\DataTables;

use App\Models\Airport;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AirportDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $editRoute = route('admin.airport.edit', $row->id);
                $viewRoute = route('admin.airport.show', $row->id);
                $deleteRoute = route('admin.airport.destroy', $row->id);

                return view('admin.layouts.partials.dataTable-action-button', compact('editRoute', 'viewRoute', 'deleteRoute'));
            })->addColumn('status', function ($data) {
                return $data->status == 1 ? 'Active' : 'Inactive';
            })
            ->editColumn('description', function ($data) {
                $storageBaseUrl = env('STORAGE_BASE_URL');
                $updatedDescription = str_replace('storage_base_url', $storageBaseUrl, $data->description);

                return $updatedDescription;
            })
            ->setRowId('id')->rawColumns(['description']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Airport $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Airport $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('airports')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('add')
                    ->addClass('text-center')
                    ->text('Create Airport'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('name')->title('Name'),
            Column::make('slug')->title('Slug'),
            Column::make('cc_email')->title('CC Email'),
            Column::make('description')->title('Description'),
            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),
            Column::make('status')->title('Status'),
            Column::computed('action')->title('Action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Airport_' . date('YmdHis');
    }
}
