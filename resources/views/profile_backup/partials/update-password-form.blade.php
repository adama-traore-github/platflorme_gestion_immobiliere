<div class="space-y-8">
    <!-- Header -->
    <div class="border-b border-gray-200 pb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <svg class="w-6 h-6 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    {{ __('Sécurité du compte') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Mettez à jour le mot de passe de votre compte.') }}
                </p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Sécurisé
                </span>
            </div>
        </div>
    </div>

    <!-- Password Update Form -->
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Success Message -->
        @if (session('status') === 'password-updated')
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 5000)"
                 class="rounded-md bg-green-50 p-4 mb-6 border-l-4 border-green-400 transition-all duration-300 ease-in-out">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ __('Votre mot de passe a été mis à jour avec succès.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="space-y-6">
            <!-- Current Password -->
            <div>
                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">
                    {{ __('Mot de passe actuel') }}
                    <span class="text-red-500">*</span>
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        id="update_password_current_password" 
                        name="current_password" 
                        required 
                        autocomplete="current-password"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2.5 border"
                        placeholder="••••••••"
                    >
                </div>
                @error('current_password', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="update_password_password" class="block text-sm font-medium text-gray-700">
                    {{ __('Nouveau mot de passe') }}
                    <span class="text-red-500">*</span>
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 00-2-2m-2.25 4a2 2 0 00-2 2m4 0a2 2 0 01-2 2m4 0a2 2 0 002-2m-6 8a2 2 0 01-2-2m0 0a2 2 0 01-2-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2m-6 4a2 2 0 012 2m0 0v6a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2m6 0h6" />
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        id="update_password_password" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2.5 border"
                        placeholder="••••••••"
                    >
                </div>
                <p class="mt-1 text-xs text-gray-500">
                    {{ __('Utilisez au moins 8 caractères avec des lettres, des chiffres et des symboles.') }}
                </p>
                @error('password', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">
                    {{ __('Confirmer le mot de passe') }}
                    <span class="text-red-500">*</span>
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2.5 border"
                        placeholder="••••••••"
                    >
                </div>
                @error('password_confirmation', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end pt-6 border-t border-gray-200">
            <button 
                type="submit" 
                class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
            >
                <svg class="-ml-1 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Mettre à jour le mot de passe') }}
            </button>
        </div>
    </form>

    <!-- Password Strength Tips -->
    <div class="mt-8 bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-md">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h2a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Conseils pour un mot de passe sécurisé</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Utilisez au moins 12 caractères</li>
                        <li>Incluez des chiffres, des symboles, des majuscules et des minuscules</li>
                        <li>Évitez les mots du dictionnaire ou les informations personnelles</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
