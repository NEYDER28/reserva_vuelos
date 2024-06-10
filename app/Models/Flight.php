<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function booking(){
        return $this->hasMany(Booking::class);
    }

    public function seat(){
        return $this->hasMany(Seat::class);
    } 

    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function fare(){
        return $this->hasMany(Fare::class);
    }

    public function arrivalDate(){
        return $this->belongsTo(Schedule::class,'arrival_date');
    }

    public function departureDate(){
        return $this->belongsTo(Schedule::class, 'departure_date');
    }

    public function originAirport(){
        return $this->belongsTo(Airport::class,'origin_airport');
    }

    public function destinationAirport(){
        return $this->belongsTo(Airport::class, 'destination_airport');
    }

    public function airplane(){
        return $this->belongsTo(Airplane::class);
    }
}
