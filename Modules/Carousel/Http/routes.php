<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/carousel', 'namespace' => 'Modules\Carousel\Http\Controllers'], function()
{
    Route::get('/', 'CarouselController@index');
});
