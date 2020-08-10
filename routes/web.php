<?php

use App\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/','TestingController@index');
Route::get('/createuser','TestingController@create');

Route::view('/phone/form', 'phones');

Route::post('phones', 'TestingController@store');

Route::get('/create',function(){
    // $phone = factory(App\Phone::class)->create();
    $user = factory(App\User::class)->create();
    $phone =  $user->phone()->create([
        'name' => 'test'
    ]);

    return $phone;
});





