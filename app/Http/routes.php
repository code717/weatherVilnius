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

Route::get('/', [
    'uses' => 'MainController@getYahoo',
    'as' => 'main_page'
]);

Route::get('/weather' , [
    'uses' => 'MainController@getWeather',
    'as' => 'getWeather'
]);


Route::get('/yahoo' , [
    'uses' => 'MainController@getYahoo',
    'as' => 'getWeatherYah'
]);

Route::get('/temp/{provider}', [
    'uses' => 'MainController@getTemperature',
    'as' => 'temperature'
]);