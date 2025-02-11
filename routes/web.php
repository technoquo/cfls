<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FormationsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/formations', [FormationsController::class, 'index'])->name('formations.index');
Route::get('/ressources/vue-sur-l-info-1', [ResourceController::class, 'index'])->name('ressources.videoinfo');
Route::get('/ressources/poemes-signes', [ResourceController::class, 'video'])->name('ressources.poemes-signes');
Route::get('/ressources/mots-croises', [ResourceController::class, 'mots'])->name('ressources.mots-croises');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
