<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mes Locations (Baux)') }}
            </h2>
            <a href="{{ route('leases.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Nouveau Bail
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if($leases->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500 mb-4">Aucun bail actif pour le moment.</p>
                            <a href="{{ route('leases.create') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Créer un bail</a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bien</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Locataire</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loyer</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Période</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($leases as $lease)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $lease->property->title }}</div>
                                                <div class="text-xs text-gray-500">{{ $lease->property->city }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $lease->tenant->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $lease->tenant->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ number_format($lease->rent_amount, 2, ',', ' ') }} €</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Du {{ $lease->start_date->format('d/m/Y') }}</div>
                                                @if($lease->end_date)
                                                    <div class="text-xs text-gray-500">au {{ $lease->end_date->format('d/m/Y') }}</div>
                                                @else
                                                    <div class="text-xs text-gray-500">Durée indéterminée</div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $lease->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
                                                    {{ $lease->status === 'terminated' ? 'bg-red-100 text-red-800' : '' }}
                                                    {{ $lease->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                                    {{ ucfirst($lease->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('leases.show', $lease) }}" class="text-indigo-600 hover:text-indigo-900">Détails</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
