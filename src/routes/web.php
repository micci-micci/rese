<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;

// Register
Route::get('register', [RegisterController::class, 'showRegister'])
    -> name('register');
Route::post('thanks', [RegisterController::class, 'thanks'])
    -> name('thanks');

// Before login
Route::group(['middleware' => ['guest']], function() {
    Route::get('login', [AuthController::class, 'showLogin'])
        ->name('login.show');
    Route::post('login', [AuthController::class, 'login'])
        ->name('login');
    });

// After login
Route::group(['middleware' => ['auth']], function() {
    Route::get('home', function() {
        return view('home');
    })->name('home');
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/', [RestaurantController::class, 'index'])
    -> name('restaurants.index');

// Favorite
Route::post('favorite', [RestaurantController::class, 'favorite'])
    -> name('restaurants.favorite');

// Restaurant
Route::get('detail/{id}', [RestaurantController::class, 'detail'])
    -> name('restaurants.datail');
Route::post('reserve', [RestaurantController::class, 'reserve'])
    -> name('restaurants.reserve');
Route::get('done', [RestaurantController::class, 'done'])
    -> name('restaurants.done');

// MyPage
Route::get('mypage', [MypageController::class, 'mypage'])
    -> name('mypage');
Route::post('destroy', [MypageController::class, 'destroy'])
    -> name('mypage.destroy');

// Search
Route::post('/', [RestaurantController::class, 'search'])
    -> name('search');
