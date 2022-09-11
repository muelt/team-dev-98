<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\TripDetailController;
use App\Http\Controllers\DashboardTripController;

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

/*Route::get('/', function () {
    return view('home',[
        'title' => 'Home',
        'active' => 'home'
    ]);
});*/
Route::get('/', [TripController::class, 'index']);

///////////////////////  TRIP CONTROLLER  /////////////////////////////////

Route::get('/trips', [TripController::class, 'index']);


Route::get('trips/{trip:slug}', [TripController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Trip Categories',
        'active' => 'categories',
        'categor' => Category::all()
    ]);
});


//////////////////// By Category :          /////////////////////////////////////

Route::get('/prefectures/{prefecture:slug}', function(Prefecture $prefecture) {
    return view('prefecture', [
        'title'         => $prefecture->name,
        'trips'         => $prefecture->trips,
        'prefecture'    => $prefecture->name
    ]);
});


//////////////////// By Category :          /////////////////////////////////////

Route::get('categories/{category:slug}', function(Category $category) {
    return view('category', [
        'title'         => "Trip By Category : $category->name",
        'active'        => 'categories',
        'trips'         => $category->trips,  //trips->load('category','author'),
        'category'      => $category->name
    ]);
});


Route::get('categories/{prefecture:slug}', function(Prefecture $prefecture) {
    return view('trips', [
        'title'         => "Trip By Prefecture : $prefecture->name",
        'active'        => 'categories',
        'trips'         => $prefecture->trips->load('prefecture','author'),
    ]);
});


//////////////////// By Author :          /////////////////////////////////////

Route::get('/authors/{author:name}', function(User $author) {
    
    return view('trips', [
        'title' => "Post By Author : $author->name",
        'trips' => $author->trips,
    ]);
});


///////////////////////  LOGIN CONTROLLER  ////////////////////////////////

Route::get('/login',[LoginController::class, 'index']);
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'store']);



///////////////////////  DASHBOARD CONTROLLER  ////////////////////////////

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleWare('auth');

Route::get('/dashboard/trips/checkSlug', [DashboardTripController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/trips', DashboardTripController::class)->middleware('auth'); /// <-logged in user only can access

Route::get('/dashboard/trips/tripdetails/{id}', [TripDetailController::class, 'create'])->middleWare('auth');
Route::post('/dashboard/trips/tripdetails/', [TripDetailController::class, 'store'])->middleWare('auth');



// Route::get('/trips/form', [App\Http\Controllers\TripController::class, 'form'])->name('form');
// Route::post('/trips/register', [App\Http\Controllers\TripController::class, 'register'])->name('register');
// Route::post('/trips/search', [App\Http\Controllers\TripController::class, 'search'])->name('search');
// Route::get('/trip/{id}', [App\Http\Controllers\TripDetailController::class, 'index'])->name('tripdetails');