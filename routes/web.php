<?php

use App\Models\InputAspirasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InputAspirasiController;

Route::get('/', function () {
    return view('dashboard.auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('/create', [KategoriController::class, 'create'])->name('create');
        Route::post('/store', [KategoriController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit');
        Route::get('/{id}', [KategoriController::class, 'show'])->name('show');
        Route::patch('/{id}', [KategoriController::class, 'update'])->name('update');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('input_aspirasi')->name('input_aspirasi.')->group(function () {
        Route::get('/', [InputAspirasiController::class, 'index'])->name('index');
        Route::get('/create', [InputAspirasiController::class, 'create'])->name('create');
        Route::post('/store', [InputAspirasiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [InputAspirasiController::class, 'edit'])->name('edit');
        Route::get('/{id}', [InputAspirasiController::class, 'show'])->name('show');
        Route::patch('/{id}', [InputAspirasiController::class, 'update'])->name('update');
        Route::put('/{id}', [InputAspirasiController::class, 'update'])->name('update');
        Route::delete('/{id}', [InputAspirasiController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('aspirasi')->name('aspirasi.')->group(function () {
        Route::get('/', [AspirasiController::class, 'index'])->name('index');
        Route::get('/create', [AspirasiController::class, 'create'])->name('create');
        Route::post('/store', [AspirasiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AspirasiController::class, 'edit'])->name('edit');
        Route::get('/{id}', [AspirasiController::class, 'show'])->name('show');
        Route::patch('/{id}', [AspirasiController::class, 'update'])->name('update');
        Route::put('/{id}', [AspirasiController::class, 'update'])->name('update');
        Route::delete('/{id}', [AspirasiController::class, 'destroy'])->name('destroy');
    });
});
