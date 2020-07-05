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

Route::get('/calendar', 'HomeController@calendar');
Route::get('/signin', 'MicrosoftAuthController@signin');
Route::get('/callback', 'MicrosoftAuthController@callback');
Route::get('/signout', 'MicrosoftAuthController@signout');
Route::get('/microsoftCalendar', 'MicrosoftCalendarController@calendar');


Route::get('/helpCalendar', function () {
    return view('helpCalendar');
});

Route::get('/modify', function () {
    return view('modifyAppointment');
});

Route::post('/acceptAppointment', 'AppointmentController@accept')->name('acceptAppointment');
Route::post('/denyAppointment', 'AppointmentController@deny')->name('denyAppointment');

Route::post('/denyAppointment', function () {
    $id = request('id');
    App\Appointment::where('id', $id)->update(['status' => 2]);
    return redirect('/appointment');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/account', 'AccountController@index')->name('account');

Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@index');

Route::delete('/deleteAppointment', 'AppointmentController@delete');