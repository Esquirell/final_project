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

Route::get('doctors', 'ApiController@index');
Route::get('doctors/{doctor}', 'ArticleController@show');
Route::post('doctors', 'ApiController@store');
Route::put('doctors/{doctor}', 'ApiController@update');
Route::delete('doctors/{doctor}', 'ApiController@delete');

Route::post('register', 'Auth\RegisterController@apiRegister');
Route::post('login', 'Auth\LoginController@apiLogin');
Route::post('logout', 'Auth\LoginController@apiLogout');

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });



