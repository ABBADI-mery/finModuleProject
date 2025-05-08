<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->except(['store', 'create']);
    }

    public function index()
    {
        $reservations = Reservation::with(['assurances', 'offre'])->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function create(Offre $offre)
    {
        return view('booking', compact('offre'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'destination' => 'required|string|max:255',
            'preference_hotel' => 'required|string|max:255',
            'nombre_passagers' => 'required|integer|min:1',
            'date_depart' => 'required|date|after_or_equal:today',
            'date_retour' => 'required|date|after:date_depart',
            'offre_id' => 'required|exists:offres,id',
            'demande_speciale' => 'nullable|string|max:1000',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'destination' => $validated['destination'],
            'preference_hotel' => $validated['preference_hotel'],
            'nombre_passagers' => $validated['nombre_passagers'],
            'date_depart' => $validated['date_depart'],
            'date_retour' => $validated['date_retour'],
            'demande_speciale' => $validated['demande_speciale'],
            'statut' => 'en attente',
            'offre_id' => $validated['offre_id'],
        ]);

        return redirect()->route('package')->with('success', 'Réservation enregistrée avec succès !');
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'confirmée']);
        return redirect()->route('reservations.index')->with('success', 'Réservation confirmée avec succès !');
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'annulée']);
        return redirect()->route('reservations.index')->with('success', 'Réservation annulée avec succès !');
    }
}