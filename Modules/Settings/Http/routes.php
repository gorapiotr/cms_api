<?php

Route::group(['middleware' => 'CORS', 'prefix' => 'api/settings', 'namespace' => 'Modules\Settings\Http\Controllers'], function()
{

    /* Settings */
    Route::get('/', 'SettingsController@index');
});