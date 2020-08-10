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

Route::get('users','TestingController@create');
Route::get('phones','TestingController@show');
Route::post('phones','TestingController@store');
Route::put('phones/{phone}','TestingController@update');
Route::delete('phones/{phone}', 'TestingController@destroy');



