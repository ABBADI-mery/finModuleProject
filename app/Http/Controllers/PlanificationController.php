<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class PlanificationController extends Controller
{
    // Affiche le formulaire pour la planification
    public function create()
    {
        return view('planification');  // Vue contenant le formulaire de réservation
    }

    // Enregistre la réservation dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'destination' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'preferences' => 'nullable|string',
            'special_requests' => 'nullable|string',
        ]);

        // Création de la réservation
        $reservation = new Reservation();
        $reservation->name = $request->input('name');
        $reservation->email = $request->input('email');
        $reservation->destination = $request->input('destination');
        $reservation->start_date = $request->input('start_date');
        $reservation->end_date = $request->input('end_date');
        $reservation->preferences = $request->input('preferences');
        $reservation->special_requests = $request->input('special_requests');
        $reservation->save();

        // Redirige vers la page de planification avec un message de succès
        return redirect()->route('planification.create')->with('success', 'Votre réservation a été enregistrée avec succès !');
    }
}
