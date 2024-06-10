<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-md pb-3">
        <h1 class="text-2xl font-bold mb-6">Lista de Reservaciones</h1>
        
        @if($bookings->count() > 0)
            <div class="overflow-x-auto mb-3">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 text-center px-4 border-b">ID</th>
                            <th class="py-2 text-center px-4 border-b">Vuelo</th>
                            <th class="py-2 text-center px-4 border-b">Origen</th>
                            <th class="py-2 text-center px-4 border-b">Destino</th>
                            <th class="py-2 text-center px-4 border-b">Fecha</th>
                            <th class="py-2 text-center px-4 border-b">Hora</th>
                            <th class="py-2 text-center px-4 border-b">Cantidad de Pasajeros</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="py-2 text-center px-4 border-b">{{ $booking->id }}</td>
                                <td class="py-2 text-center px-4 border-b">{{ $booking->flight->number}}</td>
                                <td class="py-2 text-center px-4 border-b">{{ $booking->flight->originAirport->city}}</td>
                                <td class="py-2 text-center px-4 border-b">{{ $booking->flight->destinationAirport->city }}</td>
                                <td class="py-2 text-center px-4 border-b">{{ $booking->flight->departureDate->date}}</td>
                                <td class="py-2 text-center px-4 border-b">{{ $booking->flight->departureDate->hour}}</td>
                                <td class="py-2 text-center px-4 border-b">{{$booking->flight->seat->count()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">No hay reservaciones disponibles.</p>
        @endif
        {{$bookings->links()}}
    </div>
    
    </x-app-layout>
