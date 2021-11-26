<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;

// Authentication
Route::get('/showlogin', [AuthController::class, 'showLogin'])
    ->name('login.show');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::get('home', function() {
    return view('home');
})->name('home');

Route::get('/', [RestaurantController::class, 'index'])
    -> name('restraunts.index');
