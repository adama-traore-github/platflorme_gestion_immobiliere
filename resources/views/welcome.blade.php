<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EspaceHabitat - Votre plateforme immobilière</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body>
    <!-- En-tête -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="{{ url('/') }}" class="logo">
                    <i class="fas fa-home"></i>
                    EspaceHabitat
                </a>
                <div class="nav-links">
                    @auth
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i>
                            Tableau de bord
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="fas fa-sign-in-alt"></i>
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i>
                            S'inscrire
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Section Hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Gérez votre patrimoine immobilier<br>
                    <span style="color: #4f46e5;">en toute simplicité</span>
                </h1>
                <p class="hero-description">
                    EspaceHabitat vous offre tous les outils nécessaires pour gérer efficacement vos biens immobiliers, vos locataires et vos contrats.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <i class="fas fa-rocket"></i>
                        Commencer maintenant
                    </a>
                    <a href="#features" class="btn btn-outline">
                        <i class="fas fa-info-circle"></i>
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="section-title">Une meilleure façon de gérer votre patrimoine immobilier</h2>
            <p class="section-subtitle">Découvrez nos fonctionnalités conçues pour simplifier la gestion de vos biens immobiliers</p>

            <div class="features-grid">
                <!-- Carte 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="feature-title">Gestion simplifiée</h3>
                    <p class="feature-description">
                        Gérez facilement vos biens immobiliers, vos locataires et vos contrats en un seul endroit.
                    </p>
                </div>

                <!-- Carte 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="feature-title">Documents sécurisés</h3>
                    <p class="feature-description">
                        Stockez et gérez tous vos documents importants en toute sécurité.
                    </p>
                </div>

                <!-- Carte 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="feature-title">Suivi en temps réel</h3>
                    <p class="feature-description">
                        Suivez l'état de vos dossiers et de vos demandes en temps réel.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <!-- Pied de page -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} EspaceHabitat. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
