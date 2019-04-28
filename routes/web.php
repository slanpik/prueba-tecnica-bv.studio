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
    return view('welcome');
});

Route::group(['namespace' => 'User'], function() {

    Route::get('/show', 'UserController@showAllUsers')->name('user.showAllUsers');
    Route::get('/create', 'UserController@createUser')->name('user.createUser');
    Route::post('/save', 'UserController@storeUser')->name('user.save');
  
  });