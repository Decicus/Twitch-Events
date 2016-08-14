<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'BaseController@home']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function() {
    Route::group(['prefix' => 'events', 'as' => 'events.'], function() {
        Route::get('add', ['as' => 'add', 'uses' => 'AdminEventController@add']);
        Route::post('add', ['as' => 'add.post', 'uses' => 'AdminEventController@addPost']);
        Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'AdminEventController@edit'])
            ->where('id', '[0-9]+');
        Route::post('edit', ['as' => 'edit.post', 'uses' => 'AdminEventController@editPost']);
        Route::match(['get', 'post'], 'delete', ['as' => 'delete', 'uses' => 'AdminEventController@delete']);
    });
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {
    Route::get('twitch', ['as' => 'twitch', 'uses' => 'TwitchAuthController@redirectToAuth']);
    Route::get('twitch/callback', ['as' => 'twitch.callback', 'uses' => 'TwitchAuthController@handleCallback']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'TwitchAuthController@logout']);
});
