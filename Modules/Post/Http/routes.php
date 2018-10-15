<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/post', 'namespace' => 'Modules\Post\Http\Controllers'], function()
{
    Route::get('/', 'PostController@index')->middleware([
        'auth:api',
        'permission:read-post'
    ]);
    Route::get('/{postId}', 'PostController@show')->middleware([
        'auth:api',
        'permission:read-post'
    ]);
    Route::post('/{postId}', 'PostController@update')->middleware([
        'auth:api',
        'permission:update-post'
    ]);
});

Route::group(['prefix' => 'api/page/post', 'namespace' => 'Modules\Post\Http\Controllers'], function() {
    Route::get('/', 'PostPageController@index');
    Route::get('/{slug}', 'PostPageController@show');
});