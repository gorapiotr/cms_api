<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/carousel', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{

    /* Carousel */
    Route::get('/{carousel_id}', 'CarouselController@show')->middleware([
        'auth:api',
        'permission:read-carousel'
    ]);
    Route::get('/', 'CarouselController@index')->middleware([
        'auth:api',
        'permission:read-carousel'
    ]);
    Route::post('/', 'CarouselController@store')->middleware([
        'auth:api',
        'permission:create-carousel'
    ]);
    Route::put('/{carousel_id}', 'CarouselController@update')->middleware([
        'auth:api',
        'permission:update-carousel'
    ]);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/carousel-group', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{
    /* Carousel group */
    Route::get('/', 'CarouselGroupController@index')->middleware([
        'auth:api',
        'permission:read-carousel'
    ]);
    Route::get('/{carousel_group_id}', 'CarouselGroupController@show')->middleware([
        'auth:api',
        'permission:read-carousel'
    ]);
    Route::put('/{carousel_group_id}', 'CarouselGroupController@update')->middleware([
        'auth:api',
        'permission:update-carousel'
    ]);

});

