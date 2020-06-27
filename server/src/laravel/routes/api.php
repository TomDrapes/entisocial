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

 Route::middleware('auth:api')->group(function() {
     /* User Routes */
     Route::get('user/{id}', 'UserController@getUser');
     Route::put('user/{id}', 'UserController@updateUser');
     Route::delete('user/{id}', 'UserController@deleteUser');

     /* Cord Routes */
     Route::get('cords', 'CordController@getAllCords');
     Route::post('cords', 'CordController@createCord');
     Route::get('cords/{cord}', 'CordController@getCord');
     Route::put('cords/{cord}', 'CordController@updateCord');
     Route::delete('cords/{cord}', 'CordController@deleteCord');
 });

 /* Public Auth Routes */
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@registerUser');
Route::get('verify', 'Api\AuthController@verifyUser');
