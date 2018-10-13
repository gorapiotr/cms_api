<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/post', 'namespace' => 'Modules\Post\Http\Controllers'], function()
{
    Route::get('/', 'PostController@index');
    Route::get('/{postId}', 'PostController@show');
    Route::post('/{postId}', 'PostController@update');
});
