<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;


Route::get('/', [GeneralController::class, 'home'])->name('home');
Route::get('/about-us', [GeneralController::class, 'about_us'])->name('about_us');
Route::get('/contact-us', [GeneralController::class, 'contact_us'])->name('contact_us');
Route::get('/privacy-policy', [GeneralController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-service', [GeneralController::class, 'terms_service'])->name('terms_service');
Route::get('/trust-safety', [GeneralController::class, 'trust_safety'])->name('trust_safety');
Route::get('/faq', [GeneralController::class, 'faq'])->name('faq');
Route::get('/fees-charges', [GeneralController::class, 'fees_charges'])->name('fees_charges');