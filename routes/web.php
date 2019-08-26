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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/messages/contacts', 'MessagesController@contacts')->name('contacs.index');
Route::get('/messages/{id}', 'MessagesController@getMessages')->name('contacs.getMessages');
Route::post('/messages', 'MessagesController@sendMessage')->name('contacs.sendMessage');
