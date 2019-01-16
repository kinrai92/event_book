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
// huang
Route::get('after_login','UserController@index')->name('get_after_login');
Route::get("user_create", "UserController@create")->name("get_user_create");
Route::post("user_create", "UserController@send_verify_mail")->name("post_user_create");
Route::get("mail_confirm/{token}", "UserController@go_to_register")->name("get_mail_confirm");
Route::post('user_register',"UserController@register")->name("post_user_register");
Route::get('user_login','UserController@ready_to_login')->name('get_user_login');
Route::post('user_login','UserController@do_login')->name('post_user_login');
Route::get('user_logout','UserController@logout')->name('get_user_logout');

Route::get('user_tickets/{status?}','TicketController@show_user_tickets_page')->name('show_user_tickets_page')->middleware('auth:user');
Route::get("cooperation_register", "CooperationController@create")->name("get_cooperation_register");
Route::post("cooperation_register", "CooperationController@register")->name("post_cooperation_register");

//jin
//Route::get("event/all/{status?}", "EventController@events")->name("get_events")->middleware("auth:users");
Route::get("event/all/{status?}", "EventController@events")->name("get_events")->middleware('auth:user');
Route::get("event/find/{id}", "EventController@get_one_event")->name("get_one_event")->middleware('auth:user');
Route::get("event/myevents/{status?}", "EventController@events_cooperation")->name("get_events_cooperation")->middleware('auth:cooperation');
Route::post("event/myevents/{status?}", "EventController@search_event_coop")->name("search_event_coop")->middleware('auth:cooperation');

// tao
Route::get("register_event", "EventController@create")->name("make_event_create");
// Route::get("register_event", "EventController@create")->name("make_event_create")->middleware('auth:cooperation');
Route::post("register_event","EventController@create")->name("post_event_create")->middleware('auth:cooperation');
// Route::any('upload',"EventController@upload");

// liang
Route::get('updateevent/{id}', "EventController@updateevent")->name("get_event_update");
Route::post('updateevent', "EventController@update")->name("post_event_update");
Route::get('cooper_login','CooperationController@ready_to_login')->name('get_cooperation_login');
Route::post('cooper_login','CooperationController@cooper_login')->name('post_cooperation_login');
Route::get('after_cooperlogin','CooperationController@index')->name('get_after_cooperlogin');
Route::get('cooper_logout','CooperationController@cooper_logout')->name('get_cooperation_logout');
Route::post('ticket_creat','TicketController@create')->name('post_ticket_create');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
