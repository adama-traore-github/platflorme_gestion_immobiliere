<x-auth-split-layout>
    {{-- Icône succès --}}
    <div class="flex justify-center mb-6">
        <div class="h-16 w-16 rounded-full bg-green-100 flex items-center justify-center">
            <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>

    {{-- Titre --}}
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 font-outfit">Inscription réussie !</h2>
        <p class="mt-2 text-sm text-gray-600">
            Votre compte a bien été créé. Vous pouvez maintenant vous connecter.
        </p>
    </div>

    {{-- Bouton --}}
    <a href="{{ route('login') }}"
        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
        Se connecter à mon compte
    </a>
</x-auth-split-layout>
