<?php


use App\Http\Controllers\Api\V1\SyllabuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->apiResource('syllabus', SyllabuController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

