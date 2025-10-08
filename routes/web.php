<?php

use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VideoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\SyllabusController;
use Illuminate\Http\Request;


// Home Routes
Route::get('/', [HomeController::class, 'index']);
//Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/equipe', [TeamController::class, 'index'])->name('equipe');
Route::get('/contact', [HomeController::class, 'contacto'])->name('contact');
Route::get('/general-4', [HomeController::class, 'general'])->name('general-4');
Route::get('/lsfbgo', [HomeController::class, 'lsfbgo'])->name('lsfbgo');
Route::get('/telechargements-gratuits', [DownloadController::class, 'index'])->name('telechargements-gratuits');

// Redirecciones de URLs antiguas Wix (deben ir ANTES de las rutas dinámicas)
Route::get('ue1-themes/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes', 301));
Route::get('ue1-themes-1/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/je-me-presente', 301));
Route::get('ue1-themes-3/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/ma-famille', 301));
Route::get('ue1-themes-4/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/jhabite', 301));
Route::get('ue1-themes-5/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/je-me-deplace', 301));
Route::get('ue1-themes-6/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/quel-jour-sommes-nous', 301));
Route::get('ue1-themes-7/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/ma-routine', 301));
Route::get('ue1-themes-8/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/quel-temps-fait-il', 301));
Route::get('ue1-themes-9/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/chez-le-medecin', 301));
Route::get('ue1-themes-10/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/je-decouvre-mes-sentiments', 301));
Route::get('ue1-themes-11/a-bientôt', fn() => redirect()->away('https://cfls.be/ue1-themes/au-restaurant', 301));



// ⚠️ RUTAS RESTRINGIDAS PARA USUARIOS AUTENTICADOS
//Route::middleware([AuthOrUnderConstruction::class])->group(function () {
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
    Route::delete('/cart/clear', [BoutiqueController::class, 'clear'])->name('cart.clear');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [OrderController::class, 'commanders'])->name('order.list');
    Route::get('/facture/{order}', [OrderController::class, 'facture'])->name('order.facture');
//});



// Cloudinary (libre)
Route::get('/cloudinary/get-video', [VideoController::class, 'getAllVideos']);

// Syllabus Routes (librest)
//Route::middleware(['auth', 'single.session'])->group(function () {
Route::get('/syllabus', [SyllabusController::class, 'index'])->name('syllabus');
Route::get('/code-livre/{slug}', [SyllabusController::class, 'codelivre'])->name('code-livre');
Route::post('/code-livre/verify', [SyllabusController::class, 'store'])->name('code-livre.store');
Route::get('/{slug}', [SyllabusController::class, 'syllabu'])->name('syllabus.slug');
Route::get('/{slug}/{theme}', [SyllabusController::class, 'theme'])->name('syllabus.theme');
//});




Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Mark email as verified
    // Update user keyaccess to 1 after verification
    $user = $request->user();
    $user->update(['is_active' => 1]);
    return redirect()->to('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification link
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.confirmation');
