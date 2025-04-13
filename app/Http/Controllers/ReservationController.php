<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_depart' => 'required|date|after_or_equal:today',
            'date_retour' => 'required|date|after_or_equal:date_depart',
            'nbPassagers' => 'required|integer|min:1|max:10',
            'DemandeSpeciale' => 'nullable|string|max:1000',
            'PréférencesVol' => 'nullable|string|max:255',
            'PréférencesHôtel' => 'nullable|string|max:255',
            'paiement_id' => 'nullable|integer',
            'assurance_id' => 'nullable|integer',
            'client_id' => 'nullable|integer',
        ]);

        // Ajout des champs manquants non présents dans le formulaire
        $validated['statut'] = 'en attente';
        $validated['dateReservation'] = now();

        // Création de la réservation dans la base de données
        Reservation::create($validated);

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Réservation enregistrée avec succès !');
    }
}




