<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/







Route::get('/', function () {
    return view('index');
});

Route::get('/test', 'TestController@test');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::post('/home/update/{user}', 'HomeController@update');

Route::resource('/discuss', 'DiscussController');
Route::get('/discuss/channels/{channel}/{post}/{slug}', 'DiscussController@show');
Route::post('/discuss/channels/{channel}/{post}/{slug}', 'DiscussController@comment');

Route::get('/home/{user}/{post}/{comment}/like', 'LikesController@store');











