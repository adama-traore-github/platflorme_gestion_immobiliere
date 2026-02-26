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
                                        <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></span>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <nav class="space-y-1 p-2">
                                <a href="#info" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-700 bg-indigo-50 transition-all group">
                                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Informations du profil
                                </a>
                                <a href="#security" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 transition-all group">
                                    <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg>
                                    Sécurité
                                </a>
                                <a href="#danger" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 transition-all group">
                                    <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Zone de danger
                                </a>
                            </nav>
                        </div>
                        
                        <!-- Help Card -->
                        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-xl p-5 border border-indigo-100">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-gray-900">Besoin d'aide ?</h3>
                                    <p class="mt-1 text-xs text-gray-500">Notre équipe est là pour vous aider avec vos paramètres de compte.</p>
                                    <a href="#" class="mt-2 inline-flex items-center text-xs font-medium text-indigo-600 hover:text-indigo-800">
                                        Contacter le support
                                        <svg class="ml-1 h-3 w-3" fill="currentColor" viewBox="0 0 12 12">
                                            <path d="M9.707 5.293a1 1 0 010 1.414L5.414 11H8a1 1 0 110 2H3a1 1 0 01-1-1V7a1 1 0 112 0v2.586l4.293-4.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3 space-y-6">
                    <!-- Profile Information Section -->
                    <section id="info" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md">
                        <div class="p-6">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </section>

                    <!-- Security Section -->
                    <section id="security" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md">
                        <div class="p-6">
                            @include('profile.partials.update-password-form')
                        </div>
                    </section>

                    <!-- Danger Zone Section -->
                    <section id="danger" class="bg-white rounded-xl shadow-sm border border-red-100 overflow-hidden transition-all duration-300 hover:shadow-md">
                        <div class="p-6">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>