<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assurance;
use App\Models\Reservation;

class AssuranceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $assurances = Assurance::with('reservation')->orderBy('created_at', 'desc')->get();
        return view('admin.assurances', compact('assurances'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'destination' => 'required|string|max:255',
            'duree' => 'required|integer|min:1',
        ]);

        // Vérifier la cohérence de la destination et de la durée
        $reservation = Reservation::findOrFail($validated['reservation_id']);
        $expectedDuree = \Carbon\Carbon::parse($reservation->date_retour)->diffInDays(\Carbon\Carbon::parse($reservation->date_depart));
        
        if ($validated['destination'] !== $reservation->destination) {
            return back()->withErrors(['destination' => 'La destination doit correspondre à celle de la réservation.'])->withInput();
        }
        
        if ($validated['duree'] != $expectedDuree) {
            return back()->withErrors(['duree' => 'La durée doit correspondre à celle de la réservation.'])->withInput();
        }

        Assurance::create([
            'user_id' => auth()->id(),
            'reservation_id' => $validated['reservation_id'],
            'type_assurance' => $validated['type_assurance'],
            'destination' => $validated['destination'],
            'duree' => $validated['duree'],
        ]);

        return redirect()->back()->with('success', 'Souscription enregistrée avec succès !');
    }
}