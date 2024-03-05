<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\PiloteDePromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluerEntrepriseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OffreDeStageController;
use App\Http\Controllers\PossedeStageController;
use App\Http\Controllers\PromotionController;

Route::resource('competences', CompetenceController::class);
Route::resource('etudiants', EtudiantController::class);
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
