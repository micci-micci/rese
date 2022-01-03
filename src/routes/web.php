<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TestMailController;

Auth::routes(['verify' => true]);

Route::get('mail', [TestMailController::class, 'index']);

// Mail authentication
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

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
Route::get('restaurant_search', [RestaurantController::class, 'restaurantSearch'])
    -> name('restaurants.search');

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
});

// Search
Route::post('/', [RestaurantController::class, 'search'])
    -> name('search');

// Admin
Route::group(['middleware' => ['auth', 'can:isAdmin']], function() {
    Route::get('admin', [AdminController::class, 'show'])
        -> name('admin');
    Route::post('admin/update', [AdminController::class, 'update'])
        -> name('admin.update');
    Route::post('admin/destroy', [AdminController::class, 'destroy'])
        -> name('admin.destroy');
});

// Owner
Route::group(['middleware' => ['auth', 'can:isOwner']], function() {
    Route::get('owner', [OwnerController::class, 'show'])
        -> name('owner');
    Route::post('owner/create', [OwnerController::class, 'create'])
        -> name('owner.create');
    Route::post('owner/update', [OwnerController::class, 'update'])
        -> name('owner.update');
    Route::post('owner/destroy', [OwnerController::class, 'destroy'])
        -> name('owner.destroy');
    Route::get('owner/reservation', [OwnerController::class, 'reservation'])
        -> name('owner.reservation');
});
