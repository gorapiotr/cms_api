<?php

Route::group(['middleware' => 'auth:api', 'prefix' => 'api/user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    /*Show login user data*/
    Route::get('/', 'UserController@show');

    /*Get list all users*/
    Route::get('/list', 'UserController@index');

    /*Get other user profile*/
    Route::get('/{user_id}', 'UserController@showOtherUser');

    /*Update profile*/
    Route::put('/', 'UserController@update');

});
