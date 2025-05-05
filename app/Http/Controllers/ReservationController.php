<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->except('store'); // Utiliser 'role:admin' au lieu de 'admin'
    }

    /**
     * Display a listing of the reservations.
     */
    public function index()
    {
        $reservations = Reservation::with('assurances')->get();
        return view('admin.reservations', compact('reservations'));
    }

    /**
     * Store a newly created reservation in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_depart' => 'required|date|after_or_equal:today',
            'date_retour' => 'required|date|after:date_depart',
            'nombre_passagers' => 'required|integer|min:1|max:10',
            'destination' => 'required|string|max:255',
            'preference_vol' => 'required|string|in:Économique,Affaires,Première classe',
            'preference_hotel' => 'required|string|in:3 étoiles,4 étoiles,5 étoiles',
            'demande_speciale' => 'nullable|string|max:1000',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'date_depart' => $validated['date_depart'],
            'date_retour' => $validated['date_retour'],
            'nombre_passagers' => $validated['nombre_passagers'],
            'destination' => $validated['destination'],
            'preference_vol' => $validated['preference_vol'],
            'preference_hotel' => $validated['preference_hotel'],
            'demande_speciale' => $validated['demande_speciale'],
            'statut' => 'en attente',
        ]);

        return redirect()->back()->with('success', 'Réservation enregistrée avec succès !');
    }

    /**
     * Approve a reservation.
     */
    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'confirmée']);

        return redirect()->route('reservations.index')->with('success', 'Réservation confirmée avec succès !');
    }

    /**
     * Reject (cancel) a reservation.
     */
    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'annulée']);

        return redirect()->route('reservations.index')->with('success', 'Réservation annulée avec succès !');
    }
}