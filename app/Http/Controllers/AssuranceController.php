<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assurance;

class AssuranceController extends Controller
{
    // Affiche le formulaire si besoin
    public function create()
    {
        return view('assurance');
    }

    // Traitement du formulaire
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'date_naissance' => 'required|date',
            'duree' => 'required|integer|min:1',
            'destination' => 'required|string|max:255',
            'type_assurance' => 'required|string|in:Annulation,Médicale,Bagages',
        ]);

        // Enregistrement en base de données
        Assurance::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'date_naissance' => $validated['date_naissance'],
            'duree' => $validated['duree'],
            'destination' => $validated['destination'],
            'type_assurance' => $validated['type_assurance'],
        ]);

        return redirect()->back()->with('success', 'Votre souscription a bien été enregistrée !');
    }
}
