<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Login
Route::post('/login', [AuthController::class, 'login']);

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Products
Route::apiResource('/api-products', ProductController::class)->middleware('auth:sanctum');

//Category
Route::apiResource('/api-categories', CategoryController::class)->middleware('auth:sanctum');
