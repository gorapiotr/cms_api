<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/carousel', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{

    /* Carousel */
    Route::get('/{carousel_id}', 'CarouselController@show');
    Route::get('/', 'CarouselController@index');
    Route::post('/', 'CarouselController@store');
    Route::put('/{carousel_id}', 'CarouselController@update');



});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/carousel-group', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{
    /* Carousel group */
    Route::get('/', 'CarouselGroupController@index');
    Route::get('/{carousel_group_id}', 'CarouselGroupController@show');
    Route::put('/{carousel_group_id}', 'CarouselGroupController@update');

});

