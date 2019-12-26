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

// Rand
Route::get('/rand/words/{len}', 'RandController@getRandWords')->where('len', '\d+');
Route::get('/rand/images/{len}', 'RandController@getRandImages')->where('len', '\d+');

// Results
Route::get('results/numbers', 'ResultsController@getNumberResultsList');
Route::get('results/words', 'ResultsController@getWordsResultsList');
Route::get('results/images', 'ResultsController@getImagesResultsList');

Route::get('results/numbers/{id}', 'ResultsController@getNumbersResult')->where('id', '\d+');
Route::get('results/words/{id}', 'ResultsController@getWordsResult')->where('id', '\d+');
Route::get('results/images/{id}', 'ResultsController@getImagesResult')->where('id', '\d+');

Route::put('results/numbers', 'ResultsController@saveNumbersResult');
Route::put('results/words', 'ResultsController@saveWordsResult');
Route::put('results/images', 'ResultsController@saveImagesResult');
