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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('fleets/{type}', 'App\Http\Controllers\API\FleetController@index');
Route::group(['prefix' => 'fleet'], function () {
    Route::post('add', 'App\Http\Controllers\API\FleetController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\API\FleetController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\API\FleetController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\API\FleetController@delete');
});
Route::get('customers', 'App\Http\Controllers\API\CustomerController@index');
Route::group(['prefix' => 'customer'], function () {
    Route::post('add', 'App\Http\Controllers\API\CustomerController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\API\CustomerController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\API\CustomerController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\API\CustomerController@delete');
});

Route::get('orders/{type}', 'App\Http\Controllers\API\OrderController@index');
Route::get('home', 'App\Http\Controllers\API\HomeController@index');
