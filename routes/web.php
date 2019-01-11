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
Route::get("user_create", "UserController@create")->name("get_user_create");
Route::post("user_create", "UserController@send_verify_mail")->name("post_user_create");
Route::get("mail_confirm/{token}", "UserController@go_to_register")->name("get_mail_confirm");
Route::post('user_register',"UserController@register")->name("post_user_register");

<<<<<<< HEAD
Route::get("cooperation_register", "CooperationController@create")->name("get_cooperation_register");
Route::post("cooperation_register", "CooperationController@register")->name("post_cooperation_register");
=======
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tmp_register','UserController@tmpCreate')->name('tmp_user_create');
Route::post('/tmp_register','UserController@tmpCreate')->name('tmp_user_register');
Route::get('/register/{token}','UserController@verify')->name('get_user_create');
Route::post('/register/{token}','UserController@create')->name('post_user_create');
>>>>>>> fbd0712be3bcde095dcacc91d2547954b59b6817
