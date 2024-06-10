<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function start(){
        $booking = Booking::with('flight.originAirport', 'flight.destinationAirport', 'flight.departureDate', 'flight.seat')->latest()->paginate(5);
        return view("books", ['bookings'=>$booking]);
    }

    public function create(Request $request){
        dd($request);
        return redirect(route('flights', absolute: false));
    }
}
