<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Define routes for user registration
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Other routes for entreprise operations
Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprise/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::get('/search/entreprise', [EntrepriseController::class, 'search'])->name('search.entreprise');

// Define routes for the homepage
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Route for the authenticated user's home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Additional routes for Etudiant, PiloteDeStage, and Entreprise
Route::get('/etudiant', function () {
    return view('etudiant.dashboard');
})->name('etudiant.etudiant');

Route::get('/pilotedestage', function () {
    return view('pilotePromotion.dashboard');
})->name('pilotePromotion.pilote');

Route::get('/entreprise', function () {
    return view('entreprise.dashboard');
})->name('entreprise.dashboard');
