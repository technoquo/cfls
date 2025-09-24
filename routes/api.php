<?php

use App\Http\Controllers\Api\AuthController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
        Route::get('auth/user', [AuthController::class, 'user']);
        Route::post('auth/logout', [AuthController::class, 'logout']);
});



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product/{id}', function ($id) {
    return Product::with(['images', 'options'])->findOrFail($id);
});
