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










Route::get('/', function () {
    return view('welcome');
});
Route::get('usermail', function () {
    return view('userlogin.usermail');
});
Route::get('checkmail', function () {
    return view('userlogin.checkmail');
});
Route::get('index', function () {
    return view('index.index');
});
Route::get('succeed', function () {
    return view('userlogin.succeed');
});
Route::get('apply', function () {
    return view('userlogin.apply');
});
Route::get('newevent', function () {
    return view('cooperation.newevent');
});
