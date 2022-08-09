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

Route::get('/travellers', [App\Http\Controllers\TravellerController::class, 'index'])->name('travellers');
Route::get('/trip_details', [App\Http\Controllers\Trip_DetailController::class, 'index'])->name('trip_details');
Route::get('/trips', [App\Http\Controllers\TripController::class, 'index'])->name('trips');