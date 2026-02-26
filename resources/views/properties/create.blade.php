<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau bien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('properties.store') }}">
                        @csrf

                        <!-- Nom du Bien -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Nom du bien (ex: Appartement T3 Centre-ville)')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Type -->
                            <div class="mb-4">
                                <x-input-label for="type" :value="__('Type de bien')" />
                                <select id="type" name="type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Appartement">Appartement</option>
                                    <option value="Maison">Maison</option>
                                    <option value="Studio">Studio</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Local Commercial">Local Commercial</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                            <!-- Statut -->
                            <div class="mb-4">
                                <x-input-label for="status" :value="__('Statut')" />
                                <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="available">Disponible</option>
                                    <option value="rented">Loué</option>
                                    <option value="maintenance">En maintenance</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Surface -->
                            <div class="mb-4">
                                <x-input-label for="surface" :value="__('Surface (m²)')" />
                                <x-text-input id="surface" class="block mt-1 w-full" type="number" step="0.01" name="surface" :value="old('surface')" required />
                                <x-input-error :messages="$errors->get('surface')" class="mt-2" />
                            </div>

                            <!-- Loyer -->
                            <div class="mb-4">
                                <x-input-label for="price" :value="__('Loyer mensuel (€)')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price')" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        
                        <!-- Adresse -->
                        <div class="mb-4">
                            <x-input-label for="address" :value="__('Adresse complète')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Ville -->
                            <div class="mb-4">
                                <x-input-label for="city" :value="__('Ville')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>

                            <!-- Code Postal -->
                            <div class="mb-4">
                                <x-input-label for="postal_code" :value="__('Code Postal')" />
                                <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required />
                                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('properties.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Annuler</a>
                            <x-primary-button>
                                {{ __('Enregistrer le bien') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
