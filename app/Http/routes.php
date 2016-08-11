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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {
    Route::get('twitch', ['as' => 'twitch', 'uses' => 'TwitchAuthController@redirectToAuth']);
    Route::get('twitch/callback', ['as' => 'twitch.callback', 'uses' => 'TwitchAuthController@handleCallback']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'TwitchAuthController@logout']);
});
