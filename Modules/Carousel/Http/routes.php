<?php

Route::group(['middleware' => 'CORS', 'prefix' => 'api/carousel', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{

    /* Carousel */
    Route::get('/{carousel_id}', 'CarouselController@show');
    Route::get('/', 'CarouselController@index');
    Route::post('/', 'CarouselController@store');
    Route::put('/{carousel_id}', 'CarouselController@update');
    Route::put('/', 'CarouselController@updateCollection');


});

Route::group(['middleware' => 'CORS', 'prefix' => 'api/carousel-group', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{
    /* Carousel group */
    Route::get('/', 'CarouselGroupController@index');


});
