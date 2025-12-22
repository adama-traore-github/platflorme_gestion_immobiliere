<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Indispensable de l'ajouter ici
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class, // Magie de Laravel : transforme le string en Enum
        ];
    }

    // --- Helpers de Rôles (Pour simplifier tes futurs tests) ---

    public function isManager(): bool
    {
        return $this->role === UserRole::MANAGER;
    }

    public function isLocataire(): bool
    {
        return $this->role === UserRole::LOCATAIRE;
    }

    public function isPrestataire(): bool
    {
        return $this->role === UserRole::PRESTATAIRE;
    }
}