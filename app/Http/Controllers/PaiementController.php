<?php
namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0.1',
            'methode' => 'required|in:carte,virement,paypal',
        ]);

        $paiement = Paiement::create([
            'montant' => $request->montant,
            'methode' => $request->methode,
            'details' => $request->except(['montant', 'methode']),
        ]);

        return response()->json([
            'message' => 'Paiement enregistré avec succès.',
            'data' => $paiement,
        ]);
    }
}
