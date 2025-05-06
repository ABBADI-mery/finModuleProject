<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers', compact('offers'));
    }

    public function create()
    {
        return view('admin.ajouteroffre');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer',
            'people' => 'required|integer',
            'price' => 'required|numeric',
            'hotel_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('offers', 'public');

        Offer::create([
            'title' => $validated['title'],
            'location' => $validated['location'],
            'duration' => $validated['duration'],
            'people' => $validated['people'],
            'price' => $validated['price'],
            'hotel_name' => $validated['hotel_name'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.offers.index')->with('success', 'Offre ajoutée avec succès!');
    }

    public function edit(Offer $offer)
    {
        return view('admin.ajouteroffre', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer',
            'people' => 'required|integer',
            'price' => 'required|numeric',
            'hotel_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
            'location' => $validated['location'],
            'duration' => $validated['duration'],
            'people' => $validated['people'],
            'price' => $validated['price'],
            'hotel_name' => $validated['hotel_name'],
            'description' => $validated['description'],
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($offer->image_path);
            $data['image_path'] = $request->file('image')->store('offers', 'public');
        }

        $offer->update($data);

        return redirect()->route('admin.offers.index')->with('success', 'Offre mise à jour avec succès!');
    }

    public function destroy(Offer $offer)
    {
        Storage::disk('public')->delete($offer->image_path);
        $offer->delete();
        return redirect()->route('admin.offers.index')->with('success', 'Offre supprimée avec succès!');
    }
}