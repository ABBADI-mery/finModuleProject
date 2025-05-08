<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonial', compact('testimonials'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'comment' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Vérifier si un témoignage similaire existe déjà
    $existing = Testimonial::where('name', $request->name)
                         ->where('comment', $request->comment)
                         ->first();

    if ($existing) {
        return back()->with('error', 'Un témoignage similaire existe déjà!');
    }

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('testimonials', 'public');
    }

    Testimonial::create([
        'name' => $request->name,
        'location' => $request->location,
        'comment' => $request->comment,
        'image' => $imagePath
    ]);

    return redirect()->route('testimonial')->with('success', 'Merci pour votre témoignage!');
}
}