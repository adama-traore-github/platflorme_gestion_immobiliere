<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le bien') }} : {{ $property->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('properties.update', $property) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nom du Bien -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Nom du bien')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $property->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Type -->
                            <div class="mb-4">
                                <x-input-label for="type" :value="__('Type de bien')" />
                                <select id="type" name="type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Appartement" {{ old('type', $property->type) == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                                    <option value="Maison" {{ old('type', $property->type) == 'Maison' ? 'selected' : '' }}>Maison</option>
                                    <option value="Studio" {{ old('type', $property->type) == 'Studio' ? 'selected' : '' }}>Studio</option>
                                    <option value="Villa" {{ old('type', $property->type) == 'Villa' ? 'selected' : '' }}>Villa</option>
                                    <option value="Local Commercial" {{ old('type', $property->type) == 'Local Commercial' ? 'selected' : '' }}>Local Commercial</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                            <!-- Statut -->
                            <div class="mb-4">
                                <x-input-label for="status" :value="__('Statut')" />
                                <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Disponible</option>
                                    <option value="rented" {{ old('status', $property->status) == 'rented' ? 'selected' : '' }}>Loué</option>
                                    <option value="maintenance" {{ old('status', $property->status) == 'maintenance' ? 'selected' : '' }}>En maintenance</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Surface -->
                            <div class="mb-4">
                                <x-input-label for="surface" :value="__('Surface (m²)')" />
                                <x-text-input id="surface" class="block mt-1 w-full" type="number" step="0.01" name="surface" :value="old('surface', $property->surface)" required />
                                <x-input-error :messages="$errors->get('surface')" class="mt-2" />
                            </div>

                            <!-- Loyer -->
                            <div class="mb-4">
                                <x-input-label for="price" :value="__('Loyer mensuel (€)')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price', $property->price)" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        
                        <!-- Adresse -->
                        <div class="mb-4">
                            <x-input-label for="address" :value="__('Adresse complète')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $property->address)" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Ville -->
                            <div class="mb-4">
                                <x-input-label for="city" :value="__('Ville')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $property->city)" required />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>

                            <!-- Code Postal -->
                            <div class="mb-4">
                                <x-input-label for="postal_code" :value="__('Code Postal')" />
                                <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code', $property->postal_code)" required />
                                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $property->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('properties.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Annuler</a>
                            <x-primary-button>
                                {{ __('Mettre à jour') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
