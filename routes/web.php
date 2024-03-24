<?php
use App\Http\Controllers\PostuleStageController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OffreDeStageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PiloteDePromotionController;
use App\Models\Admins;
use App\Models\Entreprise;
use App\Models\Offers;
use App\Models\Etudiant;
use App\Models\PiloteDePromotion;
use App\Models\Promotion;

Route::get('/download-cv/{candidate}', [PostuleStageController::class, 'showCV'])->name('cv');


Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');



Route::get('/search/pilotes', [PiloteDePromotionController::class, 'search'])->name('search.pilotes');




Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/pilotes/{pilote}/edit', [PiloteDePromotion::class, 'edit'])->name('pilotes.edit');
Route::get('/pilotes/create', [PiloteDePromotion::class, 'create'])->name('pilotes.create');
Route::delete('/pilotes/{pilote}', [PiloteDePromotion::class, 'destroy'])->name('pilotes.destroy');



// Routes for Admin
Route::get('/admin/etudiants', [AdminController::class, 'etudiants'])->name('admins.etudiants');
Route::get('/admin/pilotes', [AdminController::class, 'pilotes'])->name('admins.pilotes');
Route::get('/admin/entreprises', [AdminController::class, 'entreprises'])->name('admins.entreprises');
Route::get('/admin/admins', [AdminController::class, 'all'])->name('admins.admins');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admins.users');


// Define route for displaying the registration form
Route::get('/register', [RegisterController::class, 'create'])->name('register');

// Define route for handling the registration form submission
Route::post('/User/register', [RegisterController::class, 'store'])->name('register.store');

// Routes for Entreprise

Route::put('/entreprises/{id}', [EntrepriseController::class, 'update'])->name('entreprise.update');
Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
// Route::get('/entreprise/{id}', [EntrepriseController::class, 'create'])->name('entreprise.create');
// Route::get('/entreprise/store', [EntrepriseController::class, 'store'])->name('entreprise.store');
// Route::get('/entreprises/{id}/fiche', [EntrepriseController::class, 'preview'])->name('entreprise.fiche');

// Route::get('/entreprises/{user_id}/fiche', function ($user_id) {
//     // Fetch the entreprise_id based on the user_id
//     $entreprise_id = Entreprise::where('user_id', $user_id)->value('entreprise_id');

//     // If entreprise_id is found, redirect to the fiche route with the entreprise_id
//     if ($entreprise_id) {
//         return redirect()->route('entreprise.fiche', ['id' => $entreprise_id]);
//     } else {
//         // Handle the case where entreprise_id is not found
//         return response()->json(['error' => 'Entreprise not found'], 404);
//     }
// });
Route::get('/entreprises/{id}/getfiche', [EntrepriseController::class, 'preview'])->name('entreprise.fiche');
Route::get('/entreprises/{id}', [EntrepriseController::class, 'show'])->name('entreprise.show');



Route::get('/entreprises/{entreprise_id}/fiche', function ($entreprise_id) {
    // Fetch the entreprise_id based on the user_id
    $entreprise = Entreprise::where('entreprise_id', $entreprise_id)->first();

    // If entreprise is found, redirect to the fiche route with the entreprise_id
    if ($entreprise) {
        return redirect()->route('entreprise.fiche', ['id' => $entreprise->entreprise_id]);
    } else {
        // Handle the case where entreprise is not found
        return response()->json(['error' => 'Entreprise not found'], 404);
    }
});
Route::get('/entreprises', [EntrepriseController::class, 'index'])->name('entreprise.index');
Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprise/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::get('/search/offres-stage', [OffreDeStageController::class, 'search'])->name('search.offres-stage');

Route::get('/search/entreprise', [EntrepriseController::class, 'search'])->name('search.entreprise');



// Routes for OffreDeStageController
// Route::get('/offersentreprise{id}', [OffreDeStageController::class, 'fetchStageOffersByEntreprise'])->name('offers.index.dashboard');
Route::get('/offers/{id}/candidates', [PostuleStageController::class, 'show'])->name('offers.show');
Route::get('/offers/{id}/showCandidates', [OffreDeStageController::class, 'show'])->name('offers.showCandidates');
// Route::get('/offers/{id}/showCandidates', [OffreDeStageController::class, 'show'])->name('offers.show');

Route::get('/offers/create/{id}', [OffreDeStageController::class, 'create'])->name('offers.create');
Route::post('/offers', [OffreDeStageController::class, 'store'])->name('offers.store');
Route::get('/offers/{id}/edit', [OffreDeStageController::class, 'edit'])->name('offers.edit');
Route::put('/offers/{id}', [OffreDeStageController::class, 'update'])->name('offers.update');
Route::delete('/offers/{id}', [OffreDeStageController::class, 'destroy'])->name('offers.destroy');
Route::get('/offers/statistics', [OffreDeStageController::class, 'statistics'])->name('offers.stat');


Route::get('/stageoffers', [OffreDeStageController::class, 'index'])->name('offers.stages');


Route::get('/stages', [OffreDeStageController::class, 'fetchStageOffers'])->name('stages');
Route::get('/entreprises/{id}/stages', [OffreDeStageController::class, 'fetchStageOffersByEntreprise'])->name('stages.by.entreprise');

