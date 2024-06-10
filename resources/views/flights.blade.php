<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <!--buscar vuelos-->
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Buscar Vuelos</h1>
        <form class="p-4 max-w-4xl mx-auto" method="GET" action="{{ route('search') }}">
            <div class="flex flex-wrap -mx-2">
                <!-- Origen -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="origin_airport" class="block text-sm font-medium text-gray-700">Origen</label>
                    <select id="origin_airport" name="origin_airport"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($airports as $airport)
                            <option value="{{ $airport->id }}">{{ $airport->city }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Destino -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="destination_airport" class="block text-sm font-medium text-gray-700">Destino</label>
                    <select id="destination_airport" name="destination_airport"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($airports as $airport)
                            <option value="{{ $airport->id }}">{{ $airport->city }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Fecha y Hora de Ida -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="outbound_date" class="block text-sm font-medium text-gray-700">Fecha y Hora de
                        Salida</label>
                    <input type="datetime-local" id="outbound_date" name="outbound_date"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>

                <!-- Fecha de Regreso -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="return_date" class="block text-sm font-medium text-gray-700">Fecha y Hora de
                        Regreso</label>
                    <input type="datetime-local" id="return_date" name="return_date"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>

                <!-- Aerolínea -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="airline" class="block text-sm font-medium text-gray-700">Aerolinea</label>
                    <select id="airline" name="airline"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Seleccionar Aerolinea</option>
                        @foreach ($airlines as $airline)
                            <option value="{{ $airport->id }}">{{ $airline->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Categoría de Asiento -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="seat_class" class="block text-sm font-medium text-gray-700">Categoría de Asiento</label>
                    <select id="seat_class" name="seat_class"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Seleccionar Clase</option>
                        <option value="Económica">Económica</option>
                        <option value="Ejecutiva">Ejecutiva</option>
                        <option value="Primera Clase">Primera Clase</option>
                    </select>
                </div>

                <!-- Escalas -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="stopover" class="block text-sm font-medium text-gray-700">Escalas</label>
                    <select id="stopover" name="stopover"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Seleccionar Escalas</option>
                        <option value="0">Directo</option>
                        <option value="1">1 Escala</option>
                        <option value="2">2 Escalas</option>
                        <option value="3">3 Escalas</option>
                    </select>
                </div>

                <!-- Filtro de Precios -->
                <div class="px-2 w-full sm:w-1/2">
                    <label for="price" class="block text-sm font-medium text-gray-700">Rango de Precios</label>
                    <input type="range" id="price" name="price" min="50000" max="7000000" step="10000"
                        class="mt-1 block w-full">
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>$50.000</span>
                        <span>$7'000.000</span>
                    </div>
                </div>

                <!-- Botón de búsqueda -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Buscar</button>
                </div>
        </form>
    </div>

    <!-- Resultados de los Vuelos -->
    <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Vuelos de Ida -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Vuelos de Ida</h2>
                    <div class="h-96 overflow-y-auto border p-4 rounded-lg">
                        @if (count($outboundFlights) > 0)
                            @foreach ($outboundFlights as $flight)
                                <div class="border-b py-2">
                                    <div class="text-lg font-semibold">{{ $flight->originAirport->city }} -
                                        {{ $flight->destinationAirport->city }}</div>
                                    <div class="text-sm text-gray-600">Aerolínea: {{ $flight->airline->name }}</div>
                                    <div class="text-sm text-gray-600">Fecha: {{ $flight->departureDate->date }}</div>
                                    <div class="text-sm text-gray-600">Hora: {{ $flight->departureDate->hour }}</div>

                                    <div class="text-sm text-gray-600" id="price-{{ $flight->id }}">Precio:
                                        ${{ $flight->fare[0]->price }}</div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="text-sm text-gray-600">
                                            <span class="font-semibold block w-full">Clase</span>
                                            <select name="fare" id="fare-{{ $flight->id }}"
                                                onchange="selectFare({{ $flight }},event)"
                                                class="mt-1 w-full inline-block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                @foreach ($flight->fare as $fare)
                                                    <option value="{{ $loop->index }}">{{ $fare->seat_class }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" flex flex-wrap items-center">
                                            <div class="text-sm font-semibold w-full">Pasajeros</div>
                                            <button type="button"
                                                class="bg-gray-300 text-gray-700 px-2 py-1 rounded-md"
                                                onclick="cambiarCantidad({{ $flight }}, -1)">-</button>
                                            <input type="text" id="cantidad-{{ $flight->id }}" value="1"
                                                readonly class="mx-2 w-12 text-center border rounded-md">
                                            <button type="button"
                                                class="bg-gray-300 text-gray-700 px-2 py-1 rounded-md"
                                                onclick="cambiarCantidad({{ $flight }}, 1)">+</button>
                                        </div>
                                    </div>

                                    <button type="button" onclick="book({{ $flight }})"
                                        class="mt-2 bg-indigo-600 text-white py-1 px-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Reservar
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-600">No hay vuelos de ida disponibles para los criterios de búsqueda.
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Vuelos de Vuelta -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Vuelos de Vuelta</h2>
                    <div class="h-96 overflow-y-auto border p-4 rounded-lg">
                        @if (count($returnFlights) > 0)
                            @foreach ($returnFlights as $flight)
                                <div class="border-b py-2">
                                    <div class="text-lg font-semibold">{{ $flight->originAirport->city }} -
                                        {{ $flight->destinationAirport->city }}</div>
                                    <div class="text-sm text-gray-600">Aerolínea: {{ $flight->airline->name }}</div>
                                    <div class="text-sm text-gray-600">Fecha: {{ $flight->departureDate->date }}</div>
                                    <div class="text-sm text-gray-600">Hora: {{ $flight->departureDate->hour }}</div>
                                    <div class="text-sm text-gray-600" id="price-{{ $flight->id }}">Precio:
                                        ${{ $flight->fare[0]->price }}</div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="text-sm text-gray-600">
                                            <span class="font-semibold block w-full">Clase</span>
                                            <select name="fare" id="fare-{{ $flight->id }}"
                                                onchange="selectFare({{ $flight }},event)"
                                                class="mt-1 w-full inline-block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                @foreach ($flight->fare as $fare)
                                                    <option value="{{ $loop->index }}">{{ $fare->seat_class }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" flex flex-wrap items-center">
                                            <div class="text-sm font-semibold w-full">Pasajeros</div>
                                            <button type="button"
                                                class="bg-gray-300 text-gray-700 px-2 py-1 rounded-md"
                                                onclick="cambiarCantidad({{ $flight }}, -1)">-</button>
                                            <input type="text" id="cantidad-{{ $flight->id }}" value="1"
                                                readonly class="mx-2 w-12 text-center border rounded-md">
                                            <button type="button"
                                                class="bg-gray-300 text-gray-700 px-2 py-1 rounded-md"
                                                onclick="cambiarCantidad({{ $flight }}, 1)">+</button>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="mt-2 bg-indigo-600 text-white py-1 px-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Reservar
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-600">No hay vuelos de vuelta disponibles para los criterios de
                                búsqueda.</p>
                        @endif
                    </div>
                </div>
            </div>
    </div>

    <script src="{{ asset('js/flight.js') }}"></script>
    <script>
        window.appConfig = {
            csrfToken: '{{ csrf_token()}}',
            bookRoute: "{{route('book')}}"
        }
    </script>
</x-app-layout>
