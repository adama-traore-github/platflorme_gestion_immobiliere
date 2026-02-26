<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full font-sans antialiased text-gray-900">
    <div class="min-h-screen flex">
        <!-- Left Side: Image/Branding -->
        <div class="hidden lg:flex w-1/2 relative bg-gray-900 text-white overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1073&q=80" 
                     alt="Background" 
                     class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            </div>
            <div class="relative z-10 flex flex-col justify-between p-12 w-full">
                <div>
                    <a href="/" class="flex items-center gap-2 text-white">
                        <x-application-logo class="w-10 h-10 fill-current" />
                        <span class="text-2xl font-bold font-outfit">ImmoGestion</span>
                    </a>
                </div>
                <div class="mb-10">
                    <h1 class="text-4xl font-bold mb-4 font-outfit leading-tight">Gérez vos biens immobiliers <br/> en toute simplicité.</h1>
                    <p class="text-gray-300 text-lg max-w-md">Une plateforme complète pour les propriétaires, locataires et agences.</p>
                </div>
                <div class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
                </div>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 w-full lg:w-1/2 bg-white">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <a href="/" class="inline-flex items-center gap-2">
                        <x-application-logo class="w-12 h-12 fill-current text-indigo-600" />
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
