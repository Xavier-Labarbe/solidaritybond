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
    return view('welcome');
});

<<<<<<< HEAD

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Auth::routes();

Route::get('/home', 'ConversationsController@index')->name('home');
Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')
    ->middleware('can:talkTo,user')
    ->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store')
    ->middleware('can:talkTo,user');
>>>>>>> 12a15d7aa531fe9568b52be1267a42f4f999c2c7
