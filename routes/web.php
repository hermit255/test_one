<?php

use Illuminate\Support\Facades\Route;

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
    return view('TicketClass.list');
});
Route::get('/ticket_class', 'TicketClassesController@list');
Route::get('/ticket_class/edit', 'TicketClassesController@create');
Route::post('/ticket_class/edit/confirm', 'TicketClassesController@createConfirm');
Route::get('/ticket_class/{ticketClassId}/edit', 'TicketClassesController@edit');
Route::post('/ticket_class/{ticketClassId}/edit/confirm', 'TicketClassesController@editConfirm');
Route::post('/ticket_class/save', 'TicketClassesController@save');
Route::get('/published_ticket', 'PublishedTicketController@list');
Route::get('/published_ticket/download', 'PublishedTicketController@download_csv');