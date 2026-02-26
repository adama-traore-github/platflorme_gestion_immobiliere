<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs qui sont des locataires
        // Idéalement, on ne devrait voir que SES locataires (liés par un bail), 
        // mais pour l'instant on liste tous les locataires pour simplifier ou ceux créés par le manager (si on ajoutait une colonne 'created_by').
        // Pour l'instant, listons tous les utilisateurs avec le rôle LOCATAIRE.
        $tenants = User::where('role', UserRole::LOCATAIRE)->get();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // On peut générer un mot de passe aléatoire ou demander d'en saisir un
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()], 
        ]);

        $password = $request->password ?? \Illuminate\Support\Str::random(10); // Mot de passe par défaut si non fourni

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => UserRole::LOCATAIRE,
        ]);

        event(new Registered($user));

        // TODO: Envoyer un email au locataire avec ses identifiants (Password)

        return redirect()->route('tenants.index')->with('success', 'Locataire créé avec succès. Mot de passe provisoire : ' . $password);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $tenant)
    {
        if ($tenant->role !== UserRole::LOCATAIRE) {
            abort(404);
        }
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $tenant)
    {
        if ($tenant->role !== UserRole::LOCATAIRE) {
            abort(404);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$tenant->id],
        ]);

        $tenant->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('tenants.index')->with('success', 'Informations du locataire mises à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $tenant)
    {
       if ($tenant->role !== UserRole::LOCATAIRE) {
            abort(404);
        }
        
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Locataire supprimé.');
    }
}
