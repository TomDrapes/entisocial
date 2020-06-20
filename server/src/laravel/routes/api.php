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

 /* Login */
Route::post('login', 'Api\AuthController@login');

/* Registration Routes */
Route::post('register', 'Auth\RegisterController@registerUser');
Route::get('verify', 'Auth\RegisterController@verifyUser');



//eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MGQ5M2JmYS0yYTkxLTQ4MjctYWQ2ZS0zOTkxM2U3ZTU2MWIiLCJqdGkiOiIwMDUyNzc2YTYzYzcxYzkyMzI3YjlkMGQ3ZTNlZWFiYjkyZjZlMGJjYmI4NTk0OGMzNjkwZjY1ODdlMGI0MDg5NmIwZWNhYTQ5ZjcyZjU3NiIsImlhdCI6MTU5MjYyNzI1MSwibmJmIjoxNTkyNjI3MjUxLCJleHAiOjE2MjQxNjMyNTEsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.g_0qmUnfihahHlDt3B60mUbiGTOwNMk1mQDaqBIewDbFtB_5jViJ1jWc3jprQSt85V5pa-ttjSTJu3ijgyK-UnGHFcMOW3H1njdOLLUlXXNAvxjlj4jzAmJIT1hNuC4pM858agFz-USQHxueS5P700gALsZX9Jl38JI3S0Z2BeBUKOM2cjJAezZRzsjWkuZ6HseOd54nu-5Iw4_GXx34ifAq0LxQEWxpwv1_eLNHgRpQ84ZJZfdE1_3gu4gH_kiYqzh09BuE0FgXbWs_A_MaG5lPlYkhhE6AhL0-yn2WvmNjX773QUpMK2I9mUvzsdJZ9MQnd8w8JPH1fzHe-61RPxxFEkobapnZ0J2BP9mi4QfaRD6iX7NRe1TPrm5edn6GxCHB9pbrAM3LCeJeceqOMq5ZeXP2NJH46WVew9o2Y2W9fRjcoymKsXQ-W3hbJZ-SXbrzR-5kN1iLn0A8lT84bfVWBxMET7RpA0aOCkY-SEg-eVMg2xHyZ9UPyYGOY8W-npkRO-JQM3_VhXrVl0kyWMH0ct9sX3Dqf4nlc02j_BugFQ4yx1TRVQdKtAUrWfi59bx27Q6RSLkL431Es_NiRzNvkxD2URlV64ZEi-2031j3kn9ffl6Ms0ruFuvc6_0bkdabuBbhL5qxRVjzhAbTnzxcpEe8LQWR_LJrzbGd1Dc
