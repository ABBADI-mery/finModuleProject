<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PlanificationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AuthController;





// Définir des routes nommées pour les pages
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
    return view('booking');
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


Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/assurance', [AssuranceController::class, 'store'])->name('assurance.store');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');










Route::get('/login', function () {
    return view('login'); // ta page HTML ici
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/admin/assurances', [AssuranceController::class, 'index'])->name('assurances.index');
 

    // Affichage des réservations
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        
    
    // Validation d'une réservation
    Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve']) ->name('reservations.approve');
       
    
    // Annulation d'une réservation
    Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject']) ->name('reservations.reject');
       


