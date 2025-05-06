<?php

use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\SyllabusController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/equipe', [TeamController::class, 'index'])->name('equipe');
Route::get('/contact', [HomeController::class, 'contacto'])->name('contact');

Route::get('/formations', [FormationsController::class, 'index'])->name('formations.index');
Route::get('/formations/{slug}', [FormationsController::class, 'formations'])->name('formations.slug');
Route::get('/formations/{slug}/calendrier', [FormationsController::class, 'calendrier'])->name('calendrier');
//Route::get('/formations/{slug}/semain', [FormationsController::class, 'semain'])->name('semain');
Route::get('/formations/{slug}/calendrier/{formation}', [FormationsController::class, 'formation'])->name('formation');
Route::get('/formations/{slug}/courses', [FormationsController::class, 'courses'])->name('courses');
Route::get('/formations/{slug}/courses/{nivel}', [FormationsController::class, 'niveau'])->name('niveau');
Route::get('/formations/{slug}/{id}', [FormationsController::class, 'inscription'])->name('inscription');

Route::get('/ressources/{slug}', [ResourceController::class, 'index'])->name('ressources.slug');
Route::get('/ressources/{category}/{slug}', [ResourceController::class, 'vimeo'])->name('ressources.vimeo');

// Route::get('/ressources/mots-croises', [ResourceController::class, 'mots'])->name('ressources.mots-croises');
Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique.index');
Route::get('/boutique/{slug}', [BoutiqueController::class, 'detail'])->name('boutique.detail');
Route::post('/checkout', [BoutiqueController::class, 'checkout'])->name('boutique.checkout');
Route::get('/cloudinary/get-video', [VideoController::class, 'getAllVideos']);
Route::get('/syllabus', [SyllabusController::class, 'index'])->name('syllabus');
Route::get('/{slug}', [SyllabusController::class, 'syllabu'])->name('syllabus.slug');
Route::get('/{slug}/{theme}', [SyllabusController::class, 'theme'])->name('syllabus.theme');

Route::get('/ue1-themes/a-bientôt', [SyllabusController::class, 'index'])->name('a-bientot');











Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
