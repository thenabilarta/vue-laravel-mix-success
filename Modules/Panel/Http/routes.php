<?php

Route::group(['middleware' => 'web', 'prefix' => 'panel', 'namespace' => 'Modules\Panel\Http\Controllers'], function () {
    Route::get('/', 'PanelController@index');
    Route::get('/data', 'PanelController@data');
    Route::get('/ajax', 'PanelController@ajax');
});