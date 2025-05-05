<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assurance;

class AssuranceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'duree' => 'required|integer|min:1',
            'destination' => 'required|string|max:255',
            'type_assurance' => 'required|string|in:Annulation,Médicale,Bagages',
            'reservation_id' => [
                'required',
                'exists:reservations,id',
                function ($attribute, $value, $fail) {
                    if (!auth()->user()->reservations()->where('id', $value)->exists()) {
                        $fail('La réservation sélectionnée ne vous appartient pas.');
                    }
                },
            ],
        ]);

        Assurance::create($validated);

        return redirect()->back()->with('success', 'Souscription enregistrée avec succès !');
    }

    public function index()
    {
        $assurances = Assurance::orderBy('created_at', 'desc')->get();
        return view('admin.assurances', compact('assurances'));
    }
}