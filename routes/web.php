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
    return redirect()->route('system');
});

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('auth.login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('system.register');

// Route::post('/register', 'Auth\RegisterController');

// Route::post('/login', 'Auth\LoginController')->name('system.login');

Route::post('/logout', 'Auth\LoginController@logout')->name('system.logout');

Auth::routes();


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('system');

    Route::get('/persons', 'PersonsController@get')->name('system.persons');
    Route::get('/persons/create', 'PersonsController@create')->name('system.persons.create');
    Route::post('/persons/create', 'PersonsController@insert')->name('system.persons.insert');
    Route::get('/person/{id}', 'PersonsController@edit')->name('system.persons.edit');
    Route::get('/person/delete/{id}', 'PersonsController@delete')->name('system.persons.delete');
    Route::post('/person/update/{id}', 'PersonsController@update')->name('system.persons.update');
    
    
    Route::get('/teams', 'TeamsController@get')->name('system.teams');
    Route::get('/teams/create', 'TeamsController@create')->name('system.teams.create');
    Route::post('/teams/create', 'TeamsController@insert')->name('system.teams.insert');
    Route::get('/team/{id}', 'TeamsController@edit')->name('system.teams.edit');
    Route::get('/team/delete/{id}', 'TeamsController@delete')->name('system.teams.delete');
    Route::post('/team/update/{id}', 'TeamsController@update')->name('system.teams.update');
});