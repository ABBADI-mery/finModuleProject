<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques de base
        $stats = [
            'assurances' => Assurance::count(),
            'users' => User::count(),
            'reservations' => Reservation::count(),
        ];

        // Données pour les graphiques
        // 1. Assurances par type
        $assuranceTypes = Assurance::groupBy('type_assurance')
            ->select('type_assurance', DB::raw('count(*) as count'))
            ->pluck('count', 'type_assurance')
            ->toArray();

        // 2. Utilisateurs par rôle
        $userRoles = User::groupBy('role')
            ->select('role', DB::raw('count(*) as count'))
            ->pluck('count', 'role')
            ->toArray();

        // 3. Réservations par mois (derniers 6 mois)
        $reservationsByMonth = Reservation::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw('count(*) as count')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        return view('admin.dashboard', compact('stats', 'assuranceTypes', 'userRoles', 'reservationsByMonth'));
    }
}