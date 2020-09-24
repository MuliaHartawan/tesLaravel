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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('me', 'Api\UserController@me')->middleware('auth:api');
Route::post('dataaset', 'Api\DataasetController@store')->middleware('auth:api');
Route::get('dataaset', 'Api\DataasetController@index')->middleware('auth:api');
Route::get('dataaset/{id}', 'Api\DataasetController@show')->middleware('auth:api');
Route::put('dataaset/{dataaset}', 'Api\DataasetController@update')->middleware('auth:api');
Route::delete('dataaset/{id}', 'Api\DataasetController@delete')->middleware('auth:api');

