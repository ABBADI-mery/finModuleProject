<?php

namespace App\Http\Controllers;

use App\Models\TravelPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanificationController extends Controller
{
    /**
     * Créer et sauvegarder un nouveau plan de voyage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'destination' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'duree' => 'required|integer|min:1',
            'budget' => 'required|numeric|min:1',
            'nombre_personnes' => 'required|integer|min:1',
            'type_voyage' => 'required|string|in:decouverte,romantique,aventure,detente,culturel,gastronomique',
            'preferences' => 'nullable|string',
            'plan_content' => 'required|string',
        ]);

        // Création du plan
        $travelPlan = TravelPlan::create([
            'user_id' => Auth::id(),
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'destination' => $validated['destination'],
            'date_depart' => $validated['date_depart'],
            'duree' => $validated['duree'],
            'budget' => $validated['budget'],
            'nombre_personnes' => $validated['nombre_personnes'],
            'type_voyage' => $validated['type_voyage'],
            'preferences' => $validated['preferences'],
            'plan_content' => $validated['plan_content'],
        ]);

        return response()->json([
            'message' => 'Plan de voyage sauvegardé avec succès !',
            'travel_plan' => $travelPlan,
        ], 201);
    }

    /**
     * Afficher la liste des plans de voyage de l'utilisateur connecté.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $travelPlans = TravelPlan::where('user_id', Auth::id())->get();

        return response()->json([
            'travel_plans' => $travelPlans,
        ]);
    }
}