<?php

namespace App\Http\Controllers\Lease;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lease;
use App\Models\Property;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère les baux liés aux propriétés du manager connecté
        $leases = Lease::whereHas('property', function ($query) {
            $query->where('user_id', Auth::id());
        })->with(['property', 'tenant'])->get();

        return view('leases.index', compact('leases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // On a besoin de la liste des propriétés du manager
        $properties = Property::where('user_id', Auth::id())->where('status', 'available')->get();
        
        // Et de la liste des locataires
        $tenants = User::where('role', UserRole::LOCATAIRE)->get();

        return view('leases.create', compact('properties', 'tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'tenant_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'rent_amount' => 'required|numeric|min:0',
            'security_deposit' => 'nullable|numeric|min:0',
        ]);

        // Vérifier que la propriété appartient bien au manager
        $property = Property::findOrFail($validated['property_id']);
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }

        // Créer le bail
        $lease = Lease::create(array_merge($validated, ['status' => 'active']));

        // Mettre à jour le statut de la propriété
        $property->update(['status' => 'rented']);

        return redirect()->route('leases.index')->with('success', 'Bail créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lease $lease)
    {
        if ($lease->property->user_id !== Auth::id()) {
            abort(403);
        }
        return view('leases.show', compact('lease'));
    }
}
