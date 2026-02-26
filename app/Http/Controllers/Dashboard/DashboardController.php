<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;
use App\Models\Property;
use App\Models\User;
use App\Models\Lease;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === UserRole::MANAGER) {
            $propertiesCount = Property::where('user_id', $user->id)->count();
            $tenantsCount = User::where('role', UserRole::LOCATAIRE)->count(); // Pour l'instant tous les locataires
            $leasesCount = Lease::whereHas('property', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->where('status', 'active')->count();

            return view('dashboard.manager', compact('propertiesCount', 'tenantsCount', 'leasesCount'));
        }

        if ($user->role === UserRole::LOCATAIRE) {
            $lease = Lease::where('tenant_id', $user->id)
                          ->where('status', 'active')
                          ->with('property')
                          ->first();

            return view('dashboard.tenant', compact('lease'));
        }

        return view('dashboard');
    }
}
