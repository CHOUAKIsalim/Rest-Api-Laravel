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

Route::group(['middleware' => 'auth:api'], function(){
    Route::post("/threads/{thread}","MessageController@store");

    Route::get('getUser', 'AuthController@getUser');
    Route::post("/threads","ThreadController@store");
});


Route::apiResource("/threads","ThreadController")->only(['index', 'show']);

Route::post('login', 'AuthController@login');


Route::post('register', 'AuthController@register');

