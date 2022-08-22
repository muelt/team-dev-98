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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/tripdetails', [App\Http\Controllers\TripDetailController::class, 'index'])->name('tripdetails');
Route::get('/trips/form', [App\Http\Controllers\TripController::class, 'form'])->name('form');
Route::post('/trips/register', [App\Http\Controllers\TripController::class, 'register'])->name('register');
Route::post('/trips/search', [App\Http\Controllers\TripController::class, 'search'])->name('search');

Route::get('/trips', [App\Http\Controllers\TripController::class, 'index'])->name('trips');

//旅のしおり詳細を表示
Route::get('/trip/{id}', [App\Http\Controllers\TripDetailController::class, 'index'])->name('tripdetails');