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

// Numbers
Route::middleware('auth:api')->put('/words/results/save', 'NumbersController@addResult');

// Words
Route::get('words/rand/{len}', 'WordsController@getRand')->where('len', '\d+');
Route::middleware('auth:api')->put('/words/results/save', 'WordsController@saveResult');

// Images
Route::get('images/rand/{len}', 'ImagesController@getRand')->where('len', '\d+');
Route::middleware('auth:api')->put('/images/results/save', 'ImagesController@saveResult');