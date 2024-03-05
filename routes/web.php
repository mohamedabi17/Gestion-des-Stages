<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiloteDePromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluerEntrepriseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OffreDeStageController;
use App\Http\Controllers\PossedeStageController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Auth;


Route::resource('competences', CompetenceController::class);

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');



Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index');
Route::get('/competences/create', [CompetenceController::class, 'create'])->name('competences.create');
Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
Route::get('/competences/{competence}', [CompetenceController::class, 'show'])->name('competences.show');
Route::get('/competences/{competence}/edit', [CompetenceController::class, 'edit'])->name('competences.edit');
Route::put('/competences/{competence}', [CompetenceController::class, 'update'])->name('competences.update');
Route::delete('/competences/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');



Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index');
Route::get('/competences/create', [CompetenceController::class, 'create'])->name('competences.create');
Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
Route::get('/competences/{competence}', [CompetenceController::class, 'show'])->name('competences.show');
Route::get('/competences/{competence}/edit', [CompetenceController::class, 'edit'])->name('competences.edit');
Route::put('/competences/{competence}', [CompetenceController::class, 'update'])->name('competences.update');
Route::delete('/competences/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');


Route::resource('evaluer_entreprises', EvaluerEntrepriseController::class);
Route::resource('locations', LocationController::class);
Route::resource('offre_de_stages', OffreDeStageController::class);
Route::resource('pilote_de_promotions', PiloteDePromotionController::class);
Route::resource('possede_stages', PossedeStageController::class);
Route::resource('promotions', PromotionController::class);

Route::get('/pilotes', [PiloteDePromotionController::class, 'index'])->name('pilotes.index');
Route::get('/pilotes/create', [PiloteDePromotionController::class, 'create'])->name('pilotes.create');
Route::post('/pilotes', [PiloteDePromotionController::class, 'store'])->name('pilotes.store');
Route::get('/pilotes/{pilote}', [PiloteDePromotionController::class, 'show'])->name('pilotes.show');
Route::get('/pilotes/{pilote}/edit', [PiloteDePromotionController::class, 'edit'])->name('pilotes.edit');
Route::put('/pilotes/{pilote}', [PiloteDePromotionController::class, 'update'])->name('pilotes.update');
Route::delete('/pilotes/{pilote}', [PiloteDePromotionController::class, 'destroy'])->name('pilotes.destroy');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Define other CRUD routes here

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
