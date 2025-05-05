<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PlanificationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AuthController;

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

// Tableau de bord client
Route::get('/client/dashboard', function () {
    return view('client.dashboard');
})->middleware(['auth', 'role:client'])->name('client.dashboard');

// Routes admin pour contacts, assurances, et réservations
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/admin/assurances', [AssuranceController::class, 'index'])->name('assurances.index');
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');