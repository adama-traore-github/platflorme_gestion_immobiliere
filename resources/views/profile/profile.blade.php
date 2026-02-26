<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom">
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">{{ __('Paramètres du profil') }}</h1>
                <p class="text-muted small mb-0">Gérez vos informations personnelles et votre sécurité.</p>
            </div>
            <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2 border border-primary- Lucid">
                <i class="bi bi-check-circle-fill me-1"></i> Compte actif
            </span>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 2rem;">
                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body text-center py-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d6efd&color=fff&size=128" 
                                     class="rounded-circle border border-4 border-white shadow-sm" 
                                     width="100" height="100" alt="Avatar">
                                <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-2 border-white rounded-circle"></span>
                            </div>
                            <h5 class="fw-bold mb-0">{{ Auth::user()->name }}</h5>
                            <p class="text-muted small">{{ Auth::user()->email }}</p>
                            <div class="badge bg-light text-muted border py-2 px-3 w-100">
                                Membre depuis {{ Auth::user()->created_at->format('M Y') }}
                            </div>
                        </div>
                    </div>

                    

                    <div class="card bg-primary text-white border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h6 class="fw-bold">Besoin d'aide ?</h6>
                            <p class="small opacity-75">Notre équipe technique est disponible pour vous accompagner.</p>
                            <a href="#" class="btn btn-sm btn-light text-primary fw-bold w-100">Contacter le support</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                
                <div id="profile" class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 px-4 border-bottom-0">
                        <h5 class="fw-bold mb-0">{{ __('Informations du profil') }}</h5>
                    </div>
                    <div class="card-body p-4">
                        @if (session('status') === 'profile-information-updated')
                            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <div>{{ __('Profil mis à jour.') }}</div>
                            </div>
                        @endif

                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-muted">{{ __('Nom complet') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-muted">{{ __('Adresse e-mail') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">{{ __('Enregistrer') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="security" class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 px-4 border-bottom-0">
                        <h5 class="fw-bold mb-0">{{ __('Mise à jour du mot de passe') }}</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-muted">{{ __('Mot de passe actuel') }}</label>
                                <input type="password" name="current_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-muted">{{ __('Nouveau mot de passe') }}</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-muted">{{ __('Confirmer le mot de passe') }}</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-dark px-4">{{ __('Mettre à jour') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="danger-zone" class="card border-danger-subtle bg-danger-subtle shadow-sm">
                    <div class="card-body p-4 d-md-flex align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <h5 class="text-danger fw-bold mb-1">{{ __('Supprimer le compte') }}</h5>
                            <p class="text-danger-emphasis small mb-0">Une fois supprimé, toutes vos données seront perdues.</p>
                        </div>
                        <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            {{ __('Supprimer') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.min.js"></script>
</x-app-layout>