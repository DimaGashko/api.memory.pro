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

// Auth
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/register-and-login', 'AuthController@registerAndLogin');

Route::middleware('auth:api')->get('/logout', 'AuthController@logout');

// Words
Route::get('words/{len}', 'WordsController@getRand')->where('len', '\d+');

// Images
Route::get('images/{len}', 'ImagesController@getRand')->where('len', '\d+');