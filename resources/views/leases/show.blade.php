<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du Bail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informations du Bien</h3>
                            <div class="bg-gray-50 p-4 rounded-md">
                                <p><strong>Nom :</strong> {{ $lease->property->title }}</p>
                                <p><strong>Adresse :</strong> {{ $lease->property->address }}, {{ $lease->property->postal_code }} {{ $lease->property->city }}</p>
                                <p><strong>Type :</strong> {{ $lease->property->type }}</p>
                                <p><strong>Surface :</strong> {{ $lease->property->surface }} m²</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informations du Locataire</h3>
                            <div class="bg-gray-50 p-4 rounded-md">
                                <p><strong>Nom :</strong> {{ $lease->tenant->name }}</p>
                                <p><strong>Email :</strong> {{ $lease->tenant->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Termes du Contrat</h3>
                        <div class="bg-indigo-50 p-4 rounded-md border border-indigo-100">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <span class="block text-sm text-gray-600">Loyer Mensuel</span>
                                    <span class="block text-xl font-bold text-indigo-700">{{ number_format($lease->rent_amount, 2, ',', ' ') }} €</span>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-600">Début du bail</span>
                                    <span class="block text-lg text-gray-800">{{ $lease->start_date->format('d/m/Y') }}</span>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-600">Fin du bail</span>
                                    <span class="block text-lg text-gray-800">
                                        {{ $lease->end_date ? $lease->end_date->format('d/m/Y') : 'Indéterminée' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <a href="{{ route('leases.index') }}" class="text-gray-600 hover:text-gray-900">Retour</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
