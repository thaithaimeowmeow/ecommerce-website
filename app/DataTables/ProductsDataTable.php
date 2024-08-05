<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('thumbnail', function (Product $product) {
            return '<img class="img-fluid" src="/storage/'. $product->thumbnail .'" alt="..." />';
        })
        ->editColumn('displayImage', function (Product $product) {
            return '<img class="img-fluid" src="/storage/'. $product->displayImage .'" alt="..." />';
        })
        ->editColumn('price', function (Product $product) {
            return number_format($product->price);
        })
        ->editColumn('display_price', function (Product $product) {
            return number_format($product->display_price);
        })
        ->setRowId('id')
        // ->addColumn('action', 'Edit')
        ->addColumn('action', function (Product $product) {
            return '<a href="'. route('product.edit', $product->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>';
        })
        ->rawColumns(['thumbnail','displayImage','action'])
        ;
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('products-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
                        Button::make('excel'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('sku'),
            Column::make('thumbnail'),
            Column::make('displayImage'),
            Column::make('name'),
            Column::make('price'),
            Column::make('display_price'),
            Column::make('quanity'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
