<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\DictionaryController;
use App\Http\Controllers\Api\V1\PlanController;
use App\Http\Controllers\Api\V1\QuizController;
use App\Http\Controllers\Api\V1\QuizResultController;
use App\Http\Controllers\Api\V1\SectionController;
use App\Http\Controllers\Api\V1\SpellingController;
use App\Http\Controllers\Api\V1\SubscriptionController;
use App\Http\Controllers\Api\V1\ThemeController;
use App\Http\Controllers\SyllabusController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword' ]);
Route::middleware('auth:sanctum')->group(function () {
        Route::get('auth/user', [AuthController::class, 'user']);
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::put('/auth/profile', [AuthController::class, 'updateProfile' ]);
        Route::put('/auth/password', [AuthController::class, 'updatePassword' ]);

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
    Route::get('/themes/{theme}/{slug}', [ThemeController::class, 'theme']);
    Route::get('/themes/{theme}/{slug}/{id}', [ThemeController::class, 'video']);
    Route::get('/spellings', [SpellingController::class, 'index']);
    Route::get('/questions', [QuizController::class, 'index']);
    Route::get('/questions/{slug}', [QuizController::class, 'show']);
    Route::get('/dictionnaire', [DictionaryController::class, 'index']);
    Route::get('/dictionnaire/{id}', [DictionaryController::class, 'show']);
    Route::post('/quiz-results', [QuizResultController::class, 'store']);
    Route::get('/quiz-results/{user_id}', [QuizResultController::class, 'show']);
    Route::get('/quiz-results/{user_id}/daily', [QuizResultController::class, 'participationDays']);
    Route::get('/quiz-results/{user_id}/total', [QuizResultController::class, 'total']);
    Route::get('/quiz-results/ranking/daily', [QuizResultController::class, 'rankingDaily']);
    Route::get('/quiz-results/ranking/total', [QuizResultController::class, 'rankingTotal']);
    Route::get('/plans', [PlanController::class, 'index']);
    Route::get('/plans/{id}', [PlanController::class, 'show']);
    Route::post('/subscriptions', [SubscriptionController::class, 'store']);







});
