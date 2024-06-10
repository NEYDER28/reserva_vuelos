<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\Airport;

class FlightController extends Controller
{
    public function start()
    {
        $airports = Airport::get();
        $flights = Flight::with('departureDate')->get();
        $airlines = Airline::get();

        return view('flights', ['airports' => $airports, 'flights' => $flights, 'airlines' => $airlines, 'outboundFlights' => array(), 'returnFlights' => array()]);
    }

    public function search(Request $request)
    {
        $airports = Airport::get();
        $flights = Flight::with('departureDate')->get();
        $airlines = Airline::get();
        //Outbound flights

        $query_outbound = Flight::query();

        $query_outbound->where('origin_airport', $request->origin_airport)
            ->where('destination_airport', $request->destination_airport)
            ->whereHas('departureDate', function ($q) use ($request) {
                $q->where('date', date('Y-m-d', strtotime($request->outbound_date)))
                    ->where('hour', '<=', date('H:i:s', strtotime($request->outbound_date)));

            });

        if (isset($request->airline)) {
            $query_outbound->where('airline_id', $request->airline);
        }

        if (isset($request->seat_class)) {
            $query_outbound->whereHas('seat', function ($q) use ($request) {
                $q->whereRaw('LOWER(class) = ?', [mb_strtolower($request->seat_class, 'UTF-8')]);
            });
        }

        if (isset($request->stopover)) {
            $query_outbound->where('stopover', $request->stopover);
        }

        if (isset($request->price)) {
            $query_outbound->whereHas('fare', function ($q) use ($request) {
                $q->where('price', '<=', $request->price);
            });
        }
        $query_outbound->with('originAirport', 'destinationAirport', 'airline', 'departureDate', 'arrivalDate', 'fare');

        $outbound_flight = $query_outbound->get();

        //Return_flights

        $query_return = Flight::query();

        $query_return->where('origin_airport', $request->destination_airport)
            ->where('destination_airport', $request->origin_airport)
            ->whereHas('departureDate', function ($q) use ($request) {
                $q->where('date', date('Y-m-d', strtotime($request->return_date)))
                    ->where('hour', '<=', date('H:i:s', strtotime($request->return_date)));

            });

        if (isset($request->airline)) {
            $query_return->where('airline_id', $request->airline);
        }

        if (isset($request->seat_class)) {
            $query_return->whereHas('seat', function ($q) use ($request) {
                $q->whereRaw('LOWER(class) = ?', [mb_strtolower($request->seat_class, 'UTF-8')]);
            });
        }

        if (isset($request->stopover)) {
            $query_return->where('stopover', $request->stopover);
        }

        if (isset($request->price)) {
            $query_return->whereHas('fare', function ($q) use ($request) {
                $q->where('price', '<=', $request->price);
            });
        }
        $query_return->with('originAirport', 'destinationAirport', 'airline', 'departureDate', 'arrivalDate');

        $return_flight = $query_return->get();
        return view('flights', ['airports' => $airports, 'flights' => $flights, 'airlines' => $airlines, 'outboundFlights' => $outbound_flight, 'returnFlights' => $return_flight]);
    }
}
