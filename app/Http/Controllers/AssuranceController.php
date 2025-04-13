<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assurance;

class AssuranceController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'duree' => 'required|integer|min:1',
            'destination' => 'required|string|max:255',
            'type_assurance' => 'required|string|in:Annulation,Médicale,Bagages',
        ]);

        // Enregistrement
        Assurance::create($request->all());

        return redirect()->back()->with('success', 'Souscription enregistrée avec succès !');
    }
}
