<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('log.login');
});
Route::get('/order', [OrderController::class, 'orderView'])->name('order.get');
Route::post('/order', [OrderController::class, 'orderInput'])->name('order.input');
Route::get('/approvePut/{id}', [OrderController::class,'approved'])->name('approve.put');
Route::post('/login', [UserController::class, 'loginView'])->name('login.process');
Route::get('/approve', [OrderController::class, 'indexView'])->name('approve.index');


