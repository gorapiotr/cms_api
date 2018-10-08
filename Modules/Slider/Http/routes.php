<?php

Route::group(['middleware' => 'web', 'prefix' => 'slider', 'namespace' => 'Modules\Slider\Http\Controllers'], function()
{
    Route::get('/', 'SliderController@index');
});
