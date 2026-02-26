<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                    {{ __('Paramètres du profil') }}
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Gérez vos informations personnelles et vos préférences de sécurité
                </p>
            </div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Compte actif
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6 space-y-6">
                        <!-- Profile Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md">
                            <div class="p-6">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <img class="h-14 w-14 rounded-xl object-cover border-4 border-white shadow-sm" 
                                             src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4f46e5&color=fff&size=128" 
                                             alt="{{ Auth::user()->name }}">
                                        <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-500 ring-2 ring-white"></span>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{ Auth::user()->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-100 bg-gray-50 px-6 py-3">
                                <p class="text-xs text-gray-500">
                                    Membre depuis {{ Auth::user()->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <nav class="space-y-1">
                            <a href="#profile" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg group">
                                <svg class="mr-3 h-5 w-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Profil') }}
                            </a>
                            <a href="#security" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg group">
                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                {{ __('Sécurité') }}
                            </a>
                            <a href="#danger-zone" class="flex items-center px-4 py-3 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg group">
                                <svg class="mr-3 h-5 w-5 text-red-400 group-hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                {{ __('Zone de danger') }}
                            </a>
                        </nav>

                        <!-- Help Card -->
                        <div class="bg-blue-50 border border-blue-100 rounded-xl p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800">Besoin d'aide ?</h3>
                                    <div class="mt-2 text-sm text-blue-700">
                                        <p>Contactez notre équipe de support pour toute question concernant votre compte.</p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="text-sm font-medium text-blue-700 hover:text-blue-600">
                                            {{ __('Contacter le support') }}
                                            <span aria-hidden="true"> &rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3 space-y-8">
                    <!-- Profile Information Section -->
                    <div id="profile" class="bg-white shadow-sm rounded-xl overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Informations du profil') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __("Mettez à jour les informations de votre profil et votre adresse e-mail.") }}
                            </p>
                        </div>

                        <div class="px-6 py-6">
                            @if (session('status') === 'profile-information-updated')
                                <div x-data="{ show: true }" 
                                     x-show="show"
                                     x-transition
                                     x-init="setTimeout(() => show = false, 5000)"
                                     class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-green-700">
                                                {{ __('Votre profil a été mis à jour avec succès.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                                @csrf
                                @method('patch')

                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">
                                            {{ __('Nom complet') }}
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="name" id="name" autocomplete="name" value="{{ old('name', $user->name) }}"
                                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 @enderror">
                                            @error('name')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700">
                                            {{ __('Adresse e-mail') }}
                                        </label>
                                        <div class="mt-1">
                                            <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email', $user->email) }}"
                                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 @enderror">
                                            @error('email')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end pt-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                        <svg class="-ml-1 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        {{ __('Enregistrer les modifications') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Update Password Section -->
                    <div id="security" class="bg-white shadow-sm rounded-xl overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                {{ __('Mise à jour du mot de passe') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
                            </p>
                        </div>

                        <div class="px-6 py-6">
                            @if (session('status') === 'password-updated')
                                <div x-data="{ show: true }" 
                                     x-show="show"
                                     x-transition
                                     x-init="setTimeout(() => show = false, 5000)"
                                     class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-green-700">
                                                {{ __('Votre mot de passe a été mis à jour avec succès.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                                @csrf
                                @method('put')

                                <div class="space-y-4">
                                    <div>
                                        <label for="current_password" class="block text-sm font-medium text-gray-700">
                                            {{ __('Mot de passe actuel') }}
                                        </label>
                                        <div class="mt-1 relative">
                                            <input id="current_password" name="current_password" type="password" autocomplete="current-password"
                                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('current_password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 @enderror">
                                            @error('current_password')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            {{ __('Nouveau mot de passe') }}
                                        </label>
                                        <div class="mt-1 relative">
                                            <input id="password" name="password" type="password" autocomplete="new-password"
                                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 @enderror">
                                            @error('password')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <p class="mt-2 text-xs text-gray-500">
                                            {{ __('Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.') }}
                                        </p>
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                            {{ __('Confirmer le mot de passe') }}
                                        </label>
                                        <div class="mt-1">
                                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end pt-2">
                                    <button type="submit" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                        <svg class="-ml-1 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        {{ __('Mettre à jour le mot de passe') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Danger Zone Section -->
                    <div id="danger-zone" class="space-y-6">
                        <!-- Header -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                        <svg class="w-6 h-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        {{ __('Zone de danger') }}
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ __('Actions irréversibles. Soyez certain de vos choix.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Account Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-red-100 overflow-hidden">
                            <div class="p-6">
                                <div class="md:flex md:items-center md:justify-between">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-medium text-red-700">{{ __('Supprimer mon compte') }}</h3>
                                        <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ __('Action définitive et irréversible') }}
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-sm text-gray-600">
                                                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex md:mt-0 md:ml-4">
                                        <button
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                                        >
                                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            {{ __('Supprimer le compte') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Export Data Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="p-6">
                                <div class="md:flex md:items-center md:justify-between">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-medium text-gray-900">{{ __('Exporter mes données') }}</h3>
                                        <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                {{ __('Télécharger toutes vos données personnelles') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex md:mt-0 md:ml-4">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                                        >
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            {{ __('Exporter mes données') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="mt-3 text-lg font-medium text-gray-900">{{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}</h3>
                <div class="mt-2 text-sm text-gray-500">
                    <p>{{ __('Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}</p>
                    <p class="mt-2 font-medium text-red-600">{{ __('Cette action est irréversible. Toutes vos données seront définitivement supprimées.') }}</p>
                </div>
            </div>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label for="password" class="sr-only">{{ __('Mot de passe') }}</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="focus:ring-red-500 focus:border-red-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2.5 border"
                            placeholder="{{ __('Votre mot de passe') }}"
                        >
                    </div>
                    @error('password', 'userDeletion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button 
                        type="button" 
                        x-on:click="$dispatch('close')"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                    >
                        {{ __('Annuler') }}
                    </button>

                    <button 
                        type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                    >
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        {{ __('Supprimer définitivement mon compte') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>
