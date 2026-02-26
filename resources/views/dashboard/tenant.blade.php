<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon Espace Locataire') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-indigo-600 rounded-lg shadow-xl p-6 mb-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold mb-2">Bonjour, {{ Auth::user()->name }}</h1>
                    <p class="text-indigo-100">Retrouvez toutes les informations sur votre location ici.</p>
                </div>
                 <div class="absolute right-0 top-0 h-full w-1/3 bg-white opacity-5 transform skew-x-12 translate-x-12"></div>
            </div>

            @if($lease)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Property Details -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-indigo-800">Mon Logement</h3>
                            <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <div class="p-6">
                            <div class="mb-4">
                                <span class="block text-sm text-gray-500 uppercase tracking-wide">Adresse</span>
                                <span class="text-xl font-medium text-gray-900 block mt-1">{{ $lease->property->address }}</span>
                                <span class="text-gray-600 block">{{ $lease->property->postal_code }} {{ $lease->property->city }}</span>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <span class="block text-sm text-gray-500 uppercase tracking-wide">Type</span>
                                    <span class="font-medium text-gray-800">{{ $lease->property->type }}</span>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500 uppercase tracking-wide">Surface</span>
                                    <span class="font-medium text-gray-800">{{ $lease->property->surface }} m²</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lease Details -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                         <div class="bg-green-50 px-6 py-4 border-b border-green-100 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-green-800">Mon Contrat</h3>
                            <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div class="p-6">
                             <div class="mb-6">
                                <span class="block text-sm text-gray-500 uppercase tracking-wide mb-1">Loyer Mensuel</span>
                                <div class="flex items-baseline">
                                    <span class="text-3xl font-extrabold text-gray-900">{{ number_format($lease->rent_amount, 2, ',', ' ') }}</span>
                                    <span class="ml-2 text-gray-600">€ / mois</span>
                                </div>
                             </div>

                             <div class="border-t border-gray-100 pt-4">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Début du bail</span>
                                    <span class="font-medium text-gray-900">{{ $lease->start_date->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Fin du bail</span>
                                    <span class="font-medium text-gray-900">{{ $lease->end_date ? $lease->end_date->format('d/m/Y') : 'Indéterminée' }}</span>
                                </div>
                             </div>

                             <div class="mt-6">
                                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    Payer mon loyer
                                </button>
                             </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md shadow">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                Aucun bail actif n'est associé à votre compte pour le moment. Veuillez contacter votre gestionnaire.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
