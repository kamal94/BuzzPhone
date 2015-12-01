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

Route::post('buzzphone/voice', 'TwiMlVoiceController@sendGame');
Route::get('buzzphone/voice/intro',  'TwiMlVoiceController@intro');
Route::post('buzzphone/voice/initiateGame',  'TwiMlVoiceController@initiateGame');
Route::get('buzzphone/voice/play',  'TwiMlVoiceController@play');
Route::get('buzzphone/voice/error',  'TwiMlVoiceController@error');
Route::get('buzzphone/voice/result',  'TwiMlVoiceController@result');
Route::get('buzzphone/voice/end',  'TwiMlVoiceController@end');
Route::get('buzzphone/voice/test/{num}',  'TwiMlVoiceController@test');
Route::get('success', 'TwiMlVoiceController@success');