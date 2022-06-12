<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/fleet', function () {
    return view('fleet.index');
});
Route::get('/customers', function () {
    return view('customers.index');
});
Route::get('/orders', function () {
    return view('orders.index');
});
Route::get('/customers/{id}/edit', function () {
    return view('customers.edit');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fleet/{any}', function () {
    return view('layouts.layout');
})->where('any', '.*');

Route::get('/customers/{any}', function () {
    return view('layouts.layout');
})->where('any', '.*');
Route::get('/orders/{any}', function () {
    return view('layouts.layout');
})->where('any', '.*');

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/fleet-status/{id1}/{id2}', 'App\Http\Controllers\API\FleetController@status')->name('fleet.status');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Order',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('stacyanne01@gmail.com')->send(new \App\Mail\MyMail($details));
   
    dd("Email is Sent.");
});
