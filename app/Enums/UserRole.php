<?php

namespace App\Enums;

enum UserRole: string
{
    case MANAGER = 'manager';
    case LOCATAIRE = 'locataire';
    case PRESTATAIRE = 'prestataire';
}