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
Route::get('after_login','EventController@show_index')->name('get_after_login');
Route::get("user_create", "UserController@create")->name("get_user_create");
Route::post("user_create", "UserController@send_verify_mail")->name("post_user_create");
Route::get("mail_confirm/{token}", "UserController@go_to_register")->name("get_mail_confirm");
Route::post('user_register',"UserController@register")->name("post_user_register");
Route::get('user_login','UserController@ready_to_login')->name('get_user_login');
Route::post('user_login','UserController@do_login')->name('post_user_login');
Route::get('user_logout','UserController@logout')->name('get_user_logout');


//仕様書:huang
Route::post('create_ticket','TicketController@create_ticket')->name('post_create_ticket')->middleware('auth:user');
Route::get('show_my_qrcode/{code}','TicketController@show_QRcode')->name('show_QRcode')->middleware('auth:user');
Route::get('show_comments/{event_id}','CommentController@show_comments')->name('show_comments')->middleware('auth:user');
Route::get('show_comments_cooper/{event_id}','CommentController@show_comments_cooper')->name('show_comments_cooper')->middleware('auth:cooperation');
Route::post('post_comment','CommentController@create_comment')->name('post_comment');

Route::get('user_tickets/{status?}','TicketController@show_user_tickets_page')->name('show_user_tickets_page')->middleware('auth:user');
Route::get("cooperation_register", "CooperationController@create")->name("get_cooperation_register");
Route::post("cooperation_register", "CooperationController@register")->name("post_cooperation_register");
Route::get("cancell_ticket/{id}","TicketController@cancell")->name("cancell_ticket");

//jin
//Route::get("event/all/{status?}", "EventController@events")->name("get_events")->middleware("auth:users");
Route::get("event/all/{status?}", "EventController@events")->name("get_events")->middleware('auth:user');
Route::get("event/find/{id}", "EventController@get_one_event")->name("get_one_event")->middleware('auth:user');
Route::get("coop_event/find/{id}", "EventController@get_one_event_of_cooperation")->name("get_one_event_of_cooperation")->middleware('auth:cooperation');
Route::get("event/myevents/{status?}", "EventController@events_cooperation")->name("get_events_cooperation")->middleware('auth:cooperation');
// tao
Route::get("register_event", "EventController@create")->name("make_event_create");
// Route::get("register_event", "EventController@create")->name("make_event_create")->middleware('auth:cooperation');
Route::post("register_event","EventController@create")->name("post_event_create")->middleware('auth:cooperation');
// Route::any('upload',"EventController@upload");
Route::get("show_index","EventController@show_index")->name("get_show_index")->middleware("auth:user");
Route::get("ticket_cancel/{id}","TicketController@ticket_cancel")->name("get_ticket_cancel")->middleware("auth:user");

// liang
Route::get('update_event/{id}', "EventController@updateevent")->name("get_event_update");
Route::post('update_event', "EventController@update")->name("post_event_update");
Route::get('cooper_login','CooperationController@ready_to_login')->name('get_cooperation_login');
Route::post('cooper_login','CooperationController@cooper_login')->name('post_cooperation_login');
Route::get('after_cooperlogin','CooperationController@show')->name('get_after_cooperlogin');
Route::get('cooper_logout','CooperationController@logout')->name('get_cooperation_logout');
Route::post('ticket_creat','TicketController@create')->name('post_ticket_create');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
