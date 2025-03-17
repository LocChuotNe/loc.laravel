<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RentalController;
use App\Http\Controllers\Backend\OverdueController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\ImageController;
use App\Http\Middleware\AdminAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
});

/* BACKEND ROUTES */
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('admin');


/* USER ROUTES */
Route::get('user/index', [UserController::class, 'index'])->name('user.index')->middleware('admin');

/* RENTAL ROUTES/Done */
Route::get('rental/index', [RentalController::class, 'index'])->name('rental.index')->middleware('admin');

/* OVERDUE ROUTES */
Route::get('overdue/index', [OverdueController::class, 'index'])->name('overdue.index')->middleware('admin');

/* BOOK ROUTES/Done */
Route::get('book/index', [BookController::class, 'index'])->name('book.index')->middleware('admin');

/* Image*/
Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload')->middleware('admin');

Route::post('/users/{id}/update-avatar', [UserController::class, 'updateAvatar'])->name('users.updateAvatar');

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
