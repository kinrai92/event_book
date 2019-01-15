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
Route::get("user_create", "UserController@create")->name('get_user_create');
Route::post("user_create", "UserController@send_verify_mail")->name("post_user_create");
Route::get("mail_confirm/{token}", "UserController@go_to_register")->name("get_mail_confirm");
Route::post('user_register',"UserController@register")->name("post_user_register");
Route::get('user_login','UserController@ready_to_login')->name('get_user_login');
Route::post('user_login','UserController@do_login')->name('post_user_login');
Route::get('user_logout','UserController@logout')->name('get_user_logout');
Route::get('user_tickets','UserController@show_user_tickets_page')->name('show_user_tickets_page')->middleware('auth:user');
Route::get("cooperation_register", "CooperationController@create")->name("get_cooperation_register");
Route::post("cooperation_register", "CooperationController@register")->name("post_cooperation_register");

//jin
//Route::get("event/all/{status?}", "EventController@events")->name("get_events")->middleware("auth::users");
Route::get("event/all/{status?}", "EventController@events")->name("get_events")->middleware("auth:user");
Route::get("event/find/{id}", "EventController@get_one_event")->name("get_one_event");

// tao
Route::get("register_event", "EventController@create")->name("get_event_create");
Route::post("register_event","EventController@create")->name("post_event_create");
// Route::any('upload',"EventController@upload");

// liang
Route::get('updateevent/{id}', "EventController@updateevent")->name("get_event_update");
Route::post('updateevent', "EventController@update")->name("post_event_update");

//是否登陆，如果没有重定向回登陆页面
Route::get("user_create", "UserController@create");
Route::group(['middleware' => ['web','admin.login']],function(){
  Route::get("index",'EventController@event0');

});
//根据时间不同，跳转不同页面
Route::any('event0','EventController@event0');
Route::group(['middleware' =>['event']],function(){
  Route::any('event1',"EventController@event1");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
