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

Auth::routes();

Route::get('/', 'EventController@index')->name('events.details');
Route::get('/tickets', 'TicketController@index')->name('tickets');
Route::get('/tournaments', 'TournamentController@index')->name('tournaments');
