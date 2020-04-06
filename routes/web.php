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
Route::get('/#contact', function () {
    return view('contact');
});
Route::get('/login','LoginController@login');
Route::get('/register', function () {
    return view('user.register');
});
Route::POST('submit','registercontrol@save');
Route::get('/welcome', function () {
    return view('user.welcome');
});
Route::get('/process', function () {
    return view('user.process');
});
Route::get('/findmatch', function () {
    return view('user.findmatch');
});

Route::post('/registration', 'RegistrationController@store')->name('registration.store');

Route::get('/registration/{token}/{id}', 'RegistrationController@regToken')->name('registration.regToken');

Route::group(['middleware' => ['userSess']], function (){

    Route::get('/user', 'UserController@index')->name('user.index');

    Route::post('/user', 'UserController@searchUser')->name('user.searchUser');

    Route::get('/profile', 'UserController@profile')->name('user.profile');

    Route::get('/profile/{user}', 'UserController@publicProfile')->name('user.publicProfile');

    Route::post('/profile/{user}', 'UserController@showInterest')->name('user.publicProfile');

    Route::get('/profile-picture', 'AccountController@proPic')->name('account.proPic');

    Route::post('/profile-picture', 'AccountController@updateProPic')->name('account.proPic');

    Route::get('/logout', 'LogoutController@index')->name('logout.index');

});