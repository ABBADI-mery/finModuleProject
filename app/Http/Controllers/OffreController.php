<?php

namespace App\Http\Controllers;

use App\Models\Offres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffreController extends Controller
{
    public function offres()
    {
        $offres = Offres::latest()->get();
        return view('admin.offres', compact('offres'));
    }

    public function ajouteroffres($id = null)
    {
        $offre = $id ? Offres::findOrFail($id) : new Offres();
        return view('admin.ajouteroffres', compact('offre'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateOffre($request, true);
        
        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        Offres::create($validated);

        return redirect()->route('admin.offres.offres')
            ->with('success', 'Offre créée avec succès!');
    }

    public function update(Request $request, Offres $offre)
    {
        $validated = $this->validateOffre($request, false);
        
        if ($request->hasFile('image')) {
            $this->deleteImage($offre->image);
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        $offre->update($validated);

        return redirect()->route('admin.offres.offres')
            ->with('success', 'Offre mise à jour avec succès!');
    }

    public function destroy(Offres $offre)
    {
        $this->deleteImage($offre->image);
        $offre->delete();

        return redirect()->route('admin.offres.offres')
            ->with('success', 'Offre supprimée avec succès!');
    }

    private function validateOffre(Request $request, $requireImage)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'hotel' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'persons' => 'required|integer',
            'description' => 'required|string',
            'image' => $requireImage ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    }

    private function storeImage($image)
    {
        $imageName = 'offre_'.time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/offres', $imageName);
        return 'offres/'.$imageName;
    }

    private function deleteImage($imagePath)
    {
        if ($imagePath) {
            Storage::delete('public/'.$imagePath);
        }
    }
}