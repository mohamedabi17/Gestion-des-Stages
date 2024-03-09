<?php
use App\Http\Controllers\PostuleStageController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OffreDeStageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Define route for displaying the registration form
Route::get('/register', [RegisterController::class, 'create'])->name('register');

// Define route for handling the registration form submission
Route::post('/User/register', [RegisterController::class, 'store'])->name('register.store');

// Routes for Entreprise
Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprise/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::get('/search/entreprise', [EntrepriseController::class, 'search'])->name('search.entreprise');

// Routes for OffreDeStageController
Route::get('/offers', [OffreDeStageController::class, 'index'])->name('offers.dashboard');
Route::get('/offers/{id}/showCandidates', [OffreDeStageController::class, 'showCandidates'])->name('offers.showCandidates');
Route::get('/offers/create', [OffreDeStageController::class, 'create'])->name('offers.create');
Route::post('/offers', [OffreDeStageController::class, 'store'])->name('offers.store');
Route::get('/offers/{id}/edit', [OffreDeStageController::class, 'edit'])->name('offers.edit');
Route::put('/offers/{id}', [OffreDeStageController::class, 'update'])->name('offers.update');
Route::delete('/offers/{id}', [OffreDeStageController::class, 'destroy'])->name('offers.destroy');


Route::get('/stageoffers', [OffreDeStageController::class, 'index'])->name('offers.stages');


Route::get('/stages', [OffreDeStageController::class, 'fetchStageOffers'])->name('stages');

Route::get('/candidates', [PostuleStageController::class, 'index'])->name('candidates.index');
Route::get('/candidates/create', [PostuleStageController::class, 'create'])->name('candidates.create');
Route::post('/candidates/store', [PostuleStageController::class, 'store'])->name('candidates.store');
Route::delete('/candidates/{postuleStage}', [PostuleStageController::class, 'destroy'])->name('candidates.destroy');


Route::get('/postuler/{id}', [PostuleStageController::class, 'indexpostuler'])->name('postuler.indexpostuler');
Route::post('/postuler/{id}', [PostuleStageController::class, 'storepostuler'])->name('postuler.storepostuler');



// Routes for Profile
// Route::get('/profile', [RegisterController::class, 'show'])->name('profile.show');
Route::get('/profile', [UserController::class, 'profile'])->name('profile.profile');

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

Route::get('/get-additional-fields/{userType}', [App\Http\Controllers\Auth\RegisterController::class, 'getAdditionalFields']);

// Routes for Admin
Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');


use App\Models\Entreprise;
use App\Models\Offers;

Route::get('/get-entreprise-data', function () {
    $entreprise = Entreprise::where('user_id', auth()->id())->first();
    return response()->json(['entreprise_id' => $entreprise->entreprise_id]);
});



Route::get('/get-offers', function () {
    // Retrieve the enterprise associated with the authenticated user
    $entreprise = Entreprise::where('user_id', auth()->id())->first();

    // Retrieve offers associated with the enterprise
    $offers = Offers::where('entreprise_id', $entreprise->entreprise_id)->get();

    // Return JSON response with offers and enterprise object
    return response()->json([
        'offers' => $offers,
        'entreprise' => $entreprise,
    ]);
});