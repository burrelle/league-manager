<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Participants Routes
Route::get('participants', 'ParticipantsController@index');
Route::get('participants/{participant}', 'ParticipantsController@show');
Route::delete('participants/{participant}', 'ParticipantsController@destroy');
// Teams Routes
Route::get('teams', 'TeamsController@index');
