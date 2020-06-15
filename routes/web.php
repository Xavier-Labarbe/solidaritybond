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

Route::get('/account', function () {
    return view('account');
});

Route::get('/appointment', function () {
    return view('appointment');
});

Route::get('/legalNotice', function () {
    return view('legalNotice');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/calendar', function () {
    return view('calendar');
});

Route::get('/helpCalendar', function () {
    return view('helpCalendar');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'ConversationsController@index')->name('home');
Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')
    ->middleware('can:talkTo,user')
    ->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store')
    ->middleware('can:talkTo,user');