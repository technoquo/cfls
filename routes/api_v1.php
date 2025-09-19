<?php


use App\Http\Controllers\Api\V1\SyllabusController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->apiResource('syllabus', SyllabusController::class);
Route::middleware('auth:sanctum')->apiResource('users', UsersController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

