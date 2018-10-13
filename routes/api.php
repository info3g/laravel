<?php

use Illuminate\Http\Request;

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
// Get all data list
Route::get('newsList/{pageNumber?}','NewsController@getNewsList');

// Get specific data
Route::get('news/{id}','NewsController@getNews');

// create new task
Route::post('news','NewsController@addNews');

// update existing task
Route::put('news','NewsController@addNews');

// delete a task
Route::delete('news/{id}','NewsController@deleteNews');