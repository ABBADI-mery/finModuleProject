<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PlanificationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;


// Pages publiques
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/package', function () {
    return view('package');
})->name('package');

Route::get('/destination', function () {
    return view('destination');
})->name('destination');

Route::get('/booking', function () {
    return auth()->check() ? view('booking') : redirect()->route('login');
})->name('booking');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/activity', function () {
    return view('activity');
})->name('activity');

Route::get('/planification', function () {
    return view('planification');
})->name('planification');

// Routes pour contact, assurance, et réservation
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/assurance', [AssuranceController::class, 'store'])->name('assurance.store')->middleware('auth');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store')->middleware('auth');

// Routes d'authentification
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tableau de bord admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

// Routes admin pour contacts, assurances, et réservations
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/admin/assurances', [AssuranceController::class, 'index'])->name('assurances.index');
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');

// Gestion des utilisateurs
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


//Routes pour les statistiques
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');
// Routes pour le client
Route::prefix('client')
    ->name('client.')
    ->middleware(['auth', 'role:client'])
    ->group(function () {
        // Tableau de bord client
        // Affiche les informations du client et un résumé des réservations
        Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'dashboard'])->name('dashboard');
    });








    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::resource('offres', offreController::class)
            ->parameters(['offres' => 'offre'])
            ->names([
                'index' => 'admin.offres.index',
                'create' => 'admin.offres.create',
                'store' => 'admin.offres.store',
                'edit' => 'admin.offres.edit',
                'update' => 'admin.offres.update',
                'destroy' => 'admin.offres.destroy',
            ]);
    });
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::resource('offres', OffreController::class)->except(['show']);
    });
    
    // Route pour l'affichage public des offres
    Route::get('/package', [OffreController::class, 'showoffres'])->name('package');











// Routes protégées par l'authentification
Route::middleware(['auth'])->group(function () {
    // Routes pour le client
    Route::prefix('client')->group(function () {
        // Tableau de bord
        Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
        
        // Réservations
        Route::get('/reservations', [ClientController::class, 'reservations'])->name('client.reservations');
        
        // Assurances
        Route::get('/assurances', [ClientController::class, 'assurances'])->name('client.assurances');
        Route::get('/assurances/compare', [ClientController::class, 'compareAssurances'])->name('assurances.compare');
        
        // Planification
        Route::get('/planification', [ClientController::class, 'planification'])->name('client.planification');
        
        // Profil
        Route::get('/profil', [ClientController::class, 'profil'])->name('client.profil');
        Route::put('/profil', [ClientController::class, 'updateProfile'])->name('client.updateProfile');
        
    });
});