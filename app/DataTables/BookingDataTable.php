<?php

namespace App\DataTables;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BookingDataTable extends DataTable
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
            ->addColumn('product_and_addon', function ($model) {
                $productAndAddon = $model->productAndAddon;
                $filteredData = collect($productAndAddon)
                ->filter(function ($item) {
                    return !is_null($item->product_id);
                })
                ->map(function ($item) {
                    return [
                        'product_id' => $item->product_id,
                    ];
                })
                ->flatten()
                ->toArray();

                return $filteredData;
            })
            ->addColumn('action', function ($row) {
                $editRoute = route('admin.booking.edit', $row->id);
                $viewRoute = route('admin.booking.show', $row->id);
                $deleteRoute = route('admin.booking.destroy', $row->id);

                return view('admin.layouts.partials.dataTable-action-button', compact('editRoute', 'viewRoute', 'deleteRoute'));
            })
            ->setRowId('id')
            ->filterColumn('product_and_addon', function ($query, $keyword) {
                $query->whereHas('productAndAddon', function ($subquery) use ($keyword) {
                    $subquery->where('product_id', $keyword);
                });
            })
            ->filterColumn('airport_id', function ($query, $keyword) {
                $query->whereRaw('airport_id = ?', [$keyword]);
            })
            ->filterColumn('outbound_terminal_id', function ($query, $keyword) {
                $query->whereRaw('outbound_terminal_id = ? OR inbound_terminal_id = ?', [$keyword, $keyword]);
            })
            ->filterColumn('travel_start_date', function ($query, $keyword) {
                $query->whereDate('travel_start_date', '>=', $keyword);
            })
            ->filterColumn('travel_end_date', function ($query, $keyword) {
                $query->whereDate('travel_end_date', '<=', $keyword);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Booking $model)
    {
        return $model->with([
            'productAndAddon.products', 'notes'
        ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('bookings')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('add')
                    ->addClass('text-center')
                    ->text('Create Booking'),
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
            Column::make('no_of_passengers')->title('No. of passengers'),
            Column::make('total_price')->title('Total price'),
            Column::make('created_at')->title('Booking Date'),
            Column::make('travel_start_date')->title('Travel start date'),
            Column::make('travel_end_date')->title('Travel end date'),
            Column::make('inbound_flight')->title('Inbound Flight'),
            Column::make('outbound_flight')->title('Outbound Flight'),
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
        return 'Booking_' . date('YmdHis');
    }
}
