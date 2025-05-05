<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:client']);
    }

    /**
     * Display the client dashboard with user information and reservation summary.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('client.dashboard', compact('reservations'));
    }
}