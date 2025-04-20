<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date|after_or_equal:date_depart',
            'nombre_passagers' => 'required|integer|min:1|max:10',
            'destination' => 'required|string',
            'preference_vol' => 'required|string',
            'preference_hotel' => 'required|string',
            'demande_speciale' => 'nullable|string',
        ]);

        Reservation::create($validated);

        return back()->with('success', 'Votre réservation a bien été enregistrée !');
    }

    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'confirmée']);
        return back()->with('success', 'Réservation confirmée avec succès !');
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'annulée']);
        return back()->with('success', 'Réservation annulée avec succès !');
    }
}