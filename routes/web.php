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
    return view('pages.home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('system.register');

Route::post('/register', 'Auth\RegisterController');

Route::post('/login', 'Auth\LoginController')->name('system.login');

Route::post('/logout', 'Auth\LoginController@logout')->name('system.logout');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');