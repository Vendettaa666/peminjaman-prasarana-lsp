<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;

// Route::get('/', function () {
//     return view('');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});

