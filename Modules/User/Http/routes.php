<?php


Route::group(['middleware' => 'auth:api', 'prefix' => 'api/user', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    /*Show login user data*/
    Route::get('/', 'UserController@show')->middleware([
        'auth:api',
        'permission:read-users'
    ]);
    /*Get list all users*/
    Route::get('/list', 'UserController@index')->middleware([
        'auth:api',
        'permission:read-users'
    ]);
    /*Get other user profile*/
    Route::get('/{user_id}', 'UserController@showOtherUser')->middleware([
        'auth:api',
        'permission:read-users'
    ]);
    /*Update profile*/
    Route::put('/', 'UserController@update')->middleware([
        'auth:api',
        'permission:update-users'
    ]);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/permissions', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    /*Get user permissions*/
    Route::get('/{user_id}', 'PermissionController@getPermissions')->middleware([
        'auth:api'
    ]);
});
