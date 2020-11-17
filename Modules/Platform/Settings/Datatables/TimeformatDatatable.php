<?php

namespace Modules\Platform\Settings\Datatables;

use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Settings\Entities\Language;
use Modules\Platform\User\Entities\DateFormat;
use Modules\Platform\User\Entities\TimeFormat;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class TimeformatDatatable
 * @package Modules\Platform\Settings\Datatables
 */
class TimeformatDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'settings.timeformat.show';


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);


        $this->applyLinks($dataTable, self::SHOW_URL_ROUTE);

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('updated_at', array($dates[0], $dates[1]));
            }
        });

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TimeFormat $model)
    {
        return $model->disableModelCaching()->newQuery()->select();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())

            ->setTableAttribute('class', 'table table-hover')
            ->parameters([
                'dom' => 'lBfrtip',
                'responsive' => false,
                'stateSave' => true,
                'columnFilters' => [
                    [
                        'column_number' => 0,
                        'filter_type' => 'text'
                    ],
                    [
                        'column_number' => 1,
                        'filter_type' => 'text'
                    ],
                    [
                        'column_number' => 2,
                        'filter_type' => 'text',
                    ],
                    [
                        'column_number' => 3,
                        'filter_type' => 'bap_date_range_picker',

                    ],
                    [
                        'column_number' => 4,
                        'filter_type' => 'bap_date_range_picker',
                    ]
                ],
                'buttons' => DataTableHelper::buttons(),
                'regexp' => true

            ]);
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        return
            [
                'name' => ['data' => 'name', 'title' => trans('settings::timeformat.table.name'), 'data_type' => 'text'],
                'details' => ['data' => 'details', 'title' => trans('settings::timeformat.table.php_format'), 'data_type' => 'text'],
                'js_details' => ['data' => 'js_details', 'title' => trans('settings::timeformat.table.js_format'), 'data_type' => 'text'],
                'created_at' => ['data' => 'created_at', 'title' => trans('settings::timeformat.table.created_at'), 'data_type' => 'datetime'],
                'updated_at' => ['data' => 'updated_at', 'title' => trans('settings::timeformat.table.updated_at'), 'data_type' => 'datetime']
            ];
    }
}
