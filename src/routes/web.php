<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;

// Before login
Route::group(['middleware' => ['guest']], function() {
    Route::get('/', [AuthController::class, 'showLogin'])
        ->name('login.show');
    Route::post('login', [AuthController::class, 'login'])
        ->name('login');
});

// After login
Route::group(['middleware' => ['auth']], function() {
    Route::get('home', function() {
        return view('home');
    })->name('home');
});

// Route::get('/', [RestaurantController::class, 'index'])
//     -> name('restraunts.index');
