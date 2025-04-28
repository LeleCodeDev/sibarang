<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function() {
    return view('Auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
// iuhuhuhiuh