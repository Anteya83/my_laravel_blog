<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => '\App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout','AuthController@logout');
    Route::post('refresh','AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['namespace' => '\App\Http\Controllers\Article', 'middleware' => 'jwt.auth'], function (){
    Route::get('/articles', 'IndexController');
    Route::get('/articles/create', 'CreateController');
    Route::post('/articles', 'StoreController');
    Route::get('/articles/{article}', 'ShowController');
    Route::get('/articles/{article}/edit','EditController');
    Route::patch('/articles/{article}','UpdateController');
    Route::delete('/articles/{article}','DestroyController');
});
