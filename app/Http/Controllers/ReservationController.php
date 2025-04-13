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
            'date_depart' => 'required|date|after_or_equal:today',
            'date_retour' => 'required|date|after_or_equal:date_depart',
            'nombre_passagers' => 'required|integer|min:1|max:10',
            'destination' => 'required|string',
            'preference_vol' => 'required|string',
            'preference_hotel' => 'required|string',
            'demande_speciale' => 'nullable|string|max:1000',
        ]);

        Reservation::create($validated);

        return redirect()->back()->with('success', 'Réservation enregistrée avec succès !');
    }
}


