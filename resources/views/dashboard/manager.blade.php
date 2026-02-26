<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord Manager') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-indigo-600 rounded-lg shadow-xl p-6 mb-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold mb-2">Bienvenue, {{ Auth::user()->name }} !</h1>
                    <p class="text-indigo-100">Gérez vos biens et vos locataires en toute simplicité.</p>
                </div>
                <!-- Background decoration -->
                <div class="absolute right-0 top-0 h-full w-1/3 bg-white opacity-5 transform skew-x-12 translate-x-12"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Properties Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border-t-4 border-indigo-500 hover:shadow-2xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                                <!-- Icon House -->
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="mb-2 text-sm font-medium text-gray-600">Total Biens</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $propertiesCount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                        <a href="{{ route('properties.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 flex items-center justify-between">
                            Voir les détails <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Tenants Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border-t-4 border-green-500 hover:shadow-2xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <!-- Icon Users -->
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="mb-2 text-sm font-medium text-gray-600">Locataires Actifs</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $tenantsCount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                        <a href="{{ route('tenants.index') }}" class="text-sm font-medium text-green-600 hover:text-green-900 flex items-center justify-between">
                            Gérer les locataires <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Leases Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border-t-4 border-yellow-500 hover:shadow-2xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <!-- Icon Document -->
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="mb-2 text-sm font-medium text-gray-600">Contrats en cours</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $leasesCount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                        <a href="{{ route('leases.index') }}" class="text-sm font-medium text-yellow-600 hover:text-yellow-900 flex items-center justify-between">
                            Voir les baux <span>&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions removed by user request -->

        </div>
    </div>
</x-app-layout>
