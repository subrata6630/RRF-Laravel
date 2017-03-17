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

Route::name('home')->get('/', 'HomeController@viewWelcome');

Route::name('register')->get('/register', 'HomeController@viewRegisterForm');

Route::name('login')->get('/login', 'HomeController@viewLoginForm');
