<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RentalController;
use App\Http\Controllers\Backend\OverdueController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

/* BACKEND ROUTES */
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    /* USER ROUTES */
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');

    /* RENTAL ROUTES */
    Route::get('rental/index', [RentalController::class, 'index'])->name('rental.index');

    /* OVERDUE ROUTES */
    Route::get('overdue/index', [OverdueController::class, 'index'])->name('overdue.index');

    /* BOOK ROUTES */
    Route::get('book/index', [BookController::class, 'index'])->name('book.index');

    /* IMAGE UPLOAD */
    Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');
});

/* AUTHENTICATION */
Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
