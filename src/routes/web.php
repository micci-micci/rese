<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

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

// Restaurant datail
// ToDo レストランID を渡すようにする
Route::get('detail', [RestaurantController::class, 'detail'])
    -> name('restaurants.datail');
