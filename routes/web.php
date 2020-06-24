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

Auth::routes();

Route::get('/home', 'ConversationsController@index')->name('home');
Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account', 'DiagramController@index');

Route::get('/appointment', 'AppointmentController@choose');

Route::post('/appointment', 'AppointmentController@index');





// Route::post('/appointment', function ($req) {
//     if (Auth::user()->status == 1) {
//         return AppointmentClientController::index($req);
//     } else {
//         return AppointmentController::index($req);
//     }
// })->name('appointment');


Route::get('/legalNotice', function () {
    return view('legalNotice');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/calendar', function () {
    return view('calendar');
});

Route::post('/calendar', function () {
    $link = request('link');
    App\User::where('id', Auth::user()->id)->update(['outlookLink' => $link]);

    return redirect('/calendar');
});

Route::get('/helpCalendar', function () {
    return view('helpCalendar');
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ConversationsController@index')->name('home');
Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')
    ->middleware('can:talkTo,user')
    ->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store')
    ->middleware('can:talkTo,user');

Route::post('/account', 'AccountController@index')->name('account');

// Route::get('/signin', 'AuthController@signin');
// Route::get('/callback', 'AuthController@callback');
// Route::get('/signout', 'AuthController@signout');
// Route::get('/calendar', 'CalendarController@calendar'); 