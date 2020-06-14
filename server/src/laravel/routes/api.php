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

 Route::middleware('auth:api')->get('/user', static function (Request $request) {
    return $request->user();
 });

/* Registration Routes */
Route::post('register', 'Auth\RegisterController@registerUser');
Route::get('verify', 'Auth\RegisterController@verifyUser');

/* User Routes */
Route::get('users/{id}', 'UserController@getUser');
Route::post('users', 'UserController@createUser');
Route::put('users/{id}', 'UserController@updateUser');
Route::delete('users/{id}', 'UserController@deleteUser');

/* Cord Routes */
Route::get('cords', 'CordController@getAllCords');
Route::post('cords', 'CordController@createCord');
Route::get('cords/{cord}', 'CordController@getCord');
Route::put('cords/{cord}', 'CordController@updateCord');
Route::delete('cords/{cord}', 'CordController@deleteCord');
