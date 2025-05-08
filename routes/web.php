<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\ReservationController;
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

Route::get('/package', [OffreController::class, 'showoffres'])->name('package');

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
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

// Routes admin pour contacts, assurances, et réservations
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/admin/assurances', [AssuranceController::class, 'index'])->name('assurances.index');
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');
Route::get('/offre/{offre}/reservation', [ReservationController::class, 'create'])->name('reservation.create')->middleware('auth');
// Gestion des utilisateurs
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes admin pour les offres
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('offres', OffreController::class)->except(['show'])->parameters(['offres' => 'offre'])->names([
        'index' => 'offres.index',
        'create' => 'offres.create',
        'store' => 'offres.store',
        'edit' => 'offres.edit',
        'update' => 'offres.update',
        'destroy' => 'offres.destroy',
    ]);
});

// Routes pour le client
Route::prefix('client')->name('client.')->middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');
    Route::get('/reservations', [ClientController::class, 'reservations'])->name('reservations');
    Route::get('/reservations/{reservation}', [ClientController::class, 'showReservation'])->name('reservation.show');
    Route::get('/reservations/{reservation}/edit', [ClientController::class, 'editReservation'])->name('reservation.edit');
    Route::put('/reservations/{reservation}', [ClientController::class, 'updateReservation'])->name('reservation.update');
    Route::post('/reservations/{reservation}/cancel', [ClientController::class, 'cancelReservation'])->name('reservation.cancel');
    Route::get('/assurances', [ClientController::class, 'assurances'])->name('assurances');
    Route::get('/assurances/compare', [ClientController::class, 'compareAssurances'])->name('assurances.compare');
    Route::get('/voyages', [ClientController::class, 'voyages'])->name('voyages');
    Route::get('/profil', [ClientController::class, 'profil'])->name('profil');
    Route::put('/profil', [ClientController::class, 'updateProfile'])->name('updateProfile');
});

















use App\Http\Controllers\PlanificationController;

Route::middleware('auth')->group(function () {
    Route::post('/travel-plans', [PlanificationController::class, 'store'])->name('travel-plans.store');
    Route::get('/travel-plans', [PlanificationController::class, 'index'])->name('travel-plans.index');
});