<?php

use App\Http\Middleware\AuthOrUnderConstruction;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\SyllabusController;

// Home Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/equipe', [TeamController::class, 'index'])->name('equipe');
Route::get('/contact', [HomeController::class, 'contacto'])->name('contact');
Route::get('/general-4', [HomeController::class, 'general'])->name('general-4');
Route::get('/telechargements-gratuits', [DownloadController::class, 'index'])->name('telechargements-gratuits');



// ⚠️ RUTAS RESTRINGIDAS PARA USUARIOS AUTENTICADOS
Route::middleware([AuthOrUnderConstruction::class])->group(function () {
    // Formations Routes
    Route::get('/formations', [FormationsController::class, 'index'])->name('formations.index');
    Route::get('/formations/{slug}', [FormationsController::class, 'formations'])->name('formations.slug');
    Route::get('/formations/{slug}/calendrier', [FormationsController::class, 'calendrier'])->name('calendrier');
    Route::get('/formations/{slug}/calendrier/{formation}', [FormationsController::class, 'formation'])->name('formation');
    Route::post('/formations/{id}', [FormationsController::class, 'inscrits'])->name('inscription.formation');
    Route::post('/tabledeconversation', [FormationsController::class, 'tabledeconversation'])->name('inscription.tabledeconversation');
    Route::get('/formations/{slug}/courses', [FormationsController::class, 'courses'])->name('courses');
    Route::get('/formations/{slug}/courses/{nivel}', [FormationsController::class, 'niveau'])->name('niveau');
    Route::get('/formations/{slug}/{id}', [FormationsController::class, 'inscription'])->name('inscription');

    // Resource Routes
    Route::get('/ressources/{slug}', [ResourceController::class, 'index'])->name('ressources.slug');
    Route::get('/ressources/{category}/{slug}', [ResourceController::class, 'vimeo'])->name('ressources.vimeo');

    // Boutique Routes
    Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique.index');
    Route::get('/boutique/{slug}', [BoutiqueController::class, 'detail'])->name('boutique.detail');
    Route::post('/checkout', [BoutiqueController::class, 'checkout'])->name('boutique.checkout');
    Route::post('/cart/clear', [BoutiqueController::class, 'clear'])->name('cart.clear');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/facture/{order}', [OrderController::class, 'facture'])->name('order.facture');
});

// Cloudinary (libre)
Route::get('/cloudinary/get-video', [VideoController::class, 'getAllVideos']);

// Syllabus Routes (librest)
Route::get('/syllabus', [SyllabusController::class, 'index'])->name('syllabus');
Route::get('/{slug}', [SyllabusController::class, 'syllabu'])->name('syllabus.slug');
Route::get('/{slug}/{theme}', [SyllabusController::class, 'theme'])->name('syllabus.theme');

// Jetstream dashboard (autenticación nativa)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
