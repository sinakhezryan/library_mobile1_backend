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

Route::prefix('books')->group(function () {
    Route::get('read', 'App\Http\Controllers\Api\BookController@read');
    Route::post('create', 'App\Http\Controllers\Api\BookController@create');
    Route::put('update', 'App\Http\Controllers\Api\BookController@update');
    Route::post('distroy', 'App\Http\Controllers\Api\BookController@distroy');
});
