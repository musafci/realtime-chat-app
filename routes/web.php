<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/chat', 'ChatController@chat');
Route::post('/send', 'ChatController@send');
Route::post('/saveToSession', 'ChatController@saveToSession');
Route::post('/getOldMessage', 'ChatController@getOldMessage');
