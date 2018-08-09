<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/carousel', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{
    Route::get('/{carousel_id}', 'CarouselController@show');

    Route::get('/', 'CarouselController@index');

    Route::post('/', 'CarouselController@store');

    Route::put('/{carousel_id}', 'CarouselController@update');
});
