<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('participants/create', 'ParticipantsController@create')->middleware('auth');
Route::get('teams/create', 'TeamsController@create')->middleware('auth');
Route::get('/docs', function() {
    return view('docs');
})->middleware('auth');
Route::get('/rosters', function () {
    return view('rosters');
})->middleware('auth');
Route::get('/assign', function () {
    return view('assign');
})->middleware('auth');
