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
Route::get("mailcreate", "UserController@create")->name("get_mail_create");
Route::post("mailcreate", "UserController@sendmail")->name("post_mail_create");
Route::get("mail/confirm/{token}", "UserController@mail_confirm")->name("get_mail_confirm");
Route::post("register_user","UserController@register")->name("post_user_create");

Route::get("event/all/{status?}", "EventController@events")->name("get_events");

Route::get("event/find/{id}", "EventController@oneevent")->name("get_one_event");
