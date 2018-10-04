<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/settings', 'namespace' => 'Modules\Settings\Http\Controllers'], function()
{

    /* Settings */
    Route::get('/', 'SettingsController@index')->middleware([
        'auth:api',
        'permission:read-settings'
    ]);
    Route::post('/{setting_id}', 'SettingsController@update');
});