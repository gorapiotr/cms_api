<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/slider', 'namespace' => 'Modules\Slider\Http\Controllers'], function()
{
    Route::get('/', 'SliderController@index');
    Route::post('/update', 'SliderController@update');
});
