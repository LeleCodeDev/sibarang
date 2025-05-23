<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowRequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Models\BorrowRequest;

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::middleware('guest')->group(function () {
  Route::get('/login', function () {
    return view('Auth.login');
  })->name('login');

  Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
  Route::middleware('role:admin')->group(function () {
    Route::get('admin/dashboard', function () {
      return view('Admin.dashboard');
    })->name('Admin.Dashboard');

    Route::resource('/user', UserController::class);

    Route::resource('/item', ItemController::class);

    Route::resource('/category', CategoryController::class);
  });

  Route::middleware('role:operator')->group(function() {
    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::resource('/borrow-request', BorrowRequestController::class);
    Route::put('/borrow-request/{id}/approve', [BorrowRequestController::class, 'approve'])->name('borrow-request.approve');
    Route::put('/borrow-request/{id}/reject', [BorrowRequestController::class, 'reject'])->name('borrow-request.reject');
  });

  Route::post('/logout', [AuthController::class, 'logout']);
});
