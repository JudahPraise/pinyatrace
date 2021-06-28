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
Route::prefix('resident')->group(function(){
    //ROOT
    Route::get('/', 'HomeController@index')->name('resident');
    //AUTH
    Route::get('/login', 'Auth\LoginController@showLogIn')->name('login');
    Route::get('/register', 'Auth\RegisterController@showRegister')->name('register');
});
Route::prefix('tracer')->group(function(){
    //ROOT
    Route::get('/', 'ContactTracer\ContactTracerController@index')->name('tracer');
    //AUTH
    Route::get('/login', 'Auth\ContactTracer\LoginController@showLoginForm')->name('tracer.loginForm');
    Route::post('/login', 'Auth\ContactTracer\LoginController@login')->name('tracer.login');
    Route::get('register', 'Auth\ContactTracer\RegisterController@showRegister')->name('tracer.showRegister');
    Route::post('register', 'Auth\ContactTracer\RegisterController@create')->name('tracer.register');
    Route::post('/logout', 'Auth\ContactTracer\LoginController@logout')->name('tracer.logout');
});
Route::prefix('establishment')->group(function(){
    //ROOT
    Route::get('/', 'Establishment\EstablishmentController@index')->name('establishment');
    //AUTH
    Route::get('/login', 'Auth\Establishment\LoginController@showLoginForm')->name('establishment.loginForm');
    Route::post('/login', 'Auth\Establishment\LoginController@login')->name('establishment.login');
    Route::get('register', 'Auth\Establishment\RegisterController@showRegister')->name('establishment.showRegister');
    Route::post('register', 'Auth\Establishment\RegisterController@create')->name('establishment.register');
    Route::post('/logout', 'Auth\Establishment\LoginController@logout')->name('establishment.logout');
});

