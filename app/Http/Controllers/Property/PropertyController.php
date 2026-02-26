<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->get();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'type' => 'required|string',
            'surface' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
        ]);

        $request->user()->properties()->create($validated);

        return redirect()->route('properties.index')->with('success', 'Bien créé avec succès.');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        // Vérifier que c'est bien le propriétaire
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'type' => 'required|string',
            'surface' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
        ]);

        $property->update($validated);

        return redirect()->route('properties.index')->with('success', 'Bien mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }

        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Bien supprimé avec succès.');
    }
}