Route::get('/get-offers-by-entreprise/{id}', function ($id) {
    // Retrieve offers associated with the enterprise
    $offers = Offers::where('entreprise_id', $id)->get(); // Assuming 'id' is the primary key of the Enterprise model

    // Assuming you have retrieved the entreprise object using some method
    $entreprise = Entreprise::findOrFail($id);

    // Return to the view with offers and enterprise object
    return view('offers.entrepriseOffers', compact('offers', 'entreprise'));
});


Route::get('/get-all-offers', function () {

    $offers = Offers::all();

    // Return to the view with offers and enterprise object
    return (compact('offers'));
});


// Route::get('/offers/{id}/showCandidates', [PostuleStageController::class, 'show'])->name('offers.candidates');
Route::get('/candidates/create', [PostuleStageController::class, 'create'])->name('candidates.create');
Route::post('/candidates/store', [PostuleStageController::class, 'store'])->name('candidates.store');
Route::delete('/candidates/{postuleStage}', [PostuleStageController::class, 'destroy'])->name('candidates.destroy');


Route::get('/postuler/{id}/candidates', [PostuleStageController::class, 'indexpostuler'])->name('postuler.indexpostuler');
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

// Route::get('/pilotedestage', function () {
//     return view('pilotePromotion.dashboard');
// })->name('pilotePromotion.pilote');

Route::get('/pilotedestage', function () {
    return view('pilotePromotion.dashboard');
})->name('pilotePromotion.dashboard');


Route::get('/pilotefiche', function () {
    return view('pilotePromotion.preview');
})->name('pilotePromotion.preview');


// Route::get('/entreprise', function () {
//     return view('entreprise.dashboard');
// })->name('entreprise.dashboard');

Route::get('/get-additional-fields/{userType}', [App\Http\Controllers\Auth\RegisterController::class, 'getAdditionalFields']);




Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');


Route::put('/updatepilote', [PiloteDePromotion::class, 'update'])->name('pilote.update');



Route::get('/pilote', [PiloteDePromotion::class, 'fetchPilote'])->name('pilote.fetch');


// Route to fetch promotions
Route::get('/getpromotions', [PromotionController::class, 'getPromotions'])->name('promotions.preview');

Route::get('/get-entreprise-data/{entreprise_id}', function ($entreprise_id) {
    $entreprise = Entreprise::where('entreprise_id', $entreprise_id)->first();
    return response()->json(['entreprise_id' => $entreprise->entreprise_id]);
});


Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{offer_id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/wishlist/remove/{offer_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');


Route::get('/getentreprises', function () {
    // Retrieve the enterprise associated with the authenticated user
      
    $entreprises = Entreprise::all();

    return response()->json([
        'entreprises' => $entreprises,
    ]);
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


use App\Models\Wishlist;





// Route::get('/get-evaluation_details', function ($entreprise_id) {

//     $entreprise = Entreprise::where('entreprise_id', $entreprise_id);
//     $etudiant = Etudiant::where('user_id',auth()->id());

//     return response()->json([
//         'entreprise' => $entreprise,
//         'etudiant' => $etudiant,
//     ]);
// });

Route::get('/get-evaluation_details/{entreprise_id}', function ($entreprise_id) {
    // Retrieve the enterprise details based on the provided entreprise_id
    $entreprise = Entreprise::where('entreprise_id', $entreprise_id)->first();

    // Retrieve the student details associated with the authenticated user
    $etudiant = Etudiant::where('user_id', auth()->id())->first();
    if ($etudiant ===null){
        $etudiant = PiloteDePromotion::where('user_id', auth()->id())->first();
    }
    if ($etudiant ===null){
        $etudiant = Admins::where('user_id', auth()->id())->first();
    }

    // Return JSON response with enterprise and student details
    return response()->json([
        'entreprise' => $entreprise,
        'etudiant' => $etudiant,
    ]);
});
Route::get('/wishlistsitems', function () {
    // Retrieve wishlist items for the authenticated user
    $etudiant_id = Etudiant::where('user_id', auth()->id())->value('etudiant_id');
    $wishlistItems = Wishlist::where('etudiant_id', $etudiant_id)->get();

    // Retrieve offers for the wishlist items along with their associated enterprises
    $offers = $wishlistItems->map(function ($wishlistItem) {
        return Offers::with('entreprise')->find($wishlistItem->offer_id);
    });

    // Return JSON response with offers and their associated enterprises
    return response()->json([
        'offers' => $offers,
    ]);
});


use App\Http\Controllers\EvaluerEntrepriseController;

Route::get('/evaluations', [EvaluerEntrepriseController::class, 'index'])->name('evaluations.index');
Route::get('/evaluations/{id}/create', [EvaluerEntrepriseController::class, 'create'])->name('evaluations.create');
Route::post('/evaluations', [EvaluerEntrepriseController::class, 'store'])->name('evaluations.store');
Route::get('/evaluations/{id}', [EvaluerEntrepriseController::class, 'show'])->name('evaluations.show');
Route::get('/evaluations/{id}/edit', [EvaluerEntrepriseController::class, 'edit'])->name('evaluations.edit');
Route::put('/evaluations/{id}', [EvaluerEntrepriseController::class, 'update'])->name('evaluations.update');
Route::delete('/evaluations/{id}', [EvaluerEntrepriseController::class, 'destroy'])->name('evaluations.destroy');
