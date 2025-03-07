<?php

use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/store-status', [StoreController::class, 'status']);
Route::get('/check-availability', [StoreController::class, 'checkAvailability']);
