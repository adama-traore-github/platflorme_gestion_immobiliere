<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau bail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if($properties->isEmpty())
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                            <div class="flex">
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Vous n'avez aucun bien disponible. Veuillez d'abord ajouter un bien ou vérifier qu'il est marqué comme "Disponible".
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($tenants->isEmpty())
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                            <div class="flex">
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Vous n'avez aucun locataire enregistré. Veuillez d'abord créer un compte locataire.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('leases.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <!-- Sélection du Bien -->
                            <div class="mb-4">
                                <x-input-label for="property_id" :value="__('Bien Immobilier')" />
                                <select id="property_id" name="property_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">Sélectionnez un bien</option>
                                    @foreach($properties as $property)
                                        <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                            {{ $property->title }} ({{ $property->city }}) - {{ number_format($property->price, 0) }} €
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('property_id')" class="mt-2" />
                            </div>

                            <!-- Sélection du Locataire -->
                            <div class="mb-4">
                                <x-input-label for="tenant_id" :value="__('Locataire')" />
                                <select id="tenant_id" name="tenant_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">Sélectionnez un locataire</option>
                                    @foreach($tenants as $tenant)
                                        <option value="{{ $tenant->id }}" {{ old('tenant_id') == $tenant->id ? 'selected' : '' }}>
                                            {{ $tenant->name }} ({{ $tenant->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('tenant_id')" class="mt-2" />
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <!-- Date de début -->
                            <div class="mb-4">
                                <x-input-label for="start_date" :value="__('Date de début du bail')" />
                                <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>

                            <!-- Date de fin -->
                            <div class="mb-4">
                                <x-input-label for="end_date" :value="__('Date de fin (Laisser vide si indéterminée)')" />
                                <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" />
                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <!-- Loyer -->
                            <div class="mb-4">
                                <x-input-label for="rent_amount" :value="__('Montant du Loyer (€)')" />
                                <x-text-input id="rent_amount" class="block mt-1 w-full" type="number" step="0.01" name="rent_amount" :value="old('rent_amount')" required />
                                <x-input-error :messages="$errors->get('rent_amount')" class="mt-2" />
                            </div>

                            <!-- Caution -->
                            <div class="mb-4">
                                <x-input-label for="security_deposit" :value="__('Dépôt de garantie / Caution (€)')" />
                                <x-text-input id="security_deposit" class="block mt-1 w-full" type="number" step="0.01" name="security_deposit" :value="old('security_deposit')" />
                                <x-input-error :messages="$errors->get('security_deposit')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('leases.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Annuler</a>
                            <x-primary-button>
                                {{ __('Créer le bail') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
