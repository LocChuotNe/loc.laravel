<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RentalController;
use App\Http\Controllers\Backend\OverdueController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\ImageController;

Route::middleware(['admin'])->group(function () {
    /* USER ROUTES */
    Route::get('/user/index', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);

    /* RENTAL ROUTES */
    Route::get('/rental/index', [RentalController::class, 'index']);

    /* OVERDUE ROUTES */
    Route::get('/overdue/index', [OverdueController::class, 'index']);

    /* BOOK ROUTES */
    Route::get('/book/index', [BookController::class, 'index']);

    /* IMAGE UPLOAD */
    Route::post('/upload', [ImageController::class, 'upload']);

    /* UPDATE AVATAR */
    Route::post('/users/{id}/update-avatar', [UserController::class, 'updateAvatar']);
});

/* AUTHENTICATION */
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
