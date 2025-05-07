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

    /**
     * Display the client's reservations.
     *
     * @return \Illuminate\View\View
     */
    public function reservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('client.reservations', compact('reservations'));
    }

    /**
     * Display the client's insurance options.
     *
     * @return \Illuminate\View\View
     */
    public function assurances()
    {
        return view('client.assurances');
    }

    /**
     * Display the insurance comparison page.
     *
     * @return \Illuminate\View\View
     */
    public function compareAssurances()
    {
        return view('client.assurances-compare');
    }

    /**
     * Display the trip planning page.
     *
     * @return \Illuminate\View\View
     */
    public function planification()
    {
        return view('client.planification');
    }

    /**
     * Display the client's profile.
     *
     * @return \Illuminate\View\View
     */
    public function profil()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('client.profil', compact('reservations'));
    }

    /**
     * Update the client's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
        ]);

        // Mettre à jour l'utilisateur
        $user = Auth::user();
        $user->email = $validated['email'];
        $user->save();

        // Mettre à jour le client
        $client = $user->client;
        $client->first_name = $validated['first_name'];
        $client->last_name = $validated['last_name'];
        $client->phone = $validated['phone'] ?? $client->phone;
        $client->birth_date = $validated['birth_date'] ?? $client->birth_date;
        $client->gender = $validated['gender'] ?? $client->gender;
        $client->address = $validated['address'] ?? $client->address;
        $client->city = $validated['city'] ?? $client->city;
        $client->zip_code = $validated['zip_code'] ?? $client->zip_code;
        $client->country = $validated['country'] ?? $client->country;
        $client->save();

        return redirect()->route('client.profil')->with('success', 'Profil mis à jour avec succès');
    }
}