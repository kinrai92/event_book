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

Route::get('/tmp_register','UserController@tmpCreate')->name('tmp_user_create');
Route::post('/tmp_register','UserController@tmpCreate')->name('tmp_user_register');
Route::get('/register/{token}','UserController@verify')->name('get_user_create');
Route::post('/register/{token}','UserController@create')->name('post_user_create');
