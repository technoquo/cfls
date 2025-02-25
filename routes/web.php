<?php

use App\Http\Controllers\BoutiqueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FormationsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/formations', [FormationsController::class, 'index'])->name('formations.index');
Route::get('/formations/{slug}', [FormationsController::class, 'formations'])->name('formations.slug');
Route::get('/formations/{slug}/calendrier', [FormationsController::class, 'calendrier'])->name('calendrier');
Route::get('/formations/{slug}/calendrier/{formation}', [FormationsController::class, 'formation'])->name('formation');
Route::get('/formations/{slug}/courses', [FormationsController::class, 'courses'])->name('courses');
Route::get('/formations/{slug}/courses/{nivel}', [FormationsController::class, 'niveau'])->name('niveau');
Route::get('/formations/tableconverstation/{id}', [FormationsController::class, 'inscription'])->name('inscription');
Route::get('/equipe', [TeamController::class, 'index'])->name('equipe');
Route::get('/ressources/vue-sur-l-info-1', [ResourceController::class, 'index'])->name('ressources.videoinfo');
Route::get('/ressources/poemes-signes', [ResourceController::class, 'video'])->name('ressources.poemes-signes');
Route::get('/ressources/mots-croises', [ResourceController::class, 'mots'])->name('ressources.mots-croises');
Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique.index');
Route::get('/boutique/{slug}', [BoutiqueController::class, 'detail'])->name('boutique.detail');
Route::get('/checkout', [BoutiqueController::class, 'checkout'])->name('boutique.checkout');
Route::get('/contact', function() {
    return view('contact');
})->name('contact');

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
