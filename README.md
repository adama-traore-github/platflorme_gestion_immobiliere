# 🏠 ImmoGestion – Plateforme de Gestion Immobilière

Une application web complète de gestion immobilière développée avec **Laravel 11** et **Breeze**, permettant aux gestionnaires de gérer leurs biens, locataires et baux en toute simplicité.

---

## 🚀 Fonctionnalités

### 🔐 Authentification & Rôles
- Inscription / Connexion sécurisées via **Laravel Breeze**
- Enum de rôles utilisateur : `manager`, `locataire`, `prestataire`
- Système de rôles intégré dans le modèle `User`
- Page de succès après création de compte
- Layout d'authentification split (image + formulaire)

### 🏡 Gestion des Propriétés
- Lister, créer, modifier et supprimer des biens immobiliers
- CRUD complet via `PropertyController`
- Modèle `Property` avec migrations dédiées

### 👥 Gestion des Locataires
- Lister, ajouter, modifier des locataires
- CRUD complet via `TenantController`

### 📄 Gestion des Baux (Contrats)
- Créer et consulter des baux de location
- Association bail ↔ propriété ↔ locataire
- Modèle `Lease` avec factory et migrations
- Vues : index, création, détail via `LeaseController`

### 📊 Tableaux de bord
- Dashboard **Manager** : vue d'ensemble de la gestion
- Dashboard **Locataire** : vue personnalisée selon le rôle
- Redirection automatique selon le rôle connecté via `DashboardController`

---

## 🛠️ Stack technique

| Technologie | Version |
|---|---|
| PHP | 8.2+ |
| Laravel | 11.x |
| Laravel Breeze | Auth scaffolding |
| Base de données | MySQL / SQLite |
| CSS | Tailwind CSS |
| Fonts | Inter, Outfit (Google Fonts) |

---

## ⚙️ Installation

```bash
# 1. Cloner le projet
git clone https://github.com/adama-traore-github/platflorme_gestion_immobiliere.git
cd platflorme_gestion_immobiliere

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances JS
npm install

# 4. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 5. Configurer la base de données dans .env
# DB_CONNECTION=mysql
# DB_DATABASE=immo_gestion

# 6. Lancer les migrations
php artisan migrate

# 7. Compiler les assets
npm run dev

# 8. Lancer le serveur
php artisan serve
```

---

## 📁 Structure du projet

```
app/
├── Enums/
│   └── UserRole.php              # Enum : manager, locataire, prestataire
├── Http/Controllers/
│   ├── Auth/                     # Contrôleurs Breeze
│   ├── Dashboard/
│   │   └── DashboardController   # Redirection selon rôle
│   ├── Lease/
│   │   └── LeaseController       # CRUD baux
│   ├── Property/
│   │   └── PropertyController    # CRUD propriétés
│   └── Tenant/
│       └── TenantController      # CRUD locataires
├── Models/
│   ├── User.php                  # Avec rôles (Enum)
│   ├── Property.php              # Modèle propriété
│   └── Lease.php                 # Modèle bail

resources/views/
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
│   └── register-success.blade.php
├── dashboard/
│   ├── manager.blade.php
│   └── tenant.blade.php
├── properties/                   # CRUD propriétés
├── tenants/                      # CRUD locataires
├── leases/                       # CRUD baux
└── layouts/
    ├── app.blade.php
    ├── auth-split.blade.php      # Layout auth (split design)
    └── navigation.blade.php
```

---

## 🔑 Rôles utilisateur

| Rôle | Valeur | Description |
|---|---|---|
| Manager | `manager` | Accès complet à la gestion |
| Locataire | `locataire` | Accès à son tableau de bord personnel |
| Prestataire | `prestataire` | Accès prestataires (à venir) |

---

## 📌 Notes de développement

> **Vérification email désactivée en local** : `MustVerifyEmail` est commenté dans `User.php` et le middleware `verified` est retiré des routes. À réactiver avant la mise en production.

---

## 📜 License

Projet open-source sous licence [MIT](https://opensource.org/licenses/MIT).
