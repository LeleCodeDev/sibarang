<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('Auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('Admin.dashboard');
    })->name('Admin.Dashboard');

    Route::resource('/user', UserController::class);

    Route::resource('/item', ItemController::class);

    Route::resource('/category', CategoryController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

});
