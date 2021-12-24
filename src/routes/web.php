<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;

// Register
Route::get('register', [AuthController::class, 'showRegister'])
    -> name('register');
Route::post('thanks', [AuthController::class, 'thanks'])
    -> name('thanks');

// Before login
Route::group(['middleware' => ['guest']], function() {
    Route::get('login', [AuthController::class, 'showLogin'])
        -> name('login.show');
    Route::post('login', [AuthController::class, 'login'])
        -> name('login');
});

// After login
Route::group(['middleware' => ['auth']], function() {
    Route::post('logout', [AuthController::class, 'logout'])
        -> name('logout');
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
    -> name('restaurants.reserve')
    -> middleware('auth');
Route::get('done', [RestaurantController::class, 'done'])
    -> name('restaurants.done');

// MyPage
Route::group(['middleware' => ['auth']], function() {
    Route::get('mypage', [MypageController::class, 'mypage'])
        -> name('mypage');
    Route::post('update', [MypageController::class, 'update'])
        -> name('mypage.update');
    Route::post('destroy', [MypageController::class, 'destroy'])
        -> name('mypage.destroy');
    Route::post('review', [MypageController::class, 'review'])
        -> name('mypage.review');
    // Route::get('m', [MypageController::class, 'done'])
    //     -> name('mypage.done');
});



// Search
Route::post('/', [RestaurantController::class, 'search'])
    -> name('search');

// Admin
Route::get('/admin', function () {
    return view('manegement.admin');
});
