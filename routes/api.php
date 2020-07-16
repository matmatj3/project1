<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('notification-user', 'NotificationController@registerNotificationUser');

Route::get('notifications', 'NotificationController@index')->middleware('auth:api');
Route::get('notifications/{id}', 'NotificationController@show')->middleware('auth:api');
Route::post('notifications', 'NotificationController@store')->middleware('auth:api');
Route::put('notifications/{id}', 'NotificationController@update')->middleware('auth:api');
Route::delete('notifications/{id}', 'NotificationController@delete')->middleware('auth:api');
Route::get('notifications/{user_id}/by-user/', 'NotificationController@findByUser')->middleware('auth:api');

Route::get('notifications/delete-all', 'NotificationController@deleteAll')->middleware('auth:api');
Route::get('create-test-users', 'NotificationController@createTestUsers')->middleware('auth:api');
Route::get('yelp-api', 'NotificationController@yelpApi');

