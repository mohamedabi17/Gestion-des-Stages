<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OffreDeStageController;
use Illuminate\Support\Facades\Auth;

// Define route for displaying the registration form
Route::get('/register', [RegisterController::class, 'create'])->name('register');

// Define route for handling the registration form submission
Route::post('/User/register', [RegisterController::class, 'store'])->name('register.store');


Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprise/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::get('/search/entreprise', [EntrepriseController::class, 'search'])->name('search.entreprise');


Route::get('/offers', [OffreDeStageController::class, 'index'])->name('offers.dashboard');
Route::post('/offers/create', [OffreDeStageController::class, 'create'])->name('offers.create');

Route::get('/offers/create', [OffreDeStageController::class, 'create'])->name('offers.create');
Route::post('/offers', [OffreDeStageController::class, 'store'])->name('offers.store');
Route::get('/offers/{offer}/edit', [OffreDeStageController::class, 'edit'])->name('offers.edit');
Route::get('/offers/offeroffers', [OffreDeStageController::class, 'search'])->name('offers.offer');

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
