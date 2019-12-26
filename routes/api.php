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

Route::middleware(['auth:api', 'web'])->get('/user', function (Request $request) {
    return $request->user();
});

// Users
Route::get('/users', 'UsersController@getUsersList');
Route::get('/users/{username}', 'UsersController@getUser');

// Rand
Route::get('/rand/words/{len}', 'RandController@randWords')->where('len', '\d+');
Route::get('/rand/images/{len}', 'RandController@randImages')->where('len', '\d+');

// Results
Route::get('results/numbers/{id}', 'ResultsController@getNumbersResult');
Route::get('results/words/{id}', 'ResultsController@getWordsResult');
Route::get('results/images/{id}', 'ResultsController@getImagesResult');

Route::post('results/numbers/', 'ResultsController@getNumbersResultsList');
Route::post('results/words/', 'ResultsController@getWordsResultsList');
Route::post('results/images/', 'ResultsController@getImagesResultsList');

Route::put('results/numbers', 'ResultsController@saveNumbersResult');
Route::put('results/words', 'ResultsController@saveWordsResult');
Route::put('results/images', 'ResultsController@saveImagesResult');
