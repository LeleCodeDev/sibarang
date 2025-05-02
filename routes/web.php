<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

    Route::get('admin/items', function () {
        return view('Admin.items');
    })->name('Admin.Items');

    Route::get('admin/categories', function () {
        return view('Admin.categories');
    })->name('Admin.Categories');
});
