<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/events_number', "Api\ApiController@get_events_number")->name("api_get_events_number");

Route::get('/top_pv_events', "Api\ApiController@get_events_by_pv")->name("api_get_events_by_pv");
