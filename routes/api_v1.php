<?php


use App\Http\Controllers\Api\V1\QuizController;
use App\Http\Controllers\Api\V1\SectionController;
use App\Http\Controllers\Api\V1\SyllabusController;
use App\Http\Controllers\Api\V1\ThemeController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->apiResource('syllabus', SyllabusController::class);
Route::middleware('auth:sanctum')->apiResource('users', UsersController::class);
Route::middleware('auth:sanctum')->apiResource('quiz', QuizController::class);
Route::middleware('auth:sanctum')->apiResource('sections', SectionController::class);
Route::middleware('auth:sanctum')->apiResource('themes', ThemeController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

