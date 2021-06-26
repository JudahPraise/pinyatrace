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



Route::get('/establishment', 'Establishment\EstablishmentController@index')->name('establishment');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLogIn')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegister')->name('register');

Route::prefix('tracer')->group(function(){
    //ROOT
    Route::get('/', 'ContactTracer\ContactTracerController@index')->name('tracer');

    //AUTH
    Route::get('/login', 'Auth\ContactTracer\LoginController@showLoginForm')->name('tracer.login');
    Route::post('/logout', 'Auth\ContactTracer\LoginController@logout')->name('tracer.logout');
});

