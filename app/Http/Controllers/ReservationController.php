<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{public function store(Request $request)
    {
        $request->validate([
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
    
        // Exemple de création de réservation
        Reservation::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'date_depart' => $request->date_depart,
            'date_retour' => $request->date_retour,
            'nombre_passagers' => $request->nombre_passagers,
            'destination' => $request->destination,
            'preference_vol' => $request->preference_vol,
            'preference_hotel' => $request->preference_hotel,
            'demande_speciale' => $request->demande_speciale,
        ]);
    
        return redirect()->back()->with('success', 'Votre réservation a bien été enregistrée !');
    }
    
}




