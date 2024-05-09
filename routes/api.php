<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UsageHistories;

// Users Controller
Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Orders Controller
Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::post('/orders', 'store');
    Route::get('/orders/{id}', 'show');
    Route::patch('/orders/{id}', 'update');
    Route::delete('/orders/{id}', 'destroy');
});

// Vehicle Controller
Route::controller(VehicleController::class)->group(function () {
    Route::get('/vehicles', 'index');
    Route::post('/vehicles', 'store');
    Route::get('/vehicles/{id}', 'show');
    Route::patch('/vehicles/{id}', 'update');
    Route::delete('/vehicles/{id}', 'destroy');
});

// UsageHistories Controller
Route::controller(UsageHistories::class)->group(function () {
    Route::get('/usageHistories', 'index');
    Route::post('/usageHistories', 'store');
    Route::get('/usageHistories/{id}', 'show');
    Route::patch('/usageHistories/{id}', 'update');
    Route::delete('/usageHistories/{id}', 'destroy');
});