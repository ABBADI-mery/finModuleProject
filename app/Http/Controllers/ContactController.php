<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Affiche le formulaire de contact
    public function create()
    {
        return view('contact'); // Renvoie la vue contact.blade.php
    }

    // Enregistre le message envoyé par le formulaire
    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Création du contact
        Contact::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'sujet' => $request->sujet,
            'message' => $request->message,
        ]);

        // Redirige avec un message de succès
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
