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

Route::get('/', function() {
    return view('welcome');
});

Route::get('buzzphone/voice/intro',  'TwiMlVoiceController@intro');
Route::get('buzzphone/voice/play',  'TwiMlVoiceController@play');
Route::get('buzzphone/voice/error',  'TwiMlVoiceController@error');
Route::get('buzzphone/voice/result',  'TwiMlVoiceController@result');
Route::get('buzzphone/voice/test/{num}',  'TwiMlVoiceController@test');
