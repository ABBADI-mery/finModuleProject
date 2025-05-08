<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Reservation;
use App\Models\Assurance;
use App\Models\Client;

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
     * Display the client's enrolled assurances and insurance options.
     *
     * @return \Illuminate\View\View
     */
    public function assurances()
    {
        $assurances = Assurance::whereHas('reservation', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('reservation')->orderBy('created_at', 'desc')->get();
        return view('client.assurances', compact('assurances'));
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
    public function voyages()
    {
        return view('client.voyages');
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
        $user = Auth::user();
        $client = $user->client ?? new Client(['user_id' => $user->id]);

        // Validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ];

        // Require current password if email or password is changed
        if ($request->email !== $user->email || $request->filled('password')) {
            $rules['current_password'] = ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('Le mot de passe actuel est incorrect.');
                }
            }];
        }

        $validated = $request->validate($rules);

        // Update User model (only email and password)
        $user->email = $validated['email'];
        if (isset($validated['password']) && $validated['password']) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        // Update or create Client model
        $client->fill([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'],
        ]);
        $client->save();

        // Handle non-database fields (birth_date, gender, address) using session
        if ($validated['birth_date'] && !Session::has('profile.birth_date')) {
            Session::put('profile.birth_date', $validated['birth_date']);
        }
        if ($validated['gender'] && !Session::has('profile.gender')) {
            Session::put('profile.gender', $validated['gender']);
        }
        if ($validated['address'] && !Session::has('profile.address')) {
            Session::put('profile.address', $validated['address']);
        }

        // Handle profile picture (store temporarily, not in database)
        if ($request->hasFile('profile_picture')) {
            if (Session::has('profile.profile_picture')) {
                Storage::delete('public/profiles/' . Session::get('profile.profile_picture'));
            }
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profiles', $filename);
            Session::put('profile.profile_picture', $filename);
        }

        return redirect()->route('client.profil')->with('success', 'Profil mis à jour avec succès !');
    }

    /**
     * Cancel a client's reservation if it is in 'en attente' status.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelReservation(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('client.reservations')->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }

        if ($reservation->statut !== 'en attente') {
            return redirect()->route('client.reservations')->with('error', 'Cette réservation ne peut pas être annulée car elle n\'est pas en attente.');
        }

        $reservation->statut = 'annulée';
        $reservation->save();

        return redirect()->route('client.reservations')->with('success', 'Réservation annulée avec succès.');
    }

    /**
     * Display a specific reservation's details.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\View\View
     */
    public function showReservation(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('client.reservations')->with('error', 'Vous n\'êtes pas autorisé à voir cette réservation.');
        }
        return view('client.reservation-show', compact('reservation'));
    }

    /**
     * Show the form for editing a specific reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\View\View
     */
    public function editReservation(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('client.reservations')->with('error', 'Vous n\'êtes pas autorisé à modifier cette réservation.');
        }
        return view('client.reservation-edit', compact('reservation'));
    }

    /**
     * Update a specific reservation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateReservation(Request $request, Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('client.reservations')->with('error', 'Vous n\'êtes pas autorisé à modifier cette réservation.');
        }

        $validated = $request->validate([
            'destination' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date|after:date_depart',
            'prix' => 'required|numeric|min:0',
        ]);

        $reservation->update($validated);

        return redirect()->route('client.reservations')->with('success', 'Réservation mise à jour avec succès.');
    }
}