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
Route::post('participants', 'ParticipantsController@store');
Route::patch('participants/{participant}', 'ParticipantsController@update');
Route::post('participants/{participant}/add/{team}', 'ParticipantsController@addToTeam');
Route::post('participants/{participant}/remove/{team}', 'ParticipantsController@removeFromTeam');
// Teams Routes
Route::get('teams', 'TeamsController@index');
Route::get('teams/{team}', 'TeamsController@show');
Route::delete('teams/{team}', 'TeamsController@destroy');
Route::post('teams', 'TeamsController@store');
Route::patch('teams/{team}', 'TeamsController@update');
Route::get('teams/{team}/roster', 'TeamsController@teamRoster');
Route::post('teams/{team}/captain/{participant}', 'TeamsController@addCaptain');