<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/settings', 'namespace' => 'Modules\Settings\Http\Controllers'], function()
{

    /* Settings */
    Route::get('/', 'SettingsController@index');
    Route::put('/{setting_id}', 'SettingsController@update');
});