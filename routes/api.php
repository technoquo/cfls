<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\QuizController;
use App\Http\Controllers\Api\V1\SectionController;
use App\Http\Controllers\Api\V1\ThemeController;
use App\Http\Controllers\SyllabusController;
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

Route::prefix('v1')->group(function () {

    Route::get('/sections/{slug?}', [SectionController::class, 'index']);
    Route::get('/sections/show/{section}', [SectionController::class, 'show']);
    Route::post('/sections', [SectionController::class, 'store']);
    Route::get('/themes', [ThemeController::class, 'index']);
    Route::get('/themes/{theme}', [ThemeController::class, 'show']);
    Route::get('/questions', [QuizController::class, 'index']);
    Route::get('/questions/{slug}', [QuizController::class, 'show']);



});
